<?php
include_once "../../engines/functions.php";

include_once "../../config/locale.inc.php";

include_once "../../config/config.inc.php";

include_once "MailPostmark.php";
include_once "db_array.php";

error_reporting(E_ALL);
class ManualBlastInvite extends db_array

{
	var $config;
	var $chapterdata;
	var $postmark;


	function __construct()
	{
		global $CONFIG;
		$this->config = $CONFIG;
        //print_r($this->config);
		
		$POSTMARK_API_KEY = 'd3e281a6-7695-4f13-95a9-7430caade63d';
		$EMAIL_SENDER = 'admin@sonarplatform.com';
		$this->postmark = new Mail_Postmark($POSTMARK_API_KEY,$EMAIL_SENDER);
	}

	function runservice()
	{
        $chapter_id = 296;
        $email_csv = 'manuhidayat@gmail.com';
        $this->prosesaddMember($email_csv, $chapter_id);
	}

	function getdata($file)
	{
		$row = 0;
		if (($handle = fopen($file, "r")) !== FALSE) {
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$row++;
				if ($row <= 1) continue;
				$num = count($data);
				$chapter_id = intval(trim(strip_tags($data[0])));
				$email = trim(strip_tags($data[1]));
				
				if (!filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
					//echo "This ($email) email address is considered valid.\n";
				} else {
					echo "This ($email) email address is considered not valid.\n";
					continue;
				}
				
				//$chapter_id = $this->get_chapter_id($chapter_name);
				if ($chapter_id > 0) {
					//echo $chapter_id . "\n";
					$this->prosesaddMember($email, $chapter_id);
				} else {
					echo "{$chapter_id} is not valid for {$email}\n";
				}
				unset($data);
			}
			fclose($handle);
		}
	}
	
	function get_chapter_id($chaptername){
		$id = 0;
		$sql = "SELECT id FROM ss_chapter WHERE name_chapter='$chaptername'";
		$rescekmember = $this->fetch($sql);
		if ($rescekmember) {
			$id = $rescekmember['id'];
		}
		return $id;
	}

	function send_one_invite($emluser, $name_chapter)
	{
		$dataArray = array(
			'email' => $emluser,
			'namechapter' => $name_chapter
		);
		$link = urlencode64(serialize(array(
			'status' => '1',
			'email' => $emluser
		)));
		return $this->send_addmember($dataArray, $link);
	}

	function send_addmember($dataArray = null, $link = null)
	{
		global $LOCALE;
		$results['msg'] = '';
		$results['status'] = '';
		$template = $LOCALE[1]['addmember_web'];
		$template = str_replace('!#chaptername', $dataArray['namechapter'], $template);
		$template = str_replace('!#link', $this->config['BASE_DOMAIN_REG'] . $link, $template);
		
		$from = 'Supersoccer Community Race<sscr-admin@supersoccer.co.id>';
		$from = "admin@sonarplatform.com";
		$to = $dataArray['email'];
		$subject = "Registrasi Member " . $dataArray['namechapter'] . "";
		$html = $template;
		
		$is_success = $this->send_email($from, $to, $subject, $html);
		if (!$is_success) {
			$results['status'] = '0';
		}
		else {
			$results['status'] = '1';
		}
		return $results;
	}
	
	function send_email($from, $one_recipient_addr, $title, $body) {
		try {
			if($this->postmark->to($one_recipient_addr)->subject($title)->messageHtml($body)->send()){
				echo "Message has been sent to {$one_recipient_addr}\n";
				return 1;
			} else {
				echo "Fail to send to {$one_recipient_addr}\n";
				return 0;
			}
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return 0;
		}	
	}

	function prosesaddMember($email_csv, $chapter_id)
	{
		$email = explode(',', $email_csv);
		if ($email) {
			foreach($email as $row) {
                // check whe
				//print_r($row);echo "\n";
				//continue;
				$emluser = trim($row);
				$sql = "SELECT * FROM ss_member WHERE username='$emluser'";
				$rescekmember = $this->fetch($sql);
				if (sizeof($rescekmember) <= 0) {
					// no such user
				} else {
					// email already registered
					$n_status = $rescekmember['n_status'];
					if($n_status == 2 || $n_status == 3 || $n_status == 0){
						$sql="delete from ss_member where username='$emluser'";
						$fetch = $this->query($sql);

						$sql2="delete from ss_akses_login where username='$emluser' AND role = 2";
						$fetch = $this->query($sql2);
					} else if ($n_status == 1) {
						echo "{$emluser} already registered\n";
						continue;
					} else {
						echo "unknown user status of {$emluser}\n";
						continue;
					}
				}
                unset($rescekmember);

				$sqlGetChapter = "SELECT name_chapter FROM ss_chapter WHERE id='{$chapter_id}'";
				$resGetChapter = $this->fetch($sqlGetChapter);
				$dataArray = array(
					'email' => $emluser,
					'namechapter' => $resGetChapter['name_chapter']
				);
				$link = urlencode64(serialize(array(
					'status' => '1',
					'email' => $emluser
				)));
				$returnEmail = $this->send_addmember($dataArray, $link);
				if ($returnEmail['status'] != 1) {
					$nstatus = '3';
				}
				else {
					$nstatus = '0';
				}

				$sql = "INSERT INTO `ss_member` SET
								`username`='" . trim($row) . "',
								`chapter_id`='{$chapter_id}',
								`n_status`={$nstatus}";

				$ret = $this->query($sql);
				if (!$ret) {
					echo "unable to insert";
					continue;
				}
				$sql = "select id from `ss_member` where `chapter_id`='{$chapter_id}' AND `username`='" . trim($row) . "'";
				$result = $this->fetch($sql);
				
				$lastid = $result['id'];
				
				// KIRIM EMAIL NYA

				$sqlGetChapter = "SELECT name_chapter as name FROM ss_chapter WHERE id='{$chapter_id}'";

				// pr($sqlGetChapter);exit;

				$resGetChapter = $this->fetch($sqlGetChapter);

				// pr($resGetChapter);exit;

				$namachapternyah = str_replace(' ', '_', $resGetChapter['name']);
				$ssgte_id = $namachapternyah . '-' . $lastid;
				$sqlx = "update ss_member SET
							`ssgte_id`='{$ssgte_id}' where id='{$lastid}'
							";
				$resultx = $this->query($sqlx);
				$sql = "INSERT INTO `ss_akses_login` SET
								`user_id`='{$lastid}',
								`username`='" . trim($row) . "',
								`role`='2',
								`n_status`={$nstatus}";

				// pr($sql);

				$result = $this->query($sql);
			}
		}
		return true;
	}
}

$class = new ManualBlastInvite();
//$class->runservice();
//$class->getdata("/Users/macbookprouser/Desktop/jogja_pwt_semarang_region2.csv");
//$class->getdata("jogja_pwt_semarang_region2.csv");
//$class->getdata("region1_resend_20160205.csv");
$class->runservice();
unset($class);
die();
?>

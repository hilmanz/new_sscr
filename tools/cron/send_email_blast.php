<?php
include_once "../../engines/functions.php";

include_once "../../config/locale.inc.php";

include_once "../../config/config.inc.php";

include_once "db_array.php";

error_reporting(E_ALL);
class ManualBlastInvite extends db_array

{
	var $config;
	var $chapterdata;

	function __construct()
	{
		global $CONFIG;
		$this->config = $CONFIG;

	}

	function runservice_old()
	{
		$dataArray = array(
			'email' => 'fauzi.rahman@kana.co.id', 
			//'email' => 'meutianda.latrisya@kana.co.id',
			'namemember' => 'Meutianda Latrisya'
		);
		echo $email;
/*
		$dataArray = array(
			'email' => 'ridwan@kana.co.id',
			'namemember' => 'M Ridwan A'
		);
*/
		$returnEmail = $this->send_addmember($dataArray);
		if ($returnEmail['status'] != 1) {
			$nstatus = '3';
		}
		else {
			$nstatus = '0';
		}


	}

	function runservice()
	{
		$last_id = 0;
		$num = 1000;
		$members = $this->get_members($last_id, $num);
		while ($members != null && !empty($members)) {
			foreach($members as $one_member) {
				$last_id = $one_member['id'];
				$username = trim($one_member['name']);
				$email = trim($one_member['username']);
				echo "Sending to #{$last_id}: {$email}\n";
				$dataArray = array(
					'email' => $email,
					'namemember' => $username
				);
				$results = $this->send_addmember($dataArray);
				print_r($results); echo "\n\n";
				$this->insert_emailblast($last_id, $email, intval($results['status']));				
			}
			unset($members);			
		}
		unset($members);
	}

	function get_members($last_id, $num) {
		global $CONFIG;

		$sql = "
SELECT id,name,username
FROM {$CONFIG['DATABASE'][0]['DATABASE']}.ss_member
WHERE chapter_id in(SELECT id FROM {$CONFIG['DATABASE'][0]['DATABASE']}.email_blast) and
n_status IN (0,1)
ORDER BY id ASC
LIMIT {$num}";
echo $sql;
		$rs = $this->fetch($sql, 1);
		return $rs;
	}
	
	function insert_emailblast($userid, $email, $n_status) {
		global $CONFIG;

		$sql = "INSERT INTO {$CONFIG['DATABASE'][0]['DATABASE']}.tbl_email_blast_copy
				(userid, email, created, n_status) VALUES
				('{$userid}', '{$email}', NOW(), '{$n_status}')
				ON DUPLICATE KEY UPDATE
				n_status = VALUES(n_status), created = NOW()";
		$ret = $this->query($sql);
	}

	function send_addmember($dataArray = null)
	{
		global $LOCALE;
		$results['msg'] = '';
		$results['status'] = '';
		$template = $LOCALE[1]['invite_milanisti'];
		$template = str_replace('!#username', $dataArray['namemember'], $template);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_USERPWD, 'api:key-031f6c645c2c27d331e152ba8a959e28');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v3/gte.supersoccer.co.id/messages');
		curl_setopt($ch, CURLOPT_POSTFIELDS, array(
			'from' => 'Supersoccer Campus League<sscl-admin@supersoccer.co.id>',
			//'to' => $dataArray['email'],
			'to' => 'fauzi.rahman@kana.co.id',
			'subject' => "Mengundang Para Milanisti Indonesia!",
			'html' => $template,
			'o:campaign' => 'fkdf5'
		));
		$result = curl_exec($ch);
		$info = curl_getinfo($ch);
		$res = json_decode($result, TRUE);
		$res['email'] = $dataArray['email'];
		if ($info['http_code'] != '200') {
			$results['msg'] = $res['message'];
			$results['status'] = '0';
		}
		else {
			$results['msg'] = $res['message'];
			$results['status'] = '1';
		}
		curl_close($ch);
		return $results;
	}

}

$class = new ManualBlastInvite();
$class->runservice();
//$class->runservice_old();
die();
?>

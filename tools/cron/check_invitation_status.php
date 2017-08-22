<?php

include_once "db.php";

class CheckInvitationStatus extends db{

	function __construct(){
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
				
				//echo $email . "\n";
				
				if (!filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
					//echo "This ($email) email address is considered valid.\n";
				} else {
					echo "This ($email) email address is considered not valid.\n";
					continue;
				}
				
				//$chapter_id = $this->get_chapter_id($chapter_name);
				if ($chapter_id > 0) {
					//echo $chapter_id . "\n";
					$status_email = $this->statusemail($email);
				} else {
					echo "{$chapter_id} is not valid for {$email}\n";
				}
				unset($data);
			}
			fclose($handle);
		}
	}
	
	function statusemail($email){
		echo "email:{$email}\n";
		$output = shell_exec('curl -s --user \'api:key-031f6c645c2c27d331e152ba8a959e28\' -G -d "recipient='.$email.'&limit=1" https://api.mailgun.net/v3/gte.supersoccer.co.id/campaigns/fkdf5/events');
		echo "output:{$output}\n";
		$hasdecode=json_decode($output);
		
		$result=array();
		foreach($hasdecode as $key => $val){
			$result['verifikasi']=$val->event;
			if ($val->event == 'delivered' || $val->event == 'opened' || $val->event == 'clicked' || $val->event == 'bounced' || $val->event == 'dropped') {
				echo "{$email} has been {$val->event}\n";
			} else {
				echo "{$email} has been {$val->event}\n";
			}
		}
		if($result)
		{
			return $result['verifikasi'];
		}else{

			return "pending";
		}

	}

	function checkMailMember(){
		echo "checkMailMember\n";
		$sql = "select id,username
				FROM ss_member WHERE n_status=0 AND status_email=0";

		$rs = $this->fetch($sql,1);
		foreach($rs as $key => $val){
			echo "Processing #{$val->id}:{$val->username}\n";
			$statusemail=$this->statusemail($val->username);
			if($statusemail=='delivered' || $statusemail=='opened' || $statusemail=='clicked'){
				$statusemailmember = "update ss_member set status_email=1 where id='{$val->id}'";
				$resnyastatus = $this->query($statusemailmember);
			}
			else if($statusemail=='bounced' || $statusemail=='dropped'){
				$statusemailmember = "update ss_member set status_email=3,n_status=3 where id='{$val->id}'";
				$resnyastatus = $this->query($statusemailmember);
			}
		}
	}

	function checkMailChapter(){
		echo "cekMailChapter\n";
		$sql = "select id,email
				FROM ss_chapter WHERE n_status=0 AND status_email=0";

		$rs = $this->fetch($sql,1);
		foreach($rs as $key => $val){
			echo "Processing #{$val->id}:{$val->email}\n";
			$statusemail=$this->statusemail($val->email);
			if($statusemail=='delivered' || $statusemail=='opened' || $statusemail=='clicked'){
				$statusemailmember = "update ss_chapter set status_email=1 where id='{$val->id}'";
				$resnyastatus = $this->query($statusemailmember);
			}
			else if($statusemail=='bounced' || $statusemail=='dropped'){
				$statusemailmember = "update ss_chapter set status_email=3,n_status=3 where id='{$val->id}'";
				$resnyastatus = $this->query($statusemailmember);
			}
		}
	}

	function runservice(){
		$this -> checkMailChapter();
		$this -> checkMailMember();
	}



}

$class = new CheckInvitationStatus();

//$class->getdata();
//$class->getdata("region1_resend_20160205.csv");
$class->statusemail('niko.prastyo@kana.co.id');
die();



?>


<?php

class memberHelper {
	
	var $_mainLayout="";
	
	var $login = false;
	
	function __construct($apps){
		global $logger,$CONFIG;
		$this->logger = $logger;
		$this->apps = $apps;
 
		
		$this->config = $CONFIG;
		if( $this->apps->session->getSession($this->config['SESSION_NAME'],"admin") ){
			
			$this->login = true;
		
		}
		 
	}
	
	protected function encrypt($string)
	{	
		$ENC_KEY='123456';
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), $string, MCRYPT_MODE_CBC, md5(md5($ENC_KEY))));
	}
	
	function event($id){
		$sql = "
				SELECT *
				FROM {$this->config['DATABASE'][0]['DATABASE']}.ss_event 
				WHERE chapter_id='{$id}' AND  n_status=1  AND  time_end >= NOW() ORDER BY ss_event.time_start ASC";
		
			$rs = $this->apps->fetch($sql,1); 
			//pr($sql);exit;
				foreach($rs as $key => $val){
				$rs[$key]['jam_awal']=date("g:i a",strtotime($val['time_start']));
				$rs[$key]['jam_akhir']=date("g:i a",strtotime($val['time_end']));
				$rs[$key]['jam_awal_i']=date("H.i",strtotime($val['time_start']));
				$rs[$key]['jam_akhir_i']=date("H.i",strtotime($val['time_end']));
			}
			// pr($rs);die;
		return $rs;
	}
	function eventold($id){
		$sql = "
				SELECT *,DATE_FORMAT(time_end, '%d %M %Y') as time_end,(select count(*) as total FROM ss_list_pesertaevent WHERE event_id=ss_event.id AND chapter_id={$id}) as total_peserta
				FROM {$this->config['DATABASE'][0]['DATABASE']}.ss_event 
				WHERE chapter_id='{$id}' AND n_status<>'2' and ss_event.time_end < NOW() ORDER BY ss_event.time_end DESC";
			//pr($sql);exit;
			$rs = $this->apps->fetch($sql,1); 
			foreach($rs as $key => $val){
				$rs[$key]['jam_awal']=date("g:i a",strtotime($val['time_start']));
				$rs[$key]['jam_akhir']=date("g:i a",strtotime($val['time_end']));
				$rs[$key]['jam_awal_i']=date("H.i",strtotime($val['time_start']));
				$rs[$key]['jam_akhir_i']=date("H.i",strtotime($val['time_end']));
			}
		return $rs;
	}
	function registrasimember($data){
	   global $logger,$CONFIG;
		$password=$this->encrypt($data['password']);
		//pr($password);exit;
	   
		$sql = "
				UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_member set `name`='{$data['name']}'
				,password='{$password}',fb_id='{$data['fbanggota']}',twiiter_id='{$data['twitteranggota']}',`date_register`=NOW(),`point`='0',n_status=1,no_tlp='{$data['no_telp']}',alamat='{$data['alamat']}',`ktp_sim`={$data['idktpsim']} where `username`='{$data['email']}'
				
				";
		//pr($sql);exit;
		$rs = $this->apps->query($sql); 
			
		
		
		$sql="select id,chapter_id,point from {$this->config['DATABASE'][0]['DATABASE']}.ss_member where username='{$data['email']}'";
		$res = $this->apps->fetch($sql); 
		
		
		
		if($rs)
		{
			$sqlpoint="SELECT  * FROM
						{$this->config['DATABASE'][0]['DATABASE']}.ss_point WHERE type_user=1 AND type_parameter=1";
			$resultpoint= $this->apps->fetch($sqlpoint);
			if ($resultpoint)
			{
				$sqlInsertPoint = "
						INSERT {$this->config['DATABASE'][0]['DATABASE']}.ss_activity_log SET
						`type_paremeter_point`='{$resultpoint['type_parameter']}',
						`user_id`='{$res['id']}',
						`chapter_id`='{$res['chapter_id']}',
						`point`='0',
						`date`='NOW()',
						`n_status`=1
						
						 
						";
				// pr($sql);exit;
				$rsInsertPoint = $this->apps->query($sqlInsertPoint); 
				$point = $resultpoint['points']+$res['point'];
				$sql = "
				UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_member set `point`='0' where `id`='{$res['id']}'";
		
				$rs = $this->apps->query($sql); 
			}
			
		}
		
		//pr($res['id']);exit;
		$sql = "
				UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_akses_login set password='{$password}',salt='123456',date=NOW(),`role`='2',user_id='{$res['id']}',n_status=1 where `username`='{$data['email']}'
				
				";
		
		$rs = $this->apps->query($sql); 
		
		
	//pr($sql);die;
		return true;
	}
	function format_angka($angka){
	 //$rupiah=number_format($angka,0,',','.');
	   $rupiah=number_format($angka,0,',','.');
	 return $rupiah;
	}
	
	function memberprofile($parsing_user){
		global $CONFIG;
		
		//$sql="select * from {$this->config['DATABASE'][0]['DATABASE']}.ss_member, ss_voucer where ss_member.voucer_id=ss_voucer.id and ss_member.id='{$parsing_user}'";
		
		$sql="select *, a.id as ids,IF(twiiter_id='','',CONCAT('@',twiiter_id)) as twiiter_acc from 
		{$this->config['DATABASE'][0]['DATABASE']}.ss_member as a left join {$this->config['DATABASE'][0]['DATABASE']}.ss_voucer as b on a.voucer_id=b.id where a.id='{$parsing_user}' and a.n_status='1'";
		
		$result= $this->apps->fetch($sql,1);
		
		foreach($result as $key => $val){
			$sql="select * from {$this->config['DATABASE'][0]['DATABASE']}.ss_chapter where id='{$val['chapter_id']}'";
			$chapternya= $this->apps->fetch($sql);
		
			$result[$key]['nama_chapter']=$chapternya['name_chapter'];
			$result[$key]['img_avatar']=$chapternya['img_avatar'];
			$result[$key]['point']=$this->format_angka($val['point_total']);
			
		
		}
		
		$result=$result[0];
		return $result;
	
	}
	
	function listevent($parsing_chaptcher){
		global $CONFIG;
		
		//$sql="select * from {$this->config['DATABASE'][0]['DATABASE']}.ss_event where chapter_id='{$parsing_chaptcher}' and n_status=1 ORDER BY time_end ASC limit 0,2";
		$sql="select * from {$this->config['DATABASE'][0]['DATABASE']}.ss_event where chapter_id='{$parsing_chaptcher}' and n_status='1' AND  time_end >= NOW() ORDER BY time_end ASC limit 0,2";
		
		
		//pr($sql);exit;
		$result= $this->apps->fetch($sql,1);
		foreach($result as $key => $val){
				$result[$key]['time_start']=date("d/m/Y",strtotime($val['time_start']));
				$result[$key]['time_end']=date("d/m/Y",strtotime($val['time_end']));
				$result[$key]['jam_awal']=date("g:i a",strtotime($val['time_start']));
				$result[$key]['jam_akhir']=date("g:i a",strtotime($val['time_end']));
				
			}
		return $result;
	
	}
	function listtantangan($parsing_chaptcher){
		global $CONFIG;
		
		$sql="select *,DATE_FORMAT(start_time,'%d %M') as time_start,DATE_FORMAT(end_time,'%d %M %Y') as time_end 
		from {$this->config['DATABASE'][0]['DATABASE']}.ss_chalangge, {$this->config['DATABASE'][0]['DATABASE']}.ss_challange_detail 
		where ss_chalangge.id=ss_challange_detail.id_challange
		and ss_challange_detail.id_chapter='{$parsing_chaptcher}' and ss_chalangge.n_status='1' AND  end_time >= NOW()  ORDER BY end_time ASC limit 0,2";
		 //pr($sql);exit;
		$result= $this->apps->fetch($sql,1);
		foreach($result as $key => $val){
				$result[$key]['time_start']=date("d/m/Y",strtotime($val['time_start']));
				$result[$key]['time_end']=date("d/m/Y",strtotime($val['time_end']));
				$result[$key]['jam_awal']=date("g:i a",strtotime($val['time_start']));
				$result[$key]['jam_akhir']=date("g:i a",strtotime($val['time_end']));
				
			}
		return $result;
	
	}
	function getTantangan($id,$idchapter){
		$sql = "
				SELECT *,DATE_FORMAT(start_time,'%d/%m/%Y') as date_start,DATE_FORMAT(start_time,'%h:%h:%p') as waktu_start,DATE_FORMAT(end_time,'%d/%m/%Y') as date_end,DATE_FORMAT(start_time,'%d/%m/%Y') as time_start,DATE_FORMAT(end_time,'%d/%m/%Y') as time_end,DATE_FORMAT(end_time,'%h:%h:%p') as waktu_end, ss_category_tantangan.name_category as categ
				FROM {$this->config['DATABASE'][0]['DATABASE']}.ss_chalangge, {$this->config['DATABASE'][0]['DATABASE']}.ss_challange_detail, {$this->config['DATABASE'][0]['DATABASE']}.ss_category_tantangan
				where ss_chalangge.id=ss_challange_detail.id_challange
				and ss_chalangge.category=ss_category_tantangan.id
				and ss_challange_detail.id_chapter='{$idchapter}'
				AND  ss_challange_detail.id='{$id}'";
		
			$rs = $this->apps->fetch($sql); 
			// pr($sql);die;
		return $rs;
	}
	
	function lisskor1($parsing_user){
		
		$sql = "select * from ss_pertandingan where n_status=1";
		$rs = $this->apps->fetch($sql,1);
		
		$a = $rs[0]['id'];
		$b = $rs[1]['id'];
		$c = $rs[2]['id'];
		
		$sql = "
				select * from ss_tebak_skor_detail, ss_pertandingan
				where ss_tebak_skor_detail.pertandingan1=ss_pertandingan.id
				and ss_pertandingan.n_status=1
				and ss_tebak_skor_detail.id_member='{$parsing_user}'
				and ss_pertandingan.id=".$a;
			//pr($sql); die;
			$rs = $this->apps->fetch($sql,1); 			
		return $rs;
	//pr($sql); die;
	}
	
	function lisskor2($parsing_user){
		
		$sql = "select * from ss_pertandingan where n_status=1";
		$rs = $this->apps->fetch($sql,1);
		
		$a = $rs[0]['id'];
		$b = $rs[1]['id'];
		$c = $rs[2]['id'];
		
		$sql = "
				select * from ss_tebak_skor_detail, ss_pertandingan
				where ss_tebak_skor_detail.pertandingan1=ss_pertandingan.id
				and ss_pertandingan.n_status=1
				and ss_tebak_skor_detail.id_member='{$parsing_user}'
				and ss_pertandingan.id=".$b;
			//pr($sql); die;
			$rs = $this->apps->fetch($sql,1); 			
		return $rs;
	//pr($sql); die;
	}
	
	function lisskor3($parsing_user){
		
		$sql = "select * from ss_pertandingan where n_status=1";
		$rs = $this->apps->fetch($sql,1);
		
		$a = $rs[0]['id'];
		$b = $rs[1]['id'];
		$c = $rs[2]['id'];
		
		$sql = "
				select * from ss_tebak_skor_detail, ss_pertandingan
				where ss_tebak_skor_detail.pertandingan1=ss_pertandingan.id
				and ss_pertandingan.n_status=1
				and ss_tebak_skor_detail.id_member='{$parsing_user}'
				and ss_pertandingan.id=".$c;
			//pr($sql); die;
			$rs = $this->apps->fetch($sql,1); 			
		return $rs;
	//pr($sql); die;
	}
	
	function lispertandingan($parsing_user){
		$sql = "select a.*,b.club1,b.club2,b.club3,b.club4,b.club5,b.club6 
				from ss_tebakan_skor a 
				inner join ss_pertandingan_tebakskor b on a.week_id = b.week_id 
				where a.member_id='{$parsing_user}' and b.n_status=1";
			//pr($sql); die;
			$rs = $this->apps->fetch($sql,1); 	
//pr($rs); die;			
		return $rs;
	//pr($sql); die;
	}
	function nonlispertandingan($parsing_user){
		$sql = "select sum(n_status) as total_status from ss_pertandingan_tebakskor";

			$rs = $this->apps->fetch($sql,1); 	
//pr($rs); die;			
		return $rs;
	//pr($sql); die;
	}
	function lispertandingannya(){
		$sql = "
				SELECT * FROM `ss_pertandingan_tebakskor` where n_status=1";
		
			$rs = $this->apps->fetch($sql,1); 
			
			
		return $rs;
	//pr($sql); die;
	}
	
	function lispertandingan1(){
		$sql = "select * from ss_pertandingan where n_status=1";
		
			$rs = $this->apps->fetch($sql,1); 
			$a = $rs[0]['id'];
			$b = $rs[1]['id'];
			$c = $rs[2]['id'];
			// pr($rs);die;
			
			$sql = "select * from ss_pertandingan where n_status=1 and id=".$a;
			$rs = $this->apps->fetch($sql,1); 
		return $rs;
	//pr($sql); die;
	}
	
	function lispertandingan2(){
		$sql = "
				select * from ss_pertandingan where n_status=1";
		
			$rs = $this->apps->fetch($sql,1); 
			$a = $rs[0]['id'];
			$b = $rs[1]['id'];
			$c = $rs[2]['id'];
			// pr($rs);die;
			
			$sql = "select * from ss_pertandingan where n_status=1 and id=".$b;
			$rs = $this->apps->fetch($sql,1); 
		return $rs;
	//pr($sql); die;
	}
	
	function lispertandingan3(){
		$sql = "
				select * from ss_pertandingan where n_status=1";
		
			$rs = $this->apps->fetch($sql,1); 
			$a = $rs[0]['id'];
			$b = $rs[1]['id'];
			$c = $rs[2]['id'];
			// pr($rs);die;
			
			$sql = "select * from ss_pertandingan where n_status=1 and id=".$c;
			$rs = $this->apps->fetch($sql,1); 
		return $rs;
	//pr($sql); die;
	}
	
	
	function selectemail($parsing_email){
		global $CONFIG;
		
		$sql="select * from {$this->config['DATABASE'][0]['DATABASE']}.ss_akses_login sal left join ss_member sm on sal.username=sm.username where sal.username='{$parsing_email}' limit 1";
		$result= $this->apps->fetch($sql,1);
		// pr($sql);exit;
		foreach($result as $key => $val)
		{
			$sql="select * from {$this->config['DATABASE'][0]['DATABASE']}.ss_chapter where id='{$val['chapter_id']}'";
			$fetch= $this->apps->fetch($sql,1);
				$sql="select count(*) as total from {$this->config['DATABASE'][0]['DATABASE']}.ss_member where chapter_id='{$val['chapter_id']}'";
			$countmember= $this->apps->fetch($sql);
			// pr($countmember);exit;
			//pr($fetch[0]['img_avatar']);exit;
			$result[$key]['countmember']=$countmember['total'];
			$result[$key]['img_avatar_chapter']=$fetch[0]['img_avatar'];
			
		}
		//pr($result);exit;
		return $result;
	
	}
	
	function getEvent($id,$idchapter){
	global $CONFIG;
		$sql = "
				SELECT *
				FROM {$this->config['DATABASE'][0]['DATABASE']}.ss_event 
				WHERE chapter_id='{$idchapter}' AND  id='{$id}'";
		
			$rs = $this->apps->fetch($sql,1); 
			
			foreach($rs as $key => $val){
				$result[$key]['time_start']=date("d/m/Y",strtotime($val['time_start']));
				$result[$key]['time_end']=date("d/m/Y",strtotime($val['time_end']));
				$rs[$key]['jam_awal']=date("g:i a",strtotime($val['time_start']));
				$rs[$key]['jam_akhir']=date("g:i a",strtotime($val['time_end']));
				
			}
			//pr($rs);exit;
		return $rs[0];
	}
	
	function updateimg($id=null,$files=null){
	global $CONFIG;
		$sql = "
				UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_member set `img_avatar`='{$files}'
				 where `id`='{$id}'
				
				";
		//pr($sql);exit;
		$rs = $this->apps->query($sql); 
		return true;
	}
	
	function editprofile($data,$id){
	global $CONFIG;
		$password=$this->encrypt($data['password']);
		//pr($password);exit;
		$sql = "
				UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_member set 
				`name`='{$data['name_member']}',
				username='{$data['username']}',
				ktp_sim='{$data['ktp_sim']}',
				`no_tlp`='{$data['no_tlp']}',
				`alamat`='{$data['alamat']}',
				`fb_id`='{$data['fb_id']}',
				`twiiter_id`='{$data['twitter_id']}'				
				 where `id`='{$id}'
				
				";
		
		$rs = $this->apps->query($sql); 
		/*
			$sql = "
				UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_akses_login set 
				`password`='{$password}'
				 where `user_id`='{$id}'
				
				";
		*/
		//pr($sql);exit;
		//$rs = $this->apps->query($sql); 
		
		return true;
	}
	
	function addPersertaevent($id=null,$idevent=null,$cptherid=null){
	global $CONFIG;
		$sql = "
				SELECT *
				FROM {$this->config['DATABASE'][0]['DATABASE']}.ss_list_pesertaevent 
				WHERE event_id='{$idevent}' AND  member_id='{$id}'";
			// pr($sql);die;
			$rs = $this->apps->fetch($sql); 
			if($rs=='')
			{
				$sql = "
						INSERT {$this->config['DATABASE'][0]['DATABASE']}.ss_list_pesertaevent SET
						`event_id`='{$idevent}',
						`chapter_id`='{$cptherid}',
						`member_id`='{$id}',
						`date_checkin`=NOW(),
						`n_status`=1
						
						 
						";
				// pr($sql);exit;
				$rs = $this->apps->query($sql); 
				if($rs)
				{
					$sql="select id,point,chapter_id from {$this->config['DATABASE'][0]['DATABASE']}.ss_member where id='{$id}'";
					$res = $this->apps->fetch($sql);
					// pr($sql);
					$sqlpoint="SELECT  * FROM
							{$this->config['DATABASE'][0]['DATABASE']}.ss_point WHERE type_user=1 AND type_parameter=8";
							// pr($sqlpoint);
					$resultpoint= $this->apps->fetch($sqlpoint);
					if ($resultpoint)
					{
						$sqlInsertPoint = "
								INSERT {$this->config['DATABASE'][0]['DATABASE']}.ss_activity_log SET
								`type_paremeter_point`='{$resultpoint['type_parameter']}',
								'event_id'='{$idevent}',
								`user_id`='{$res['id']}',
								`chapter_id`='{$res['chapter_id']}',
								`point`='{$resultpoint['points']}',
								`date`='NOW()',
								`n_status`=1
								
								 
								";
						//pr($sql);
						$rsInsertPoint = $this->apps->query($sqlInsertPoint); 
						
						
						
						$point = $resultpoint['points']+$res['point'];
						$sql = "
						UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_member set `point`='{$point}' where `id`='{$res['id']}'";
						// pr($sql);
						$rs = $this->apps->query($sql);
						
						// TAMBAH 1 POINT UNTUK CHAPTER
						$sql = "
						UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_chapter set 
						`point`=point+1 where `chapter_id`='{$res['chapter_id']}'";
						// pr($sql);
						$rs = $this->apps->query($sql); 
					}
				}
			}
			else
			{
				if($rs['n_status']==3)
				{
						$sql = "
							UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_list_pesertaevent set 
							`n_status`='1'
							 where `id`='{$rs['id']}'
							
							";
					//pr($sql);exit;
					$rs = $this->apps->query($sql); 
					if($rs)
					{
						$sql="select id,point,chapter_id from {$this->config['DATABASE'][0]['DATABASE']}.ss_member where id='{$id}'";
						$res = $this->apps->fetch($sql);
						
						$sqlpoint="SELECT  * FROM
								{$this->config['DATABASE'][0]['DATABASE']}.ss_point WHERE type_user=1 AND type_parameter=8";
						$resultpoint= $this->apps->fetch($sqlpoint);
						if ($resultpoint)
						{
							$sqlInsertPoint = "
									INSERT {$this->config['DATABASE'][0]['DATABASE']}.ss_activity_log SET
									`type_paremeter_point`='{$resultpoint['type_parameter']}',
									'event_id'='{$idevent}',
									`user_id`='{$res['id']}',
									`chapter_id`='{$res['chapter_id']}',
									`point`='{$resultpoint['points']}',
									`date`='NOW()',
									`n_status`=1
									
									 
									";
							// pr($sql);exit;
							$rsInsertPoint = $this->apps->query($sqlInsertPoint); 
							
							
							
							$point = $resultpoint['points']+$res['point'];
							$sql = "
							UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_member set `point`='{$point}' where `id`='{$res['id']}'";
					
							$rs = $this->apps->query($sql); 
							
							// TAMBAH 1 POINT UNTUK CHAPTER
							
							$sql = "
							UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_chapter set 
							`point`=point+1 where `chapter_id`='{$res['chapter_id']}'";
							// pr($sql);
							$rs = $this->apps->query($sql); 
							
							
							
						}
					}
				}
			}
		$sql = "
				SELECT COUNT(*) as total
				FROM {$this->config['DATABASE'][0]['DATABASE']}.ss_list_pesertaevent 
				WHERE event_id='{$idevent}' AND  n_status=1";
			// pr($sql);die;
			$rs = $this->apps->fetch($sql); 
			if($rs['total']==100)
			{
				$sqlpoint="SELECT  * FROM
								{$this->config['DATABASE'][0]['DATABASE']}.ss_point WHERE type_user=2 AND type_parameter=12";
						$resultpoint= $this->apps->fetch($sqlpoint);
						if ($resultpoint)
						{
							$sqlmember="select id,point,chapter_id from {$this->config['DATABASE'][0]['DATABASE']}.ss_member where id='{$id}'";
							$resmember = $this->apps->fetch($sqlmember);
							
							$sqlchapter="select id,point from {$this->config['DATABASE'][0]['DATABASE']}.ss_chapter where id='{$resmember['chapter_id']}'";
							$reschapter = $this->apps->fetch($sqlchapter);
							
							if($reschapter)
							{
									$sqlInsertPoint = "
											INSERT {$this->config['DATABASE'][0]['DATABASE']}.ss_activity_log SET
											`type_paremeter_point`='{$resultpoint['type_parameter']}',
											`chapter_id`='{$reschapter['id']}',
											`point`='{$resultpoint['points']}',
											`date`='NOW()',
											`n_status`=1
											
											 
											";
									// pr($sql);exit;
									$rsInsertPoint = $this->apps->query($sqlInsertPoint); 
									
									
									
									$point = $resultpoint['points']+$reschapter['point'];
									$sql = "
									UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_chapter set `point`='{$point}' where `id`='{$reschapter['id']}'";
							
									$rs = $this->apps->query($sql); 
							}
						}
			
			}
			// die;
		return true;
	}
	function addPersertaeventreservation($id=null,$idevent=null,$cptherid=null){
	global $CONFIG;
		$sql = "
				SELECT *
				FROM {$this->config['DATABASE'][0]['DATABASE']}.ss_list_pesertaevent 
				WHERE event_id='{$idevent}' AND  member_id='{$id}'";
			// pr($sql);die;
			$rs = $this->apps->fetch($sql); 
			if($rs=='')
			{
				$sql = "
						INSERT {$this->config['DATABASE'][0]['DATABASE']}.ss_list_pesertaevent SET
						`event_id`='{$idevent}',
						`chapter_id`='{$cptherid}',
						`member_id`='{$id}',
						`date_checkin`=NOW(),
						`point`='200',
						`n_status`=3
						
						 
						";
				// pr($sql);exit;
				$rs = $this->apps->query($sql); 
			}
			
		return true;
	}
	
	function skormasuk($data){
	global $CONFIG;
		$weekid = $data['weekid'];
		$member = $data['id_member'];
		$skor1 = $data['skor1'];
		$skor2 = $data['skor2'];
		$skor3 = $data['skor3'];
		$skor4 = $data['skor4'];
		$skor5 = $data['skor5'];
		$skor6 = $data['skor6'];
		
		$sql = "
				INSERT {$this->config['DATABASE'][0]['DATABASE']}.ss_tebakan_skor SET
				`week_id`='{$weekid}',
				`member_id`='{$member}',
				`skor1`='{$skor1}',
				`skor2`='{$skor2}',				
				`skor3`='{$skor3}',
				`skor4`='{$skor4}',
				`skor5`='{$skor5}',
				`skor6`='{$skor6}',
				`created`=NOW()
				
				";
		//pr($sql);exit;
		$rs = $this->apps->query($sql); 
		
		
		return true;
	}
	
	function apibmw($data){
	global $CONFIG;
		
		$firstname = $data['firstname'];
		$lastname = $data['lastname'];
		$phone = $data['phone'];
		$email = $data['email'];
		$photo = $data['photo'];
		
		$sql = "
				INSERT {$this->config['DATABASE'][0]['DATABASE']}.ss_apibmw SET
				`firstname`= {$firstname},
				`lastname`='{$lastname}',
				`phone`='{$phone}',
				`email`='{$email}',
				`photo`='{$email}',
				
				";
		pr($sql);exit;
		$rs = $this->apps->query($sql); 
			
		return true;
	}
	
	function addvoucer($data){
	   global $logger,$CONFIG;
		//pr($data); die;
		$sqlGetVoucer = "SELECT id FROM ss_voucer WHERE n_status='0' order by rand() limit 1";
		$resGetVoucer = $this->apps->fetch($sqlGetVoucer);
		$voucer = $resGetVoucer['id'];
	   
		$sql = "UPDATE {$this->config['DATABASE'][0]['DATABASE']}.ss_member set `voucer_id`='{$voucer}' where `id`='{$data}'";
		
		$rs = $this->apps->query($sql); 
			
		$q = "update ss_voucer SET `n_status`='1' where id='{$voucer}'";
			$r = $this->apps->query($q);
		
		return true;
	}
	
	function listcontent(){
		global $CONFIG;
		$sql="select * from  {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article  sa 
			where sa.n_status=1 and is_aktif=1 order by sa.id DESC		
		";
		
		$result=$this->apps->fetch($sql,1);
		foreach ($result as $key => $val){
			$result[$key]['title'] = stripslashes($val['title']);
			$result[$key]['content'] = strip_tags($val['content']);			
		}
		
		if($result){
			return $result;
		}
		
	}
	
	function listcontentall(){
		global $CONFIG;
		date_default_timezone_set('asia/jakarta');
		$sqlcount="select count(*)as total from  {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article  sa 
			where sa.n_status=1 and is_aktif<>1 order by sa.id DESC		
		";
		
		$total=$this->apps->fetch($sqlcount);
		$total=intval($total['total']);
		
		$totpage=ceil($total / 4);
		
		
		
		$sql="select * from  {$CONFIG['DATABASE'][0]['DATABASE']}.ss_article  sa 
			where sa.n_status=1 and is_aktif<>1 order by sa.id DESC		
		";
				
		$no=1;
		$rs=$this->apps->fetch($sql,1);
		foreach ($rs as $key => $val){
			$result[$key]['title'] = stripslashes($val['title']);
			$result[$key]['content'] = strip_tags($val['content']);		
			$result[$key]['img'] = stripslashes($val['img']);
			$date = date("Y-m-d",strtotime($val['date']));
			list($tahun,$bulan,$tanggal) = explode("-",$val['date']);
			list($hari) = explode(" ",$tanggal);			
			$tgl=$hari;			
			$harinya=date('l',$hari);
			switch ($harinya) {
				case "Thursday":
				$hari="Kamis";
				break;
				case "Sunday":
				$hari="Minggu ";
				break;
				case "Monday":
				$hari="Senin";
				break;
				case "Tuesday":
				$hari="Selasa";
				break;
				case "Wednesday":
				$hari="Rabu";
				break;
				case "Friday":
				$hari="Jumat";
				break;
				case "Saturday":
				$hari="Sabtu";
				break;
			}
			switch ($bulan) {
				case "1":
				$bln="Januari";
				break;
				case "2":
				$bln="Februari ";
				break;
				case "3":
				$bln="Maret";
				break;
				case "4":
				$bln="April ";
				break;
				case "5":
				$bln="Mai";
				break;
				case "6":
				$bln="Juni";
				break;
				case "7":
				$bln="Juli";
				break;
				case "8":
				$bln="Augustus";
				break;
				case "9":
				$bln="September";
				break;
				case "10":
				$bln="Oktober";
				break;
				case "11":
				$bln="November";
				break;
				case "12":
				$bln="Desember";
				break;
			}
			$result[$key]['no']=$no++;
			$result[$key]['waktu']=$hari.", ".$tgl." ".$bln." ".$tahun;
			
		}
		$resultnya=$result;
		$result="";
		$result['artikel']=$resultnya;
		for($i=0;$i<$totpage;$i++){
			$j=$i-1;
			$result['page_inactive']='<li data-slide-to='.$i.' data-target="#news2"></li>';				
		}
		$result['page']=$totpage;
		if($result){
			return $result;
		}
		
	}
}

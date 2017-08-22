<?php
class chaptermanagement extends App{

	function beforeFilter(){
		global $LOCALE,$CONFIG;
		
		$this->chapterHelper = $this->useHelper('chapterHelper');
		$this->uploadHelper = $this->useHelper('uploadHelper');
		$this->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
		$this->assign('basedomainpath', $CONFIG['BASE_DOMAIN_PATH']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);
		$this->assign('locale', $LOCALE[1]);		
		$this->assign('pages', strip_tags($this->_g('page')));
		$this->assign('user',$this->user);
	}
	
	function main($start=null,$limit=1){

		if($this->_request('paramactive')){
		
			$activestatus = $this->chapterHelper->activestatus($id=$this->_request('paramactive'));
		}
		if($this->_request('paraminactive')){
		
			$inactivestatus = $this->chapterHelper->inactivestatus($id=$this->_request('paraminactive'));
		}
		if($this->_request('paramcancel')){
		
			$cancelstatus = $this->chapterHelper->cancelstatus($id=$this->_request('paramcancel'));
		}
		
		
		$listcity=$this->chapterHelper->selectcity();
                $this->assign('listcity',$listcity);

                $listclub=$this->chapterHelper->selectclub();
                $this->assign('listclub',$listclub);
				
		$this->assign('points',@$this->_request('points'));
		$this->assign('startdate',@$this->_request('startdate'));
		$this->assign('enddate',@$this->_request('enddate'));
		$this->assign('search',@$this->_request('search'));
		$this->assign('kota',@$this->_request('kota'));
		$this->assign('clubs',@$this->_request('clubs'));

		$chapterList = $this->chapterHelper->chapter($start=null,$limit=10);
		//pr($chapterList);exit;
		$time['time'] = '%H:%M:%S';
		
		$this->assign('total',$chapterList['total']);
		$this->assign('list',$chapterList['result']);
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/listchapter.html');
	}
	
	function pagingchapter(){
//pr('ss');exit;
		
		$chapterList = $this->chapterHelper->chapter($start=null,$limit=10);
		//pr($storyList);exit;
		if($chapterList==true){
		print json_encode(array('status'=>true,'data'=>$chapterList['result'],'total'=>$chapterList['total']));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		
	}
	function addchapter(){
	global $LOCALE,$CONFIG;
	$validchapter='';
	$validemail='';
	$validpassword='';
	
	$listclub=$this->chapterHelper->selectclub();
	$this->assign("listclub",$listclub);
	$selectcity=$this->chapterHelper->selectcity();
	$this->assign("listcity",$selectcity);	
	
	if(isset($_POST['submit']))
	{	   
	   $data['name_chapter']=strip_tags($this->_p('name_chapter'));
	   $data['name']=strip_tags($this->_p('name'));
	   $data['alamat']=strip_tags($this->_p('alamat'));
	   $data['email']=strip_tags($this->_p('email'));
	   $data['club_fav']=strip_tags($this->_p('club_fav'));
	   $data['kota_chapter']=strip_tags($this->_p('kota_chapter'));
	   $data['facebook']=strip_tags($this->_p('facebook'));
	   $data['twitter']=strip_tags($this->_p('twitter'));
	   $data['headchapter']=strip_tags($this->_p('headchapter'));
	   $data['telp']=strip_tags($this->_p('telp'));
	   $data['password']= $this->encrypt($this->_p('password'));
	   $data['ktp_sim']=strip_tags($this->_p('ktp_sim'));
	   $data['regdate']=strip_tags($this->_p('regdate'));
	   $data['chapter_id']=strip_tags($this->_p('chapter_id'));
	   
	   $valid='';
	   if($data['name_chapter']==''){
			$valid='ada';
			$validchapter='kolom ini harus diisi';
	   }
	    if($data['email']==''){
			$valid='ada';
			$validemail='kolom ini harus diisi';
	   }
	    if($data['password']==''){
			$valid='ada';
			$validpassword='kolom ini harus diisi';
	   }
	   
	   $cekchapter=$this->chapterHelper->cekchapter($data);
	    if($valid){
		  // input tidak valid
		  $this->assign("name_chapter", $data['name_chapter']);	
		  $this->assign("email", $data['email']);	
		  $this->assign("password", $data['password']);	
		  $this->assign("name_chapter_no",$validchapter);	
		  $this->assign("email_no",$validemail);	
		  $this->assign("password_no",$validpassword);		  
	   }else if($cekchapter){
		   //input valid dan chapter pernah di insert
		   
		   if ($cekchapter['n_status'] == 2) {// input valid dan chapter pernah insert tapi deleted		
				
				// delete dari ss_akses_login yang punya email sama & role = 1
			    $aksesloginhapus = $this->chapterHelper->aksesloginhapus($data);
			   
			   // delete dari ss_chapter yang punya email sama
			    $chapterhapus = $this->chapterHelper->chapterhapus($data);	
			   
				
			   // addchapter
			    $addchapter = $this->chapterHelper->addchapter($data);	   		
				if($addchapter){
						sendredirect($CONFIG['ADMIN_DOMAIN'].'chaptermanagement');
				}
			   //add new chapter
		   } else {
			   // input valid dan chapter pernah insert tapi AKTIF
				  $this->assign("name_chapter", $data['name_chapter']);	
				  $this->assign("email", $data['email']);	
				  $this->assign("password", $data['password']);	
				  $this->assign("name_chapter_no",$validchapter);	
				  $validemail = 'Email sudah terdaftar';
				  $this->assign("email_no",$validemail);	
				  $this->assign("password_no",$validpassword);				   
		   }
	   }else{
		   //input valid dan chapter belum pernah di insert
		   $addchapter = $this->chapterHelper->addchapter($data);	   		
			if($addchapter)
			{
				sendredirect($CONFIG['ADMIN_DOMAIN'].'chaptermanagement');
			}
	   }
	}
	
	return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/addchapter.html');
	
	}
	function hapus(){

	//pr('ss');exit;
	$inisiasi=$this->_g('param');
	$deletechapter = $this->chapterHelper->deletechapter($inisiasi);
	if($deletechapter==true)
			{
				sendredirect('chapter');
				die;
			}	
	
	}
		
	function checkit(){

		
		$storyList = $this->chapterHelper->checkchapter();
		//pr($storyList);exit;
		if($storyList==true){
		print json_encode(array('status'=>true));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		
	}
	
	
	function incheckit(){

		
		$storyList = $this->chapterHelper->checkinactives();
		//pr($storyList);exit;
		if($storyList==true){
		print json_encode(array('status'=>true));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		
	}
	
	
	function editchapter(){
		global $LOCALE,$CONFIG;
		//pr('ss');exit;
		//pr($_POST);exit;
		
		if(isset($_POST['submit'])){
		
		   $data['name']=strip_tags($this->_p('name'));
		   $data['alamat']=$this->_p('alamat');
		   $data['email']=$this->_p('email');
		   $data['password']=$this->_p('password');
		   $data['club_fav'] =$this->_p('club_fav');
		   $data['kota_chapter'] =$this->_p('kota_chapter');
		   $data['facebook'] =$this->_p('facebook');
		   $data['twitter'] =$this->_p('twitter');
		   $data['headchapter'] =$this->_p('headchapter');
		   $data['telp'] =$this->_p('telp');
		   $data['Facs'] =$this->_p('Facs');
		   $data['Latitude']=$this->_p('Latitude');
		   $data['Longitude'] =$this->_p('Longitude');
		   $data['Information'] =$this->_p('Information');
		   $data['Day'] =$this->_p('Day');
		   $data['Opening']=$this->_p('Opening');
		   $data['Closing'] =$this->_p('Closing');
		   $data['TimeZone']=$this->_p('TimeZone');
		   $data['id']=$this->_p('id');
		   $data['chapter_id']=$this->_p('chapter_id');
				
			$editchapter = $this->chapterHelper->editchapter($data);
			
			if($editchapter)
			{
				sendredirect($CONFIG['ADMIN_DOMAIN'].'chapter');
			}
		}
		$inisiasi=$this->_g('paramid');
		//pr($inisiasi);exit;	
		$selectchapter = $this->chapterHelper->selectchapter($inisiasi);
		//pr($selectchapter);exit;
		
		$this->assign('listnya',$selectchapter);
		$listclub=$this->chapterHelper->selectclub();
        $this->assign('listclub',$listclub);
		$listcity=$this->chapterHelper->selectcity();
		$this->assign('listcity',$listcity);
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/editchapter.html');
	}
	protected function encrypt($string)
	{	
		// $ENC_KEY='youknowwho2014';
		$ENC_KEY='123456';
		return base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), $string, MCRYPT_MODE_CBC, md5(md5($ENC_KEY))));
	}
	protected function decrypt($encrypted)
	{
		$ENC_KEY='123456';
		return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($ENC_KEY), base64_decode($encrypted), MCRYPT_MODE_CBC, md5(md5($ENC_KEY))), "\0");
	}
	
}
?>

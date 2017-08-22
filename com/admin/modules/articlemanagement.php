<?php
class articlemanagement extends App{

	function beforeFilter(){
		global $LOCALE,$CONFIG;
		$this->articleHelper = $this->useHelper('articleHelper');
		$this->articleHelper = $this->useHelper('articleHelper');
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
		
			$activestatus = $this->articleHelper->activestatus($id=$this->_request('paramactive'));
		}
		if($this->_request('paraminactive')){
		
			$inactivestatus = $this->articleHelper->inactivestatus($id=$this->_request('paraminactive'));
		}		
		if($this->_request('paramcancel')){
		
			$cancelstatus = $this->articleHelper->cancelstatus($id=$this->_request('paramcancel'));
		}
				
		$this->assign('status',@$this->_request('status'));
		$this->assign('category',@$this->_request('category'));
		$this->assign('startdate',@$this->_request('startdate'));
		$this->assign('enddate',@$this->_request('enddate'));
		$this->assign('search',@$this->_request('search'));


		$articleList = $this->articleHelper->article($start=null,$limit=10);
		//pr($articleList);exit;
		$time['time'] = '%H:%M:%S';
		
		$this->assign('total',$articleList['total']);
		$this->assign('list',$articleList['result']);
		
		return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/listarticle.html');
	}
	
	function pagingarticle(){
//pr('ss');exit;
		
		$articleList = $this->articleHelper->article($start=null,$limit=10);
		//pr($storyList);exit;
		if($articleList==true){
		print json_encode(array('status'=>true,'data'=>$articleList['result'],'total'=>$articleList['total']));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		
	}
	function addarticle(){
	global $LOCALE,$CONFIG;
	if(isset($_POST['submit']))
	{
	
	   $data['title']=strip_tags($this->_p('title'));
	   $data['content']=$this->_p('content');
	   if($_FILES['img']['name'])
		{
			$path = $CONFIG['LOCAL_PUBLIC_ASSET']."news/";
			$img1['name']=@$_FILES['img']['name'];
			$img1['type']=@$_FILES['img']['type'];
			$img1['tmp_name']=@$_FILES['img']['tmp_name'];
			$img1['error']=@$_FILES['img']['error'];
			$img1['size']=@$_FILES['img']['size'];
			//pr($img);exit;
			$uploadfiles = $this->uploadHelper->uploadThisImage($img1,$path,1000,false,false);
			$data['img']=$uploadfiles['arrImage']['filename'];
			
			
		}
			
		$addarticle = $this->articleHelper->prosesaddarticle($data);
		
		if($addarticle)
		{
			sendredirect($CONFIG['ADMIN_DOMAIN'].'article');
		}
	}
	
	return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/addarticle.html');
	
	}
	function hapus(){

	//pr('ss');exit;
	$inisiasi=$this->_g('param');
	$deletearticle = $this->articleHelper->deletearticle($inisiasi);
	if($deletearticle==true)
			{
				sendredirect('article');
				die;
			}	
	
	}
		
	function checkit(){

		
		$storyList = $this->articleHelper->checkarticle();
		//pr($storyList);exit;
		if($storyList==true){
		print json_encode(array('status'=>true));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		
	}
	
	
	function incheckit(){		
		$storyList = $this->articleHelper->checkinactives();
		//pr($storyList);exit;
		if($storyList==true){
		print json_encode(array('status'=>true));
		}else{ 
			print json_encode(array('status'=>false));
		}
		
		exit;
		
	}
	
	
	function editarticle(){
	global $LOCALE,$CONFIG;	
	
	if(isset($_POST['submit']))
	{
		$data['idnya']=$this->_p('idnya');
		$data['title']=strip_tags($this->_p('title'));
		$data['content']=$this->_p('content');
		
	    if($_FILES['img']['name'])
		{
			$path = $CONFIG['LOCAL_PUBLIC_ASSET']."news/";
			$img1['name']=@$_FILES['img']['name'];
			$img1['type']=@$_FILES['img']['type'];
			$img1['tmp_name']=@$_FILES['img']['tmp_name'];
			$img1['error']=@$_FILES['img']['error'];
			$img1['size']=@$_FILES['img']['size'];
			//pr($img);exit;
			$uploadfiles = $this->uploadHelper->uploadThisImage($img1,$path,1000,false,false);
			$data['img']=$uploadfiles['arrImage']['filename'];
			
			
		}	
		$editarticle = $this->articleHelper->editarticle($data);
		
		if($editarticle)
		{
			sendredirect($CONFIG['ADMIN_DOMAIN'].'articlemanagement');
		}
	}
	$inisiasi=$this->_g('param');	
	$selectarticle = $this->articleHelper->selectarticle($inisiasi);
	
	$this->assign('listnya',$selectarticle);
	
	return $this->View->toString(TEMPLATE_DOMAIN_ADMIN .'/apps/editarticle.html');
	}
	
	
}
?>

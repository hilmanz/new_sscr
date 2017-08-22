<?php
class login extends App{
		
	function beforeFilter(){
	global $CONFIG,$logger;
		$this->loginHelper = $this->useHelper('loginHelper');
		
		$this->assign('lastnews', $news);
		$this->assign('lastpress', $press);
		$this->user=$this->session->getSession($this->config['SESSION_NAME'],"WEB");
	
	}
	
		
	function community(){
		global $CONFIG,$logger;
		
		
		$basedomain = $CONFIG['BASE_DOMAIN'];
		// pr( $this->session->getSession($CONFIG['SESSION_NAME'],"jobposttmp"));die;
		$this->assign('basedomain',$basedomain);
		$this->homeHelper = $this->useHelper('homeHelper');
		
		$pagechapter = $this->_request('startchapter');
		$pagemember = $this->_request('startmember');
		$leaderChapter = $this->homeHelper->chapter($pagechapter,$rows=10);
		$leaderMember = $this->homeHelper->member($pagemember,$rows=10);
		
		$this->assign("msg",'');
		$this->assign("leaderChapter",$leaderChapter['data']);
		// pr($leaderMember);die;
		$this->assign("totalleaderChapter",$leaderChapter['total']);
		$this->assign("leaderMember",$leaderMember['data']);
		$this->assign("totalleaderMember",$leaderMember['total']);
		
		if($this->_p('login'))
		{
			if($this->_p('verification')=='')
			{				
				$this->assign("msg","Anda belum menyetujui Syarat dan Ketentuan di bawah ini");
				return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/chapter_login.html');
				
			}
			
			if($this->_p('email')&&$this->_p('password')&&$this->_p('verification')==1){
			
					$res = $this->loginHelper->loginSession();
					
					$this->user=$this->session->getSession($CONFIG['SESSION_NAME'],"WEB");
					if($res['status']==1){
						$this->log('login','welcome');
						$this->assign("msg","");
						if( $this->user->role==1)
						{
							
							sendRedirect("{$CONFIG['BASE_DOMAIN']}chapter/home");
							
						}
						else
						{
							sendRedirect("{$CONFIG['BASE_DOMAIN']}member/home");
														
						}
							
					}
					else
					{
					
						$this->assign("msg",$res['msg']);
					}
				
			}
			else
			{			
				$this->assign("msg","Username atau Password yang Anda masukkan salah.");
			}
		}		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/chapter_login.html');
	}
	
	function member(){
		global $CONFIG,$logger;
		
		
		$basedomain = $CONFIG['BASE_DOMAIN'];
		// pr( $this->session->getSession($CONFIG['SESSION_NAME'],"jobposttmp"));die;
		$this->assign('basedomain',$basedomain);
		$this->homeHelper = $this->useHelper('homeHelper');
		
		$pagechapter = $this->_request('startchapter');
		$pagemember = $this->_request('startmember');
		$leaderChapter = $this->homeHelper->chapter($pagechapter,$rows=10);
		$leaderMember = $this->homeHelper->member($pagemember,$rows=10);
		
		$this->assign("msg",'');
		$this->assign("leaderChapter",$leaderChapter['data']);
		// pr($leaderMember);die;
		$this->assign("totalleaderChapter",$leaderChapter['total']);
		$this->assign("leaderMember",$leaderMember['data']);
		$this->assign("totalleaderMember",$leaderMember['total']);
		
		if($this->_p('login'))
		{
			if($this->_p('verification')=='')
			{				
				$this->assign("msg","Anda belum menyetujui Syarat dan Ketentuan di bawah ini");
				return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/chapter_login.html');
				
			}
			
			if($this->_p('email')&&$this->_p('password')&&$this->_p('verification')==1){
			
					$res = $this->loginHelper->loginSession();

					$this->user=$this->session->getSession($CONFIG['SESSION_NAME'],"WEB");
					if($res['status']==1){
						$this->log('login','welcome');
						$this->assign("msg","");
						if( $this->user->role==1)
						{
							
							sendRedirect("{$CONFIG['BASE_DOMAIN']}chapter/home");
							
						}
						else
						{
							sendRedirect("{$CONFIG['BASE_DOMAIN']}member");
														
						}
							
					}
					else
					{
					
						$this->assign("msg",$res['msg']);
					}
				
			}
			else
			{			
				$this->assign("msg","Username atau Password yang Anda masukkan salah.");
			}
		}		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/chapter_login.html');
	}
	
	function forgotpassword(){
		global $CONFIG,$logger;
		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/forgot_password.html');
	}
}
?>

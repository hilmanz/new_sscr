<?php
class campus extends App{
	
	function beforeFilter(){
 		
		global $LOCALE,$CONFIG;
		$this->assign('basedomain',$CONFIG['BASE_DOMAIN']); 
		$this->memberHelper = $this->useHelper('memberHelper');
		$this->homeHelper = $this->useHelper('homeHelper');
		$this->tantanganHelper = $this->useHelper('tantanganHelper');
		$this->assign('pages','campus'); 
	}
	
	function main(){		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_home.html');
	}
	
	function about(){
		$this->assign('pages','about'); 
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_about.html');
	}
	
	function berita(){		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_berita.html');
	}
	
	function login(){		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_login.html');
	}
	
	function carabermain(){		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_carabermain.html');
	}
	
	function leaderboard(){
		$pagecampus = $this->_request('startcampus');
		$pagecampus = $this->_request('startcampus');
		
		$leaderChapter = $this->homeHelper->member($pagecampus,$rows=10);
		$leaderMember = $this->homeHelper->member($pagecampus,$rows=10);
		
		$this->assign("msg",'');
		$this->assign("leaderChapter",$leaderChapter['data']);
		
		$this->assign("totalleaderChapter",$leaderChapter['total']);
		$this->assign("leaderMember",$leaderMember['data']);
		$this->assign("totalleaderMember",$leaderMember['total']);
		$this->assign("msg",'');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_leaderboard.html');
	}
	
	function event(){
		$this->user->user_id=13;
		$result=$this->campusHelper->event(13);
		$resultold=$this->campusHelper->eventold(13);
		
		$this->assign('dataevent',$result); 
		$this->assign('dataeventold',$resultold); 
		$this->assign("msg",'');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_event.html');
	}
	
	function eventdetail(){
		$idevent=474;
			// pr($idevent);
		
		$result=$this->campusHelper->getEvent($idevent,13);
		//pr($result);exit;
		$resultpeserta=$this->campusHelper->getEventpeserta($idevent,$this->user->user_id);
		// pr($result);die;
		$this->assign('dataevent',$result[0]); 
		$this->assign('upload_foto',$result[0]['upload_foto']); 
		$this->assign('idevent',$idevent); 
		$this->assign('dataeventpeserta',$resultpeserta); 
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_eventdetail.html');
	}
	
	function eventtambah(){		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_eventtambah.html');
	}
	
	function campuslist(){		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_campuslist.html');
	}
	
	function campustambah(){		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_campustambah.html');
	}
	
	function profile(){		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_profile.html');
	}
	
	function profileedit(){		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_profileedit.html');
	}
	
	function syarat(){		
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'apps/campus_profileedit.html');
	}
	
}
?>

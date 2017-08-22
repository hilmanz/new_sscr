<?php
class lates_engagement_box {
	
	function __construct($apps=null){		
			$this->apps = $apps;	
			global $LOCALE,$CONFIG;
			$this->apps->assign('basedomain', $CONFIG['ADMIN_DOMAIN']);
			$this->apps->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_ADMIN']);
			$this->apps->assign('locale',$LOCALE[$this->apps->lid]);
			$this->apps->assign('users', $this->apps->user);
	}

	function main(){

		return $this->apps->View->toString(TEMPLATE_DOMAIN_ADMIN ."widgets/lates-engagement-box.html");	
	}
}
?>
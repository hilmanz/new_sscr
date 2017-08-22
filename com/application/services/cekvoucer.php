<?php
class cekvoucer extends ServiceAPI{
	
	function beforeFilter(){
	
		$this->appsHelper = $this->useHelper('appsHelper'); 
		$this->uploadHelper = $this->useHelper('uploadHelper'); 
		$this->newsHelper = $this->useHelper('newsHelper');
		$this->twitterHelper  = $this->useHelper('twitterHelper');
		$this->FacebookHelper  = $this->useHelper('FacebookHelper');
		
		global $LOCALE,$CONFIG;
		$this->assign('basedomain', $CONFIG['BASE_DOMAIN']);
		$this->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);
		$this->assign('locale', $LOCALE[1]);		
		$this->assign('pages', strip_tags($this->_g('page')));		
	}
	function voucer()
	{
		$contents=file_get_contents('/home/gte/region1/tools/cron/gte_broadcast-voucer-info.sh');
		echo shell_exect($contents);
	}
}
?>
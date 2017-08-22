<?php
class home extends App{
	
	function beforeFilter(){
 		
		global $LOCALE,$CONFIG;
		$this->assign('basedomain',$CONFIG['BASE_DOMAIN']); 
		$this->assign('pages','index'); 
		
	}
	
	function main(){
		
		$this->assign("pages",'index');
		return $this->View->toString(TEMPLATE_DOMAIN_WEB .'home.html');
	}
	
}
?>

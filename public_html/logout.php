<?phpinclude_once "common.php";include_once $ENGINE_PATH."Utility/Debugger.php";$logger = new Debugger();$logger->setAppName('applogin');$logger->setDirectory('../logs/');$application = new Application();$application->log('logout','bye bye');$application->assign('assets_domain', $CONFIG['ASSETS_DOMAIN_WEB']);$application->assign("msg","");$application->assign("link","logout.php");	if(isset($_SESSION['lid'])) $lid = $_SESSION['lid'];	else $lid = 1;	if($lid=='')$lid=1;	$application->assign('locale',$LOCALE[$lid]);// pr($application);$application->assign('meta',$application->View->toString(TEMPLATE_DOMAIN_WEB . "/meta.html"));$application->assign('header',$application->View->toString(TEMPLATE_DOMAIN_WEB . "/header.html"));//$application->assign('footer',$application->View->toString(TEMPLATE_DOMAIN_WEB . "/footer.html"));$application->assign('mainContent',$application->View->toString(TEMPLATE_DOMAIN_WEB . '/login_message.html'));//pr($_SESSION);exit;session_destroy();unset($_SESSION);sendRedirect($CONFIG['BASE_DOMAIN']);/* pr($this->session->getSession($this->config['SESSION_NAME'],"WEB"));exit; */print $application->out(TEMPLATE_DOMAIN_WEB . '/master.html');die();?>
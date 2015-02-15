<?php include_once dirname(__FILE__).'/core/function.class.php';?>
<?php include_once dirname(__FILE__).'/core/session.class.php';?>
<?php include_once dirname(__FILE__).'/configure.php';?>
<?php include_once dirname(__FILE__).'/core/app.class.php';?>
<?php include_once dirname(__FILE__).'/core/filter.class.php';?>
<?php include_once dirname(__FILE__).'/core/request.class.php';?>
<?php
	App::init();
	spl_autoload_register(array('App', 'load'));
	$requst = new BaseRequest();
	$auth = new AuthManager();
	$session = new Session();
	$userSessionObj = $session->get('usrSession');
	$auth->AuthTest(Functions::geturl(), $userSessionObj);
	
	//Functions::directDisplay($auth->AuthTest("", "")); 
	//echo Functions::geturl();
	//Functions::display(Configure::$HOME);
	//echo Functions::geturl();
?>
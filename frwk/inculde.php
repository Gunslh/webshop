<?php include_once 'core/function.class.php';?>
<?php include_once 'core/session.class.php';?>
<?php include_once 'configure.php';?>
<?php include_once 'core/app.class.php';?>
<?php include_once 'core/filter.class.php';?>
<?php include_once 'core/request.class.php';?>
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
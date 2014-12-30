<?php include_once '../../frwk/inculde.php'; ?>
<?php
	$usr = $_POST["usrname"];
	$pwd = $_POST["usrpwd"];
	$json['status'] = ErrorCode::E_SUCCESS;
	$session = new Session();
	$entity = new AdminUser();
	if($entity->Auth($usr, $pwd) == 1)
	{
		$usrDao = $entity->Get($usr);
		$session->add("usrSession",$usrDao);
		$json["msg"] = ErrorCode::GetErr(ErrorCode::E_SUCCESS);
	}
	else {
		$json['status'] = ErrorCode::E_LOGIN_FAIL;
		$json["msg"] = ErrorCode::GetErr(ErrorCode::E_LOGIN_FAIL);	
	}
	echo json_encode($json);
?>
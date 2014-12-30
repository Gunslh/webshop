<?php include_once '../../frwk/inculde.php'; ?>
<?php
	$usr = isset($_POST["usrname"])?$_POST["usrname"]:"NULL";
	$pwd = isset($_POST["usrpwd"])?$_POST["usrpwd"]:"NULL";
	$name = isset($_POST["usrrealname"])?$_POST["usrrealname"]:"NULL";
	$tele = isset($_POST["usrtele"])?$_POST["usrtele"]:"NULL";
	$zipCode = isset($_POST["usrzipcode"])?$_POST["usrzipcode"]:"NULL";
	$addr = isset($_POST["usraddr"])?$_POST["usraddr"]:"NULL";
	
	if($usr == "NULL" || $pwd == "NULL" || $name == "NULL" || $tele == "NULL")
	{
		$json['status'] = ErrorCode::E_INPUT_ERROR;
		$json["msg"] = ErrorCode::GetErr(ErrorCode::E_INPUT_ERROR);
		echo json_encode($json);
		return;
	}
	
	$json['status'] = ErrorCode::E_SUCCESS;
	$AddUser = new UserManager();
	if($AddUser->Add($usr, $pwd, $name, $tele, $zipCode, $addr) == true)
	{
		$json['status'] = ErrorCode::E_SUCCESS;
		$json["msg"] = ErrorCode::GetErr(ErrorCode::E_SUCCESS);
	}
	else {
		$json['status'] = ErrorCode::E_LOGIN_FAIL;
		$json["msg"] = ErrorCode::GetErr(ErrorCode::E_LOGIN_FAIL);	
	}
	echo json_encode($json);
?>
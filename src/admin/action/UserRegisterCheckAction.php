<?php include_once '../../frwk/inculde.php'; ?>
<?php
	$usr = $_POST["usrname"];
	$json['status'] = ErrorCode::E_SUCCESS;
	$entity = new UserManager();
	if($entity->CheckUserExists($usr) == true)
	{
		$json["msg"] = ErrorCode::GetErr(ErrorCode::E_IS_EXISTS);
	}
	else {
		$json['status'] = ErrorCode::E_NOT_EXISTS;
		$json["msg"] = ErrorCode::GetErr(ErrorCode::E_NOT_EXISTS);	
	}
	echo json_encode($json);
?>

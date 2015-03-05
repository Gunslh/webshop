<?php

class UserRegisterAction extends AjaxAction
{
	public function register()
	{
		$usr = $_POST["usrname"];
		$pwd = $_POST["usrpwd"];
		$name = $_POST["usrrealname"];
		$tele = $_POST["usrtele"];
		$zipCode = $_POST["usrzipcode"];
		$addr = $_POST["usraddr"];

		if(empty($usr) || empty($pwd) || empty($name) || empty($tele))
		{
			$json = new stdClass();
			$json.status = ;
			$json.msg = ;
			echo json_encode($json, true);

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
	}
}
?>

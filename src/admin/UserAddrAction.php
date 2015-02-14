<?php include_once '../../frwk/inculde.php'; ?>
<?php
$act = $_POST["act"];

$json['status'] = ErrorCode::E_SUCCESS;
switch($act)
{
	case 'add':
		$usr = isset($_POST["usrname"])?$_POST["usrname"]:"NULL";
		$name = isset($_POST["usrrealname"])?$_POST["usrrealname"]:"NULL";
		$contry = isset($_POST["contry"])?$_POST["contry"]:"NULL";
		$tele = isset($_POST["usrtele"])?$_POST["usrtele"]:"NULL";
		$zipCode = isset($_POST["usrzipcode"])?$_POST["usrzipcode"]:"NULL";
		$area = isset($_POST["area"])?$_POST["area"]:"NULL";
		$flag = isset($_POST["flag"])?$_POST["flag"]:"NULL";
	
		if($usr == "NULL" || $name == "NULL" || $contry == "NULL" || $tele == "NULL" || $zipCode == "NULL" || $area == "NULL")
		{
			$json['status'] = ErrorCode::E_INPUT_ERROR;
			$json["msg"] = ErrorCode::GetErr(ErrorCode::E_INPUT_ERROR);
			echo json_encode($json);
			return;
		}
	
		if($flag != "0" && $flag != "1")
		{
			$json['status'] = ErrorCode::E_INPUT_ERROR;
			$json["msg"] = ErrorCode::GetErr(ErrorCode::E_INPUT_ERROR);
			echo json_encode($json);
			return;
		}
		
		$json['status'] = ErrorCode::E_SUCCESS;
		$AddUserAddr = new UserAddrManager();
		if($AddUserAddr->Add($usr, $name, $contry, $tele, $zipCode, $area, $flag) == true)
		{
			$json['status'] = ErrorCode::E_SUCCESS;
			$json["msg"] = ErrorCode::GetErr(ErrorCode::E_SUCCESS);
		}
		else {
			$json['status'] = ErrorCode::E_LOGIN_FAIL;
			$json["msg"] = ErrorCode::GetErr(ErrorCode::E_LOGIN_FAIL);	
		}
		break;
	case 'del':
		$pkid = isset($_POST["pkid"])?$_POST["pkid"]:"NULL";
		if($pkid == "NULL")
		{
			$json['status'] = ErrorCode::E_INPUT_ERROR;
			$json["msg"] = ErrorCode::GetErr(ErrorCode::E_INPUT_ERROR);
			echo json_encode($json);
			return;
		}
		
		$json['status'] = ErrorCode::E_SUCCESS;
		$DelUserAddr = new UserAddrManager();
		if($DelUserAddr->Del($pkid) == true)
		{
			$json['status'] = ErrorCode::E_SUCCESS;
			$json["msg"] = ErrorCode::GetErr(ErrorCode::E_SUCCESS);
		}
		else {
			$json['status'] = ErrorCode::E_ERROR;
			$json["msg"] = ErrorCode::GetErr(ErrorCode::E_ERROR);
		}
	case 'show':
		$pkid =  $_POST["pkid"];
		$GetUserAddr = new UserAddrManager();
		$val = $GetUserAddr->Get($pkid);
		$val->status = ErrorCode::E_SUCCESS;;
		$val->msg = "show ok";
		$json = $val;
		break;
	default:
		$json['status'] = ErrorCode::E_UNKOWN_ACT;
		$json['msg'] = ErrorCode::GetErr(ErrorCode::E_UNKOWN_ACT);
}
echo json_encode($json);
?>
<?php include_once '../../frwk/inculde.php'; ?>
<?php
$act = $_POST["act"];

$json['status'] = ErrorCode::E_SUCCESS;
switch($act)
{
	case 'add':
		$usr = isset($_POST["usrname"])?$_POST["usrname"]:"NULL";
		$name = isset($_POST["usrrealname"])?$_POST["usrrealname"]:"NULL";
		$prodId = isset($_POST["prodId"])?$_POST["prodId"]:"NULL";
		$num = isset($_POST["num"])?$_POST["num"]:"NULL";
		$unitPrice = isset($_POST["unitPrice"])?$_POST["unitPrice"]:"NULL";
	
		if($usr == "NULL" || $name == "NULL" || $prodId == "NULL")
		{
			$json['status'] = ErrorCode::E_INPUT_ERROR;
			$json["msg"] = ErrorCode::GetErr(ErrorCode::E_INPUT_ERROR);
			echo json_encode($json);
			return;
		}
	
		if($num < 0 || $unitPrice < 0)
		{
			$json['status'] = ErrorCode::E_INPUT_ERROR;
			$json["msg"] = ErrorCode::GetErr(ErrorCode::E_INPUT_ERROR);
			echo json_encode($json);
			return;
		}
		
		$json['status'] = ErrorCode::E_SUCCESS;
		$ShoppingCartAdd = new UserShoppingCartManager();
		if($ShoppingCartAdd->Add($usr, $name, $prodId, $num, $unitPrice) == true)
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
		$DelShoppingCart = new UserShoppingCartManager();
		if($DelShoppingCart->Del($pkid) == true)
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
		$GetShoppingCart = new UserShoppingCartManager();
		$val = $GetShoppingCart->Get($pkid);
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
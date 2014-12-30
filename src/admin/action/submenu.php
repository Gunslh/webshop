<?php include_once '../../frwk/inculde.php'; ?>
<?php
$act = isset($_POST["act"])?$_POST["act"]:"add";
$json["status"] = ErrorCode::E_SUCCESS;

switch($act)
{
	case 'add':
		
		$name = $_POST["name"];
		$descr = $_POST["descr"];
		$seoTitle = $_POST["seo_title"];
		$seoDescr = $_POST["seo_descr"];
		$seoKeyword = $_POST["seo_keyword"];
		$isShow = $_POST["isShow"];
		$discount = $_POST["discount"];
		$fk_cateId = $_POST["fk_cateId"];
		$guid = "";
		$subMenu = new SubMenu();
		$imagesUrl = $_POST["images"];
		//$imagesUrl = "/frwk/upload/tmp/1.jpg|/frwk/upload/tmp/2.jpg|/frwk/upload/tmp/3.jpg|";
		if($subMenu->SelectCountBy("t_menuName", $name) > 0)
		{
			$json['status'] = ErrorCode::E_DB_DUPLICATE;
			$json['msg'] = ErrorCode::GetErr(ErrorCode::E_DB_DUPLICATE);
		}
		else 
		{
			
			$media = new MediaManager();
			$mediaId = $media->saveMedia($imagesUrl);

			if($mediaId != false)
			{				
// 				$json['msg'] = $subMenu->Add($name, $descr, $mediaId, $isShow, $discount, $guid, $seoTitle, $seoDescr, $seoKeyword,$fk_cateId);
// 				$json['status'] = ErrorCode::E_FILE_ERR;
// 				echo json_encode($json);
// 				return;
				if ($subMenu->Add($name, $descr, $mediaId, $isShow, $discount, $guid, $seoTitle, $seoDescr, $seoKeyword,$fk_cateId) == false)
				{
					$json['status'] = ErrorCode::E_DB_ERR;
					$json['msg'] = ErrorCode::GetErr(ErrorCode::E_DB_ERR);
				}		
				else	
					$json['msg'] = "add success";
			}
			else
			{
				$json['status'] = ErrorCode::E_FILE_ERR;
				$json['msg'] = ErrorCode::GetErr(ErrorCode::E_FILE_ERR);
			}
		}
	break;
	case 'show':
		$pkid =  $_POST["pkid"];
		$subMenu = new SubMenu();
		$val = $subMenu->FindById($pkid);
		$val->status = ErrorCode::E_SUCCESS;;
		$val->msg = "show ok";
		$json = $val;
		break;
	case 'update':
	
		$pkid =  $_POST["pkid"];
		$name = $_POST["name"];
		$descr = $_POST["descr"];
		$seoTitle = $_POST["seo_title"];
		$seoDescr = $_POST["seo_descr"];
		$seoKeyword = $_POST["seo_keyword"];
		$isShow = $_POST["isShow"];
		$discount = $_POST["discount"];
		$subMenu = new SubMenu();

		if ($subMenu->Update($pkid, $name, $descr, "", $isShow, $discount,  $seoTitle, $seoDescr, $seoKeyword) == false)
		{
			$json['status'] = ErrorCode::E_DB_ERR;
			$json['msg'] = ErrorCode::GetErr(ErrorCode::E_DB_ERR);
		}
		else
			$json['msg'] = "update success";
		break;
	case 'del':
		$pkid =  $_POST["pkid"];
		$subMenu = new SubMenu();
		$subMenu->Del($pkid);
		$json['msg'] = "delete action success.";
	break;	
	
	case 'filedel':
		$path = $_POST['path'];
		$upload = new UploadManager();
		$upload->delete($path);
		$json['msg'] = "delete action success.";
		break;
	default:
		$json["status"] = ErrorCode::E_UNKOWN_ACT;
		$json['msg'] = ErrorCode::GetErr(ErrorCode::E_UNKOWN_ACT);
}
echo json_encode($json);
?>
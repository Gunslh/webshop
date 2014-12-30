<?php include_once '../../frwk/inculde.php'; ?>
<?php
$act = isset($_POST["act"])?$_POST["act"]:"unkown";
//$act = "getbymenuid";
$json["status"] = ErrorCode::E_SUCCESS;

switch($act)
{
	case 'add':
		$poduct = new Product();
		$name = $_POST["name"];
		$descr = $_POST["descr"];
		$seoTitle = $_POST["seo_title"];
		$seoDescr = $_POST["seo_descr"];
		$seoKeyword = $_POST["seo_keyword"];
		$subselect = $_POST["subselect"];
		$cateselect = $_POST["cateselect"];
		$isShow = $_POST["isShow"];
		$discount = $_POST["discount"];
		$price = $_POST['price'];
		$imagesUrl = $_POST["images"];
		$guid = "";
		
		if($poduct->SelectCountBy("t_title", $name) > 0)
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
				if ($poduct->Add($name, $descr, $mediaId, $isShow, $discount, $guid, $seoTitle, $seoDescr, $seoKeyword,$price, $subselect) == false)
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
	case 'del':
		$product = new Product();
		$pkid = $_POST['pkid'];
		$product->Del($pkid);
		$json['msg'] = "delete action success.";
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
		$product = new Product();
	
		if ($product->Update($pkid, $name, $descr, "", $isShow, $discount,  $seoTitle, $seoDescr, $seoKeyword) == false)
		{
			$json['status'] = ErrorCode::E_DB_ERR;
			$json['msg'] = ErrorCode::GetErr(ErrorCode::E_DB_ERR);
		}
		else
			$json['msg'] = "update success";
		break;
	
	case 'getbycateid':
		$cateId = $_POST['cateId'];
		$submenu = new SubMenu();
		$submenus = $submenu->FindByCategory($cateId);

		$json = $submenus;
	break;
	case 'getbymenuid':
		$menuid = $_POST['menuid'];
		$product = new Product();
		$products = $product->FindByMenu($menuid);
		$json = $products;
	break;		
	case 'show':
		$pkid = $_POST['pkid'];
		$product = new Product();
		$find = $product->FindById($pkid);
		$json = $find;
	break;
	default:
		$json["status"] = ErrorCode::E_UNKOWN_ACT;
		$json['msg'] = ErrorCode::GetErr(ErrorCode::E_UNKOWN_ACT);
		
	
		
}
echo json_encode($json);
?>
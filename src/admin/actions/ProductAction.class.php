<?php include_once dirname(__FILE__).'/../../common/ErrorCode.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/entity/ProductEntity.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/entity/SubMenuEntity.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/tools/MediaManager.class.php';?>
<?php

class ProductAction extends AjaxAction
{
	public function add() {
		$poduct = new ProductEntity();
		$json = new stdClass();
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
			$json->status = ErrorCode::E_DB_DUPLICATE;
			$json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_DUPLICATE);
		}
		else 
		{
			$media = new MediaManager();
			$mediaId = $media->saveMedia($imagesUrl);
			if($mediaId != false)
			{
				if ($poduct->Add($name, $descr, $mediaId, $isShow, $discount, $guid, $seoTitle, $seoDescr, $seoKeyword,$price, $subselect) == false)
				{
					$json->status = ErrorCode::E_DB_ERR;
					$json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
				}
				else
				{
					$json->status = ErrorCode::E_SUCCESS;
					$json->msg = "add success";
				}
			}
			else
			{
				$json->status = ErrorCode::E_FILE_ERR;
				$json->msg = ErrorCode::getErrDesc(ErrorCode::E_FILE_ERR);
			}
		}
		echo json_encode($json);
	}
	public function del() {
		$product = new ProductEntity();
		$json = new stdClass();
		$pkid = $_POST['pkid'];
		$product->Del($pkid);
		$json->status = ErrorCode::E_SUCCESS;
		$json->msg = "delete action success.";
		echo json_encode($json);
	}
	
	public function update() {
	
		$pkid =  $_POST["pkid"];
		$name = $_POST["name"];
		$descr = $_POST["descr"];
		$seoTitle = $_POST["seo_title"];
		$seoDescr = $_POST["seo_descr"];
		$seoKeyword = $_POST["seo_keyword"];
		$isShow = $_POST["isShow"];
		$discount = $_POST["discount"];
		$product = new ProductEntity();
		$json = new stdClass();
	
		if ($product->Update($pkid, $name, $descr, "", $isShow, $discount,  $seoTitle, $seoDescr, $seoKeyword) == false)
		{
			$json->status = ErrorCode::E_DB_ERR;
			$json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
		}
		else
		{
			$json->status = ErrorCode::E_SUCCESS;
			$json->msg = "update success";
		}
		echo json_encode($json);
	}
	
	public function getbycateid() {
		$cateId = $_POST['cateId'];
		$submenu = new SubMenuEntity();
		$json = new stdClass();
		$submenus = $submenu->FindByCategory($cateId);
		if($submenus === false){
		    $json->status = ErrorCode::E_DB_ERR;
		    $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
		}else{
		    $json->msg = $submenus;
		    $json->status = ErrorCode::E_SUCCESS;
		}
		echo json_encode($json);
	}
	public function getbymenuid() {
		$menuid = $_POST['menuid'];
		$product = new ProductEntity();
		$json = new stdClass();
		$products = $product->FindByMenu($menuid);
		if($products === false){
		    $json->status = ErrorCode::E_DB_ERR;
		    $json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
		}else{
		    $json->msg = $products;
		    $json->status = ErrorCode::E_SUCCESS;
		}
		echo json_encode($json);
	}
	public function show() {
		$pkid = $_POST['pkid'];
		$product = new ProductEntity();
		$json = new stdClass();
		$find = $product->FindById($pkid);
		$json = $find;
		$json->status = ErrorCode::E_SUCCESS;
		echo json_encode($json);
	}
}
?>

<?php include_once dirname(__FILE__).'/../../common/ErrorCode.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/entity/CategoryEntity.class.php';?>
<?php

class CategoryAction extends AjaxAction
{
	public function add(){
		$name = $_POST["name"];
		$descr = $_POST["descr"];
		$seoTitle = $_POST["seo_title"];
		$seoDescr = $_POST["seo_descr"];
		$seoKeyword = $_POST["seo_keyword"];
		$isShow = $_POST["isShow"];
		$discount = $_POST["discount"];
		$guid = "";
		$category = new CategoryEntity();

		
		$json = new stdClass();
		if($category->SelectCountBy("t_cateName", $name) > 0)
		{
			$json->status = ErrorCode::E_DB_DUPLICATE;
			$json->msg = ErrorCode::GetErr(ErrorCode::E_DB_DUPLICATE);
		}
		else 
		{
			if ($category->Add($name, $descr, "", $isShow, $discount, $guid, $seoTitle, $seoDescr, $seoKeyword) == false)
			{
				$json->status = ErrorCode::E_DB_ERR;
				$json->msg = ErrorCode::GetErr(ErrorCode::E_DB_ERR);
			}
			else
			{
				$json->status = ErrorCode::E_SUCCESS;
				$json->msg = "add success";
			}
		}
		echo json_encode($json);
	}
	public function show() {
		$pkid =  $_POST["pkid"];
		$category = new CategoryEntity();
		$json = new stdClass();
		$val = $category->FindById($pkid);
		$val->status = ErrorCode::E_SUCCESS;;
		$val->msg = "show ok";
		$json->status = ErrorCode::E_SUCCESS;
		$json = $val;
		echo json_encode($json);
	}
	public function edit() {
		
		$pkid =  $_POST["pkid"];
		$name = $_POST["name"];
		$descr = $_POST["descr"];
		$seoTitle = $_POST["seo_title"];
		$seoDescr = $_POST["seo_descr"];
		$seoKeyword = $_POST["seo_keyword"];
		$isShow = $_POST["isShow"];
		$discount = $_POST["discount"];		
		$category = new CategoryEntity();
		$json = new stdClass();
		if ($category->Update($pkid, $name, $descr, "", $isShow, $discount,  $seoTitle, $seoDescr, $seoKeyword) == false)
		{
			$json->status = ErrorCode::E_DB_ERR;
			$json->msg = ErrorCode::GetErr(ErrorCode::E_DB_ERR);
		}
		else
		{
			$json->status = ErrorCode::E_SUCCESS;
			$json->msg = "update success";
		}
		echo json_encode($json);
	}
	public function del() {
		$pkid =  $_POST["pkid"];
		$json = new stdClass();
		$category = new CategoryEntity();
		$category->Del($pkid);
		$json->status = ErrorCode::E_SUCCESS;
		$json->msg = "delete action success.";
		echo json_encode($json);
	}
}
?>

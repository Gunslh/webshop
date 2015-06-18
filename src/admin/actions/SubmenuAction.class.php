<?php include_once dirname(__FILE__).'/../../common/ErrorCode.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/entity/SubMenuEntity.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/tools/MediaManager.class.php';?>
<?php

class SubMenuAction extends AjaxAction
{
	public function add() {
		
		$name = $_POST["name"];
		$descr = $_POST["descr"];
		$seoTitle = $_POST["seo_title"];
		$seoDescr = $_POST["seo_descr"];
		$seoKeyword = $_POST["seo_keyword"];
		$isShow = $_POST["isShow"];
		$discount = $_POST["discount"];
		$fk_cateId = $_POST["fk_cateId"];
		$guid = "";
		$subMenu = new SubMenuEntity();
		$json = new stdClass();
		$imagesUrl = $_POST["images"];
		if($subMenu->SelectCountBy("t_menuName", $name) > 0)
		{
			$json->status = ErrorCode::E_DB_DUPLICATE;
			$json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_DUPLICATE);
		}
		else {
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
					$json->status = ErrorCode::E_DB_ERR;
					$json->msg = ErrorCode::getErrDesc(ErrorCode::E_DB_ERR);
				}		
				else{
					$json->status = ErrorCode::E_SUCCESS;
					$json->msg = "add success";
				}
			}
			else{
				$json->status = ErrorCode::E_FILE_ERR;
				$json->msg = ErrorCode::getErrDesc(ErrorCode::E_FILE_ERR);
			}
		}
		echo json_encode($json);
	}
	public function show() {
		$pkid =  $_POST["pkid"];
		$subMenu = new SubMenuEntity();
		$val = $subMenu->FindById($pkid);
		$val->status = ErrorCode::E_SUCCESS;;
		$val->msg = "show ok";
		$json = $val;
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
		$subMenu = new SubMenuEntity();
		$json = new stdClass();

		if ($subMenu->Update($pkid, $name, $descr, "", $isShow, $discount,  $seoTitle, $seoDescr, $seoKeyword) == false)
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
	public function del() {
		$pkid =  $_POST["pkid"];
		$subMenu = new SubMenuEntity();
		$json = new stdClass();
		$subMenu->Del($pkid);
		$json->status = ErrorCode::E_SUCCESS;
		$json->msg = "delete action success.";
		echo json_encode($json);
	}
	
	public function filedel() {
		$path = $_POST['path'];
		$upload = new UploadManager();
		$json = new stdClass();
		$upload->delete($path);
		$json->status = ErrorCode::E_SUCCESS;
		$json->msg = "delete action success.";
		echo json_encode($json);
	}
}
?>

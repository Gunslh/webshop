<?php include_once dirname(__FILE__).'/../../common/ErrorCode.class.php';?>
<?php include_once dirname(__FILE__).'/../../common/tools/UploadManager.class.php';?>
<?php
 class UploadAction extends AjaxAction{
     public function upload(){
         $error = "";
         $msg = "";
         $fileElementName = 'fileToUpload';
         $mediaManager = new UploadManager();
         $ret = $mediaManager->GetUpLoadFile($_FILES, $fileElementName);
         $json['url'] = isset($ret['url'])? $ret['url']:"";
         $json['error'] = $ret['err'];
         
         echo json_encode($json);
     }
     
     public function del(){
         $path = $_POST['path'];
         $json = new stdClass();
         $upload = new UploadManager();
         $upload->delete($path);
         $json->status = ErrorCode::E_SUCCESS;
         $json->msg = "delete action success.";
         echo json_encode($json);
     }
 }
?>
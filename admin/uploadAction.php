<?php include_once '../frwk/inculde.php'; ?>
<?php
	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	$mediaManager = new UploadManager();
	$ret = $mediaManager->GetUpLoadFile($_FILES, $fileElementName);
 	$json['url'] = isset($ret['url'])? $ret['url']:"";	
 	$json['error'] = $ret['err'];

	echo json_encode($json);
?>
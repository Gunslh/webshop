<?php include_once '../../../frwk/inculde.php'; ?>
<?php
	$error = "";
	$msg = "";
	$fileElementName = $_POST['id'];
	//$json['msg'] = 'ok'; 
	$mediaManager = new UploadManager();
	$url = $mediaManager->GetUpLoadFile($_FILES, $fileElementName);
	$json['msg'] = $url;
	echo json_encode($json);
?>
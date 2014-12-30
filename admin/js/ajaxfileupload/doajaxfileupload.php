<?php include_once '../../../frwk/inculde.php'; ?>
<?php
	$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	$mediaManager = new MediaManager();
	$url = $mediaManager->getUpload($_FILES, $fileElementName);
	$json['msg'] = $url;
	echo json_encode($json);
?>
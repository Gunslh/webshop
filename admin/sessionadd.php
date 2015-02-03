<?php include_once '../frwk/inculde.php'; ?>
<?php
$session = new Session();
$session->add("usrSession", "aaaa");
$json = array("status"=>"err");
$json['msg'] = "messageaaa";
echo json_encode($json);
?>
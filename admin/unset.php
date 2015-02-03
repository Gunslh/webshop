<?php include_once '../frwk/inculde.php'; ?>
<?php
$session = new Session();
$session->del("usrSession");
Functions::redirect('login.html')
?>
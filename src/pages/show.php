<?php include_once '../frwk/inculde.php'; ?>
<?php
	$pages = $_GET['pages'].'.html';
	Functions::display($pages);
?>
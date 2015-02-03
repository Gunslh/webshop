<?php include_once '../frwk/inculde.php'; ?>
<?php	
	if(isset($_GET["id"]))
		Functions::display("category.html",$_GET["id"]);
	else
		Functions::display("category.html", 0);
?>
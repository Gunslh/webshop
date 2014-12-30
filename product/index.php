<?php include_once '../frwk/inculde.php'; ?>
<?php	
	if(isset($_GET["id"]))
		Functions::display("product.html",$_GET["id"]);
	else
		Functions::display("product.html",0);
?>
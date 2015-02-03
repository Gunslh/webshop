<?php include_once '../frwk/inculde.php'; ?>
<?php 

$cate = new Category();
$submenu = new SubMenu();
$product = new Product();
$urls ="/aa/aa/w/aa.jpg|/aa/aa/w/aca.jpg|/aa/aa/w/ada.jpg|/aa/aa/w/aba.jpg|";
$a = new MediaManager();
echo $a->saveMedia($urls);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Admin Page</title>
<?php include_once './common/head.php'; ?>
<?php 
$cate = new Category();
$categorys = $cate->SelectAllCategory();

$subid = isset($_GET['subid'])? $_GET['subid']:1;
$prod = new Product();
$products = $prod->SelectAllProduct();
?>

</head>
<body>
<?php include_once './common/nav.php'; ?>


<?php include_once './common/foot.php'; ?>

</div>

</body>
</html>
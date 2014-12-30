<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Admin Page</title>
 
<?php include_once './common/head.php'; ?>
<?php 

$cate = new Category();
$submenu = new SubMenu();
$product = new Product();


?>
<script type="text/javascript">
$(function(){
	$.public.initMenu('#product', '#show');
});
</script>

</head>
<body>
<?php include_once './common/nav.php'; ?>
<div id="content">
	
	<div class="container">
	<div class="row">
		<div class="span3">
		<?php include_once './common/menu.php'; ?>
		</div>
		
		<div class="span9">
			<h1 class="page-title">
				<i class="icon-home"></i>
				总计					
			</h1>
			
			<div class="widget widget-table">
										
					<div class="widget-header">
						<i class="icon-th-list"></i>
						<h3>统计</h3>
					</div> <!-- /widget-header -->
					
					<div class="stat-container">
										
					<div class="stat-holder">						
						<div class="stat">							
							<span><?php echo $cate->Count(); ?></span>							
							总分类数							
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
					<div class="stat-holder">						
						<div class="stat">							
							<span><?php echo $submenu->Count(); ?></span>							
							总子目录数							
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
					<div class="stat-holder">						
						<div class="stat">							
							<span><?php echo $product->Count(); ?></span>							
							总产品数							
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
				</div> <!-- /stat-container -->
					
				</div> <!-- /widget -->					
		</div>
	</div>
	</div>
<?php include_once './common/foot.php'; ?>
</div>
</body>
</html>
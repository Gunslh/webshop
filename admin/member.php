<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Admin Page</title>
<?php include_once './common/head.php'; ?>
<script type="text/javascript">
$(function(){
	$.public.initMenu('#member', '#show');
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
		</div>
	</div>
	</div>
</div>
<?php include_once './common/foot.php'; ?>
</body>
</html>
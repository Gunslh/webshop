<?php include_once dirname(__FILE__).'/common/entity/ProductEntity.class.php';?>
<?php include_once dirname(__FILE__).'/common/tools/Tool.class.php';?>
<?php
$catId = isset($_GET["id"]) ? $_GET["id"] : "";
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$entity = new CategoryEntity();
$cats = $entity->FindById($catId); 
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo Tool::toHtmlHead($cats); ?>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<link href="/app/css/category.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="body-container">

	<div class="index-top">
	</div>
	<div class="index-search">
	</div>
	<div class="index-menu">
	</div>
	<div class="category-container">
		<div class="c-info"><p><?php echo $cats->t_cateDescr?></p></div>
		<div class="c-body">
			<div class="c-menu">
				<ul class="menu">
					<li>
						<p class="c-title">ZENTAI</p>
						<div class="sub-nav">
							<ul>
								<li>ZENTAI 1</li>
								<li>ZENTAI 2</li>
								<li> ZENTAI 3</li>
							</ul>
						</div>
					</li>
					<li>
						<p class="c-title">SUPER HERO</p>
						<div class="sub-nav">
							<ul>
								<li>SUPER HERO 1</li>
								<li>SUPER HERO 2</li>
								<li> SUPER HERO 3</li>
							</ul>
						</div>
					</li>
				</ul>
				<p class="liketext">You May Like</p>
					<ul class="maylikes">
						<li>
						<div class="sale-item">
							<img src="/images/sale-1.jpg"></img>
							<p class="descr">3D Cut Spiderman Printed Costume with Muscle Shades</p>
							<p class="price">$65</p>
						</div>
						</li>
						<li>
							<div class="sale-item">
								<img src="/images/sale-2.jpg"></img>
								<p class="descr">3D Cut Spiderman Printed Costume with Muscle Shades</p>
								<p class="price">$65</p>
							</div>
						</li>
						<li>
							<div class="sale-item">
								<img src="/images/sale-3.jpg"></img>
								<p class="descr">3D Cut Spiderman Printed Costume with Muscle Shades</p>
								<p class="price">$65</p>
							</div>
						</li>
						<li>
							<div class="sale-item">
								<img src="/images/sale-4.jpg"></img>
								<p class="descr">3D Cut Spiderman Printed Costume with Muscle Shades</p>
								<p class="price">$65</p>
							</div>
						</li>
						
					</ul>

			</div>
			<!-- finish menu -->
			<div class="c-detail">
				<div class="detail-container">
					<ul class="pd-list">				
					</ul>
					<div class="clear"></div>
					<div class="page-index">
						<ul>	
							<li class="page-pre">&lt;&lt;PRE.</li>
							<li>1</li>
							<li>1</li>
							<li>1</li>
							<li>1</li>
							<li class="page-next">NEXT&gt;&gt;</li>
						</ul>
						<div class="page-count">total 10</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	

	<div class="footer">
	</div>
	
</div>
<script src="/lib/js/jquery-1.8.1.min.js"></script>
<script src="/app/js/templates.js"></script>
<script src="/app/js/category.js"></script>
<script type="text/javascript">
$(function(){
	$.template.loadHead();
	$.template.loadTopBanner($('.index-top'));
	$.template.loadSearchBanner($('.index-search'));
	$.template.loadMenuBanner($(".index-menu"));
	$.template.loadFoot($(".footer"));
		
	$.Category.LoadProduct(<?php echo $catId?> ,<?php echo $page?> ,function(json){
		//alert(JSON.stringify(json));	
		var data = json.msg;
		var obj = $('.detail-container .pd-list');
		var html = "";
		for(var x in data)
		{
			var product  = data[x];
			html = '<li class="super-link" attid="'+product.t_pkId+'" link="/product/'+product.t_pkId+'.html">'+
				'<div class="sale-item">' +
				'<img attid="'+product.fk_mediaId+'" src="/images/sale-2.jpg"></img>' +
				'<p class="descr">'+product.t_title+'</p>'+
				'<p class="price">$'+product.t_price+'</p>'+
				'</div></li>';
			obj.append(html);
			$.Media.Load(product.fk_mediaId, function(json){
				//alert(JSON.stringify(json));
				if(json.length > 0)
				{
					$('.sale-item img').each(function(){
						if(json[0].fk_mediaId == $(this).attr('attid'))
						{
							//alert(json[0].fk_mediaId +'======'+ $(this).attr('attid'));
							//alert(JSON.stringify(json[0]));
							$(this).attr('src','/'+json[0].t_url);
						}
					});
				}
				
			});
		}
		
	});

	//初始化分页
	$.Category.LoadProductCount(<?php echo $catId?> ,function(json){
		var curr = <?php echo $page?>;
		var pagetotal = json.pageTotal;

		//var curr = 2;
		//var pagetotal = 6;
		
		var html = "";
		var pageObj = $('.page-index ul');
		$('.page-count').html('TOTAL '+pagetotal+' PAGES');
		//当前大于第一页添加返回按钮
		if(curr > 1)
			html += '<li class="page-pre">&lt;&lt;PRE.</li>';	
			
		if(pagetotal <= 5)
		{
			for(var i = 1 ; i <= pagetotal; i++)
			{
				if(i == curr)
					html += '<li class="check">'+i+'</li>';
				else
					html += '<li>'+i+'</li>';
			}
		}
		else
		{
			var start = 0;
			var end = 0;
			start = curr;
			if( start + 4 < pagetotal)
				end = start + 4;
			else
				end = pagetotal;
			
			for(var i = start ; i <= end; i++)
			{
				if(i == curr)
					html += '<li class="check">'+i+'</li>';
				else
					html += '<li>'+i+'</li>';
			}

		}
		if(curr < pagetotal)
			html += '<li class="page-next">NEXT&gt;&gt;</li>';

		html += '<div class="clear"></div>';
		pageObj.html(html);
	});

	
});
</script>
</body>
</html>
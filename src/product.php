<?php include_once dirname(__FILE__).'/common/entity/ProductEntity.class.php';?>
<?php include_once dirname(__FILE__).'/common/tools/Tool.class.php';?>
<?php
$productId = isset($_GET["id"]) ? $_GET["id"] : "";
$entity = new ProductEntity();
$product = $entity->FindById($productId);
//var_dump($product);	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo Tool::toHtmlHead($product); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/app/css/product.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<div class="body-container">
		
		<div class="index-top">
		</div>
		<div class="index-search">
		</div>
		<div class="index-menu">
		</div>
		
		<div class="path">
			WHERE YOU ARE
		</div>
		
		<div class="product-info">
			<div class="product-pic">
				<div class="small">
					<ul>
						<li><img src="/images/sale-1.jpg"></li>
						<li><img src="/images/sale-2.jpg"></li>
						<li><img src="/images/sale-3.jpg"></li>
					</ul>
				</div>
				<div class="big"><img src="/images/sale-1.jpg"></img></div>
			</div>
			<div class="product-detail">
				<div class="pd-title"><?php echo $product->t_title?></div>
				<div class="pd-price">$<?php echo $product->t_price?></div>
				<div class="pd-size">SIZE:</div>
				<div class="size-form">
					<ul>
						<li class="size-name">FEMALE:</li>
						<li class="option" data="1">XS</li>
						<li class="option" data="2">S</li>
						<li class="option" data="3">M</li>
						<li class="option" data="4">L</li>
						<li class="option" data="5">XL</li>
						<li class="option" data="6">XLL</li>
						<li class="option" data="7">XLLL</li>
					</ul>
					<div class="clear"></div>
					<ul>
						<li class="size-name">MALE:</li>
						<li class="option" data="11">XS</li>
						<li class="option" data="12">S</li>
						<li class="option" data="13">M</li>
						<li class="option" data="14">L</li>
						<li class="option" data="15">XL</li>
						<li class="option" data="16">XLL</li>
						<li class="option" data="17">XLLL</li>
					</ul>
					<div class="clear"></div>
					<ul>
						<li class="size-name">KIDS:</li>
						<li class="option" data="21">XS</li>
						<li class="option" data="22">S</li>
						<li class="option" data="23">M</li>
						<li class="option" data="24">L</li>
						<li class="option" data="25">XL</li>

					</ul>
					<div class="clear"></div>
					<ul>
						<li class="size-name">Number:</li>
						<li>
							<span class="tb-stock" id="count">
							 	<a  class="tb-reduce  iconfont tb-disable-reduce">ƛ</a>
							 	<input id="amount" class="tb-text num_postive" value="1" maxlength="8" title="请输入购买量" type="text">
							 	<a class="tb-increase  iconfont">ƚ</a>
							 </span>
						</li>
					</ul>
					<div class="clear"></div>
				</div>
				<div class="tb-btn-add">
					
					<a><i class="iconfont">ŭ</i>
					Add to Cart</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="special-options">
			<div class="op-banner">
				<p>Special Options / <font style="color:white;font-size:18px;font-weight:normal;">See Default Detail</font></p>
			</div>
			<div class="op-detail">
				<ul>
					<li class="op-name">Hands&Feet</li>
					<li><input type="checkbox" id="op-1"/><p>Hands Detachable(Wrist)(+$5.00)</p></li>
					<li><input type="checkbox" id="op-2"/><p>Without Hands</p></li>
					<li><input type="checkbox" id="op-3"/><p>Without Feet</p></li>
					<li><input type="checkbox" id="op-4"/><p>Add Toes(+$5.00)</p></li>
					<li><input type="checkbox" id="op-5"/><p>Separate Finger (Default)</p></li>
				</ul>
				<ul>
					<li class="op-name">Zipper</li>
					<li><input type="checkbox" id="op-11"/><p>Chest Zipper(Two Horizontal Zippers)(+$5.00)</p></li>
					<li><input type="checkbox" id="op-12"/><p>Crotch Zipper For Male)Vertical(+$5.00)</p></li>
					<li><input type="checkbox" id="op-13"/><p>Feet Detachable(Under Knee)(+$7.00)</p></li>
					<li><input type="checkbox" id="op-14"/><p>Hand Detachable(Under Elbow)(+$7.00)</p></li>
					<li><input type="checkbox" id="op-15"/><p>Feet Detachable(Under )(+$5.00)</p></li>
				</ul>				
			</div>
			<div class="op-info">
			Description:
			</div>
			<div class="clear"></div>
		</div>
		
		<div class="size-guide">
			<div class="size-banner">
				<p class="guid">SIZE GUIDE</p>
				<p class="guid-text">aaaaaaaaaaaaaaaaaaaaaaaaa</p>
				<img src="/images/size_table.gif"></img>
			</div>
		</div>
		
		<div class="likes">
		</div>
		<div class="footer">
		</div>
	</div>
<script src="/lib/js/jquery-1.8.1.min.js"></script>
<script src="/app/js/templates.js"></script>
<script type="text/javascript">
$(function(){
	$.template.loadHead();
	$.template.loadTopBanner($('.index-top'));
	$.template.loadSearchBanner($('.index-search'));
	$.template.loadMenuBanner($(".index-menu"));
	$.template.loadFoot($(".footer"));
	//$.template.loadYouMaylike($(".likes"));
	
	$('.small ul li').live ("hover", function(){
		$('.big').html($(this).html());
	});

	function countRefresh()
	{
		var obj  = $('#count');
		var reduce = obj.find('.tb-reduce');
		var increase = obj.find('.tb-increase');
		if(parseInt(obj.find('input').val()) == 1)
		{
			reduce.addClass('tb-disable-reduce');
		}
		else
			reduce.removeClass('tb-disable-reduce');
	}
	function countIncr(num)
	{
		var obj  = $('#count');
		var amonut = parseInt(obj.find('input').val());
		obj.find('input').val(amonut+ num) ;
		countRefresh();
	}
	function countReduce(num)
	{
		var obj  = $('#count');
		var amonut = parseInt(obj.find('input').val());
		obj.find('input').val(amonut -num) ;
		countRefresh();
	}
	$('#count .tb-reduce').click(function(){
		if(parseInt($(this).parent('span').find('input').val()) > 1 )
		{
			countReduce(1);
		}
	});

	//进行正数类型判断
	$(".num_postive").on('input',function(e){
		var amount = parseInt($(this).val());  
		if(!amount || amount < 0)
		{
			$(this).val("1"); 
		}
		countRefresh();
	});
	
	countRefresh();
	$('#count .tb-increase').click(function(){
		countIncr(1);
	});
	$('.option').click(function(){
		if ($(this).hasClass("active"))
		{
			$(this).removeClass("active");
		}
		else
		{
			$('.option').each(function(){
				if ($(this).hasClass("active"))
				{
					$(this).removeClass("active");
				}
			});
			$(this).addClass("active");
		}
		
	});

	$.Media.Load(<?php echo $product->fk_mediaId?>, function(json){
		//alert(JSON.stringify(json));
		var imagelist = $('.product-pic .small ul');
		imagelist.html("");
		for (var i in json)
		{
			//alert("<li><img src='/"+json[i].t_url+"'></img></li>");
			if(i == 0)
				$('.big').html("<img src='/"+json[i].t_url+"'></img>");
			imagelist.append("<li><img src='/"+json[i].t_url+"'></img></li>");
		}
		
	});
	$('.tb-btn-add a').click(function(){
		var obj  = $('#count');
		var amonut = parseInt(obj.find('input').val());
		var id = <?php echo $product->t_pkId?>;
		var price = <?php echo $product->t_price?>;
		
		$.User.LoginTest("/product/<?php echo $product->t_pkId?>.html");
		//$.User.AddToCart(id, amonut, price);
	});
});
</script>
</body>
</html>
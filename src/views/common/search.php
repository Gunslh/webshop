<script type="text/javascript">
$(function(){

	var cart_hover = false;

	$('.cart .cart-t').hover(function(){
		$('.cart .detail').fadeIn();
	},
	function(){
		setTimeout(function(){
			if(cart_hover == false)
				$('.cart .detail').fadeOut();
		},500);
	});

	$('.cart .detail').hover(function(){
		$('.cart .detail').fadeIn();
		cart_hover = true;
	},
	function(){
		$('.cart .detail').hide();
		cart_hover = false;
	});
});
</script>

<div class="d-left left">
	<p>FREE SHIPPING ON ORDER</p>
</div>
<div class="left d-middle">
	<ul>
		<li class="search-input bd-left"><input type="text"></input>
		</li>
		<li class="bd-right"><div class="search-btn "></div></li>
	</ul>
</div>
<div class="left d-right login-area">
	<a class="login-url" href="login.html">login</a>
</div>
<div class="left d-right-most login-area">
	<div class="cart">
		<p class="cart-t">Cart</p>
		<!-- 		<div class="detail"> -->
		<!-- 			<b class="no-goods"></b><b class="no-goods-text">Your cart is empty;</b>  -->
		<!-- 		</div> -->
		<div class="detail">
			<div id="settleup-content">
				<div class="smt">
					<h4 class="fl">最新加入的商品</h4>
				</div>
				<div class="smc">
					<ul id="mcart-mz">
						<li>
							<div class="p-img fl">
								<a href="http://item.jd.com/1332512.html" target="_blank"><img
									src="http://img12.360buyimg.com/n5/jfs/t478/247/1005991500/73051/b1750a55/54c60e20N36193191.jpg"
									alt="" height="50" width="50"> </a>
							</div>
							<div class="p-name fl">
								<span></span><a href="http://item.jd.com/1332512.html"
									title="中兴 青漾3 (G719c) 白色 电信4G手机 双卡双待" target="_blank">中兴 青漾3
									(G719c) 白色 电信4G手机 双卡双待</a>
							</div>
							<div class="p-detail fr ar">
								<span class="p-price"><strong>￥1690.00</strong>×1</span> <br> <a
									class="delete" data-id="1332512|182385094"
									data-type="RemoveSuit" href="#delete">删除</a>
							</div>
						</li>
						<li>
							<div class="p-img fl">
								<a href="http://item.jd.com/1332512.html" target="_blank"><img
									src="http://img12.360buyimg.com/n5/jfs/t478/247/1005991500/73051/b1750a55/54c60e20N36193191.jpg"
									alt="" height="50" width="50"> </a>
							</div>
							<div class="p-name fl">
								<span></span><a href="http://item.jd.com/1332512.html"
									title="中兴 青漾3 (G719c) 白色 电信4G手机 双卡双待" target="_blank">中兴 青漾3
									(G719c) 白色 电信4G手机 双卡双待</a>
							</div>
							<div class="p-detail fr ar">
								<span class="p-price"><strong>￥1690.00</strong>×1</span> <br> <a
									class="delete" data-id="1332512|182385094"
									data-type="RemoveSuit" href="#delete">删除</a>
							</div>
						</li>
						<li>
							<div class="p-img fl">
								<a href="http://item.jd.com/1332512.html" target="_blank"><img
									src="http://img12.360buyimg.com/n5/jfs/t478/247/1005991500/73051/b1750a55/54c60e20N36193191.jpg"
									alt="" height="50" width="50"> </a>
							</div>
							<div class="p-name fl">
								<span></span><a href="http://item.jd.com/1332512.html"
									title="中兴 青漾3 (G719c) 白色 电信4G手机 双卡双待" target="_blank">中兴 青漾3
									(G719c) 白色 电信4G手机 双卡双待</a>
							</div>
							<div class="p-detail fr ar">
								<span class="p-price"><strong>￥1690.00</strong>×1</span> <br> <a
									class="delete" data-id="1332512|182385094"
									data-type="RemoveSuit" href="#delete">删除</a>
							</div>
						</li>
					</ul>
				</div>
				<div class="smb ar">
					共<b>1</b>件商品 共计<strong>￥ 1690.00</strong><br> <a
						href="order.html"
						title="去购物车结算" id="btn-payforgoods">去购物车结算</a>
				</div>
			</div>
		</div>
	</div>
</div>

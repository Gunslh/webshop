<script type="text/javascript" src="/app/js/user.js"></script>
<script type="text/javascript" src="/app/js/media.js"></script>
<script type="text/javascript">
$(function(){

	var cart_hover = false;
	var user_hover = false;
	function cartReload()
	{
		$.User.GetCart(function(json){
			var itemcount = json.length -1;
			var total =json[itemcount].totalPrice;
			$('.cart-total strong').html("$"+total);
			$('.cart-total b').html(itemcount);
			var obj = $('#mcart-mz');
			obj.html("");
			for (var i in json)
			{
				
				if(i == itemcount)
					break;
				var mediaId = json[i].fk_mediaId;
				var id = json[i].t_pkId;
				obj.append('<li attid="'+id+'" media="'+mediaId+'"><div class="p-img fl">'+
						'<a href="/product/'+id+'.html">'+
						'<img src="" alt="" height="50" width="50"> </a>'+
						'</div><div class="p-name fl">'+
						'<span></span><a href="/product/'+id+'.html">'+
						json[i].t_title+'<br>'+json[i].t_descr+'</a></div><div class="p-detail fr ar">'+
						'<span class="p-price"><strong>$'+
						json[i].t_price+'</strong>x'+json[i].t_total+'</span> <br> <a '+
							'class="delete" >Remove</a></div></li>');


				$.Media.Load(mediaId, function(json){
					//alert(JSON.stringify(json));					
					$('#mcart-mz li').each(function(){
						if(parseInt($(this).attr('media')) == parseInt(json[0].fk_mediaId))
						{
							$(this).find('.p-img').find('img').attr('src', '/'+json[0].t_url);							
						}
					});
				});
				
			}
		});
	}
	$('#mcart-mz li .delete').live("click",function(){
		var id = $(this).parent('div').parent('li').attr('attid');
		$.User.RemoveFromCart(id);
	});
	$('.cart .cart-t').hover(function(){
		$('.cart .detail').fadeIn();
		cartReload();
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

	$.User.GetInfo(function(json){
		//alert(JSON.stringify(json));
		$('.login-area .tt').addClass('user');
		$('.loginfo .tt').html("<p>"+json[0].t_usrName+"</p>");
	});

	$('.login-area .user').live ("hover", function(event){
		if(event.type=='mouseenter')
				$('.login-area .t-list').fadeIn();
		else
			setTimeout(function(){
				if(user_hover == false)
					$('.login-area .t-list').fadeOut();
			},500);
	});

	
	$('.login-area .t-list').hover(function(){
		$('.login-area .t-list').fadeIn();
		user_hover = true;
	},
	function(){
		$('.login-area .t-list').hide();
		user_hover = false;
	});

	$('.login-area .logout').click(function(){
		$.User.Logout();
	});
});
</script>

<div class="d-left left">
	
</div>
<div class="left d-middle">
	<ul>
		<li class="search-input bd-left"><input type="text"></input>
		</li>
		<li class="bd-right"><div class="search-btn "></div></li>
	</ul>
</div>

<div class="left d-right login-area loginfo">
	<div class="tt"><a class="login-url" href="/login.php">login</a></div>
	<div class="t-list">
		<ul>
			<li class="super-link logout" >Logout</li>
		</ul>
	</div>
 	
		
</div>
<div class="left d-right-most login-area">
	<div class="cart">
		<p class="cart-t super-link" link="/cart.html">Cart</p>
		<!-- 		<div class="detail"> -->
		<!-- 			<b class="no-goods"></b><b class="no-goods-text">Your cart is empty;</b>  -->
		<!-- 		</div> -->
		<div class="detail">
			<div id="settleup-content">
				<div class="smt">
					<h4 class="fl">Cart List</h4>
				</div>
				<div class="smc">
					<ul id="mcart-mz">						
					</ul>
				</div>
				<div class="cart-total smb ar">
					Total<b>0</b>Products With:<strong>$0</strong><br> <a
						href="/order.html"
						title="去购物车结算" id="btn-payforgoods">CheckOut</a>
				</div>
			</div>
		</div>
	</div>
</div>

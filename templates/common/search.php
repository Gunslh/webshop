<script type="text/javascript">
$(function(){
	$('.index-adv .shift ul li').each(function(){
		var id = $(this).attr("showid");
		if(id == 1)
		{
			$(this).fadeToggle();	
		}
	});
	$('.d-middle .search-btn').click(function(){
		$('.index-adv .shift ul li').each(function(){
			var id = $(this).attr("showid");
			if(id == 1 ||id==2)
			{

				$(this).fadeToggle();	
			}
		});
	});
});
</script>
<div class="index-search">
		<div class="d-left left"><p>FREE SHIPPING ON ORDER</p></div>
		<div class="left d-middle">
			<ul>
				<li class="search-input bd-left" ><input type="text"></input>
				</li>
				<li class="bd-right"><div class="search-btn "></div></li>
			</ul>
		</div>
		<div class="left d-right login-area"><a class="login-url" href="javascript:void(0)">login</a></div>
		<div class="left d-right-most login-area"><div class="cart"><p>Cart</p></div></div>
	</div>
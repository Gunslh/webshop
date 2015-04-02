<script src="/app/js/ui.js"></script>
<script type="text/javascript">
$(function(){
	$('#menu-container li').hover(function(){
		$(this).find('.sub-menu').show();
	},
	function(){
		$(this).find('.sub-menu').hide();
	});
});
</script>
<ul id= "menu-container" >
	<li style="list-style: none">ZENTAIL
		<div class="sub-menu">
			<ul>
				<li class="super-link" link="order.html">Shiny Zentai Suits</li>
				<li>Multi-Color Zentai Suits</li>
				<li>Flag Zentai Suits</li>
				<li>Skeleton Zentai Suits</li>
				<li>Split Zentai</li>
				<li>Camouflage Zentai Suit</li>
			</ul>
		</div>
	</li>
	<li>Superheros
		<div class="sub-menu">
			<ul>
				<li>Deadpool</li>
				<li>Power Rangers</li>
				<li>Spiderman</li>
				<li>Batman</li>
				<li>Robin Hood</li>
				<li>Other Superheros</li>
			</ul>
		</div>
	</li>
	<li>Catsuits
		<div class="sub-menu">
			<ul>
				<li>Animal</li>
				<li>Leotards/unitard</li>
				<li>Mermaid</li>
				<li>Sexy</li>
			</ul>
		</div>
	</li>
	<li>Jersey
		<div class="sub-menu">
			<ul>
				<li>Spiderman</li>
				<li>Superman</li>
				<li>Ironman</li>
				<li>Incredible Hulk</li>
			</ul>
		</div>
	</li>
	<li>Latex
	</li>
	<li>Zentaikids
	</li>
	<li>Accessories
	</li>
	<li>Jersey
	</li>
</ul>

<script type="text/javascript">
$(function(){
	$('#search').focus(function(){
		$(this).parent("div").addClass("highlight");
	});
	$('#search').blur(function(){
		$(this).parent("div").removeClass("highlight");
	});
});
</script>
<div  class="search_warp">
	<div class="search_main">
		<input id="search" placeholder="What are you looking for..."></input>
		<input id="searchbtn" type="button" value="Search"></input>
		<div class="clear"></div>
	</div>
</div>
<script type="text/javascript" src="/app/js/ui.js"></script>
<script type="text/javascript" src="/app/js/products.js"></script>
<script type="text/javascript">
$(function(){
	$('#menu-container li').live ("hover", function(event){
		if(event.type=='mouseenter')
			$(this).find('.sub-menu').show();
		else
			$(this).find('.sub-menu').hide();
	});
	var menuhook = null;
	function menuParse(json)
	{
		var html = "";
		var container = $('#menu-container');
		container.html("");
		
		//alert(JSON.stringify(json));
		for (var i in json)
		{
			var sub = json[i].sub;
			var obj = json[i];
			if(i == 0)
				html += " <li style='list-style: none;margin-left:0;' ><p class='super-link' link='/category/"+obj.t_pkId+".html'>" + obj.t_cateName.toUpperCase()+'</p>';
				
			else
				html += " <li><p class='super-link' link='/category/"+obj.t_pkId+".html'>" + obj.t_cateName.toUpperCase()+'</p>';


			if(sub){
				//console.log(JSON.stringify(sub));
				html += '<div class="sub-menu"><ul>'
				for(var j in sub)
				{
					var subobj = sub[j];
					html += '<li class="super-link" link="/submenu/'+subobj.t_pkId+'.html">'+subobj.t_menuName+'</li>';
				}
				html +='</ul></div>';
			}
			html += "</li>";
			
		}
		container.html(html);
	}
	$.product.GetAllMenuList(menuParse);
});
</script>
<ul id= "menu-container">
    <!--<li style="list-style: none; margin-left: 0;">ZENTAIL
        <div class="sub-menu">
            <ul>
                <li class="super-link" link="order.html">shiny zentai suits</li>
                <li>Multi-Color Zentai Suits</li>
                <li>Flag Zentai Suits</li>
                <li>Skeleton Zentai Suits</li>
                <li>Split Zentai</li>
                <li>Camouflage Zentai Suit</li>
            </ul>
        </div>
    </li>
    <li>SUPERHEROS
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
    <li>CATSUITS
        <div class="sub-menu">
            <ul>
                <li>Animal</li>
                <li>Leotards/unitard</li>
                <li>Mermaid</li>
                <li>Sexy</li>
            </ul>
        </div>
    </li>
    <li>JERSEY
        <div class="sub-menu">
            <ul>
                <li>Spiderman</li>
                <li>Superman</li>
                <li>Ironman</li>
                <li>Incredible Hulk</li>
            </ul>
        </div>
    </li>
    <li>LATEX</li>
    <li>ZENTAIKIDS</li>
    <li>ACCESSORIES</li>
    <li>JERSEY</li>-->
</ul>

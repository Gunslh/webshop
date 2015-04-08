(function($) {
	$.product = {
		GetAllMenuList : function(func) {
			$.ajax({
				url : '../../customer/ProductSeekAction/selectAllMenu',
				type : 'post',
				data : false,//form.serialize(),
				cache : false,
				dataType : "json",
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {
					switch (json['status']) {
					case 0:

						if (func)
							func(json['msg']);
						break;
					default:
						alert(json['msg']);
						break;
					}
				}
			});
		},
		GetMenuList : function(func) {
			$.ajax({
				url : '../../customer/ProductSeekAction/selectAllCategory',
				type : 'post',
				data : false,//form.serialize(),
				cache : false,
				dataType : "json",
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {
					switch (json['status']) {
					case 0:

						if (func)
							func(json['msg']);
						break;
					default:
						alert(json['msg']);
						break;
					}
				}
			});
		},
		GetSubMenuList : function(id, name, func) {
			var data = 'catId=' + id;
			$.ajax({

				url : '../../customer/ProductSeekAction/getSubmenuByCatId',
				type : 'post',
				data : data,//form.serialize(),
				cache : false,
				dataType : "json",
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {
					switch (json['status']) {
					case 0:
						if (func)
							func(id, name, json['msg']);
						break;
					default:
						//alert(json['msg']);
						break;
					}
				}
			});
		}
	}
	
	$('.c-title').live ("click", function(){
		var sub = $(this).parent('li').find('.sub-nav');
		sub.fadeToggle();

		if(sub.css("opacity") == 0)
		{
			$(this).parent('li').addClass("select");
		}
		else
		{
			$(this).parent('li').removeClass("select");
		}
	});
	function bannerMenuParse(json)
	{
		var container = $('.c-menu .menu');
		var html = "";
		container.html("");
		
		//alert(JSON.stringify(json));
		for (var i in json)
		{
			var sub = json[i].sub;
			var obj = json[i];
			html += " <li><p class='c-title' link='/category/"+obj.t_pkId+".html'>" + obj.t_cateName+'</p>';
			
			if(sub){
				//console.log(JSON.stringify(sub));
				html += '<div class="sub-nav"><ul>'
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
	function bannerMenuInit(){	
		$.product.GetAllMenuList(bannerMenuParse)		
	}
	bannerMenuInit();
})(jQuery);
// JavaScript Document
(function($) {
	function loadPage(page,func, obj)
	{
		$.ajax({
	        url : page,
	        type : 'get',
	        data : null,//form.serialize(),
	        cache : false,
	        dataType : "text",
	        error : function(XMLHttpRequest, textStatus, errorThrown) {
	            alert("服务器无响应! status: " + textStatus);
	         },
	        success : function(text, textStatus) {
	        	if (func != null) func(text);
	        	if (obj != null) obj.html(text);
	        }
	    });
	}
	
	function headAppend(html)
	{
		$('head').append(html);
	}
	
	$.template = {
		setTitle:function()
		{
			
		},
		loadHead:function(obj, path){
			path = path || ''; 
			loadPage(path + '/views/common/css2js.php',headAppend, null);
		},
		loadTopBanner:function(obj, path){
			path = path || '';
			loadPage(path +'/views/common/head.php',null, obj);
		},
		loadSearchBanner:function(obj, path){
			path = path || '';
			loadPage(path +'/views/common/search.php',null, obj);
		},
		loadMenuBanner:function(obj, path){
			path = path || '';
			loadPage(path +'/views/common/menu.php',null, obj);
		},
		loadFoot:function(obj, path){
			path = path || '';
			loadPage(path +'/views/common/foot.php',null, obj);			
		},
		loadYouMaylike:function(obj, path){
			path = path || '';
			$('head').append('<link href="/app/css/likes.css" type="text/css" rel="stylesheet" />');
			loadPage(path +'views/common/youmaylike.php',null, obj);
		},
	};

})(jQuery);

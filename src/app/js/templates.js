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
		loadHead:function(obj){
			loadPage('/views/common/css2js.php',headAppend, null);
		},
		loadTopBanner:function(obj){
			loadPage('/views/common/head.php',null, obj);
		},
		loadSearchBanner:function(obj){
			loadPage('/views/common/search.php',null, obj);
		},
		loadMenuBanner:function(obj){
			loadPage('/views/common/menu.php',null, obj);
		},
		loadFoot:function(obj){
			loadPage('/views/common/foot.php',null, obj);			
		},
		loadYouMaylike:function(obj){
			$('head').append('<link href="/app/css/likes.css" type="text/css" rel="stylesheet" />');
			loadPage('/views/common/youmaylike.php',null, obj);
		},
	};

})(jQuery);

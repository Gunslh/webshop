/**
 * 
 */
// JavaScript Document
(function($) {
	$.public = {
		getQueryString:function(name) {
			var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
			var r = window.location.search.substr(1).match(reg);
			if (r != null) return unescape(r[2]); return null;
		},
		initMenu:function(menuId, submenu){	
			var selectMenuObj = $(menuId);
			selectMenuObj.addClass('active');
			var div = selectMenuObj.find("div");
			div.removeClass("hide");
			var li = selectMenuObj.find(submenu);
			li.addClass("select");
			var i = li.find("i");
			i.removeClass();
			i.addClass("icon-arrow-right");
		},
		err_show:function(obj, isShow, msg){
			var p = obj.parent("div").find("p");
			
			if(isShow){
				p.addClass('full_opactiy');
				if(msg != null)
					p.html(msg);
				else
					p.html(p.attr("mess"));
				obj.focus();
			}
			else
			{
				p.removeClass('full_opactiy');
			}
		},
		mask:function(flag){
			if(flag){
				$('#mask').show();
			}else{
				$('#mask').hide();
			}
		},
	};
	$.test = {
		empty:function(obj, cb)
		{
			if(obj.val() == ''){
				cb(obj, true,"不能为空");
				return false;
			}
			else
				cb(obj, false);
			return true;
		},
		digital:function (obj, cb)
		{
			var num = /^[0-9]+.?[0-9]*$/; 
			if(obj.val() == ''){
				cb(obj, true);
				return false;
			}			
			
			if(isNaN(obj.val())){
				cb(obj, true, "请输入数字");
				return false;
			}
			else{
				cb(obj, false);
			}
			return true;
		},
		notZero:function(obj, cb)
		{
			if(isNaN(obj.val())){
				cb(obj, true, "请输入数字");				
				return false;
			}
			else{
				cb(obj, false);
			}
			if(obj.val() == 0){
				cb(obj, true, "当前项无效");
				return false;
			}
			return true;
		}
	};
	$(function(){
		$("#main-nav li .title").click(function(){
			// $(this).toggle('slide', {direction:"up"}, 1000);
			var info = $(this).parent("li").find('.sub-nav');
			// alert(info.html());
			info.fadeToggle();			
		});
		

	});
	
	$('.super-link').live('click', function(){
		if($(this).attr('link'))
			window.location.href = $(this).attr('link');
	});
	function conturyInit() {
		$('.contury').each(function() {
			var html = '<option opid=0>NotSet</option>'
			html += '<option opid=1>China</option>'
			$(this).html(html);
		});
	}
	conturyInit();
})(jQuery);
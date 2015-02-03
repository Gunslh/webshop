// JavaScript Document
(function($) {
	$.customer = {
		initMenu:function(menuId){
			var selectMenuObj = $(menuId);
			selectMenuObj.parent().addClass('selected').toggleClass('closed');
			selectMenuObj.addClass('selected');
		}
	};
 	$.fn.extend({
		customSelect:function(val){
			var select = $(this);
			if(val === undefined){
				var tval = select.find('.jsBtLabel').attr('data-value');
				return tval == undefined ? '' : tval;
			}else{
				var a = select.find('li a[data-value=' + val + ']');
				a.click();
				return select;
			}
		},
		customSelectOnchange:function(fn){
			var select = $(this);
			if(fn !== undefined){
				select.bind('change',fn);
				//select.change();
				//alert(select.find('ul .jsDropdownItem').length);
				//select.find('ul .jsDropdownItem').click(fn(event));
				//fn();
				//return select.find('.jsBtLabel').attr('data-value');
			}
			return select;
		},
		customCheckboxVal:function(val){
			var checkbox = $(this);
			if(val === undefined){
				if(checkbox.hasClass('selected')){
					var ckval = checkbox.find('.frm_checkbox').val();
					return ckval == undefined ? '' : ckval;
				}
				return '';
			}else{
				checkbox.find('.frm_checkbox').val(val);
				return checkbox;
			}
		},
		customCheckbox:function(check){
			var checkbox = $(this);
			if(check === undefined){
				return checkbox.hasClass('selected');
			}else{
				if(check){
					checkbox.addClass('selected');
				}else{
					checkbox.removeClass('selected');
				}
				return checkbox;
			}
		},
		customTextareaVal:function(val){
			var textarea = $(this);
			if(val === undefined){
				var data = textarea.text();;
				return data.replace(/\s+/g,'');
			}else{
				textarea.text(val);
				return textarea;
			}
		}
	});
	
	/*load*/
	$(function(){
		$('body').click(function(){
			$('.dropdown_menu').removeClass('open');
		});
		$('.dropdown_menu .btn').click(function(event){
			var select = $(this).parent();
			if(select.hasClass('disabled')) return;
			select.data('flag',true);
			$('.dropdown_menu').each(function(){
				var obj = $(this);
				if(obj.data('flag')){
					
				}else{
					obj.removeClass('open');
				}
			});
			select.removeData('flag');
			select.toggleClass('open');
			event.stopPropagation();
		});
		$('.dropdown_menu li .jsDropdownItem').click(function(event){
			var obj = $(this);
			var select = obj.parents('.dropdown_menu');
			var valObj = select.find('.jsBtLabel');
			if(obj.attr('data-value') != valObj.attr('data-value')){
				valObj.text(obj.text());
				valObj.attr('data-index', obj.attr('data-index'));
				valObj.attr('data-value', obj.attr('data-value'));
				select.change();
			}
		});
		$('.frm_checkbox_label').click(function(){
			var checkbox = $(this);
			checkbox.toggleClass('selected');
		});
		$('#menuBar dt').click(function(){
			$(this).parent().toggleClass('closed');
		});	
		
		$('.page_go').click(function(){
			$(this).attr('href', $(this).attr('href') + $(this).prev().val() );
		});
	});
})(jQuery);

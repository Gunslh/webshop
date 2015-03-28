(function($) {
	var fix = true;
	$(window).scroll(function () {

		if( $(document).height() - $(window).scrollTop() < 900)
		{
			  $('.checkout-buttons').removeClass('ui-ceilinglamp-current');
			  fix= false;
		}
		else
		{
			if(fix ==false)
			{
				$('.checkout-buttons').addClass('ui-ceilinglamp-current');
				fix = true;
			}
		}
//	       if ($(window).scrollTop() == $(document).height() - $('.footer').height()) {
//	           alert('bottom!!');
//
//	       }
	 });
	$('#payment-list li').hover(function(){
		$(this).find('.payment-item').addClass('payment-item-hover');
	},
	function(){
		$(this).find('.payment-item').removeClass('payment-item-hover');
	});
	$('#payment-list li').click(function(){
		$('#payment-list li').each(function(){
			$(this).find('.payment-item').removeClass('item-selected');
		})
		$(this).find('.payment-item').addClass('item-selected');
	});
	$('#payment-list li .qmark-icon').hover(function(){
		var div = $(this).parent('div');
		var li =div.parent('li');
		var X = div.offset().top;
		var Y = div.offset().left; 
		var tip = $('.qmarkTip');
		var tipInner = tip.find('.ui-tips-main');
		//alert(li.height()+"="+ li.width());
		tip.css('top', X + li.height());
		tip.css('left', Y + li.width()-29);
		tipInner.html($(this).attr('data-tips'));
		tip.show();
	},
	function(){
		$('.qmarkTip').hide();
	});
	$('.mode-tab-nav li').hover(function(){

		$(this).addClass('hover');
	},
	function(){
		$(this).removeClass('hover');
	});
	
	$('.mode-tab-nav li .qmark-tip').hover(function(){

		var X = $(this).offset().top;
		var Y = $(this).offset().left; 
		var tip = $('.qmarkTip');
		var tipInner = tip.find('.ui-tips-main');
		//alert($(this).height()+"="+ $(this).width());
		tip.css('top', X + $(this).height());
		tip.css('left', Y + $(this).width()-29);
		$().html($(this).attr('data-tips'));
		tip.show();
	},
	function(){
		$('.qmarkTip').hide();
	});
	$('.mode-tab-item').click(function(){
		$('.mode-tab-item').each(function (){
			$(this).removeClass('curr')
		});
		$(this).addClass('curr');
	});
})(jQuery);
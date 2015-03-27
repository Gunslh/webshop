(function($) {
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
	
})(jQuery);
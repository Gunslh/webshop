/**
 * 
 */
// JavaScript Document
(function($) {
	$.customize = {		
		add:function(flag){
			if(flag){
				$('#mask').show();
			}else{
				$('#mask').hide();
			}
		},
	};
	
})(jQuery);
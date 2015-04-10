/**
 * 
 */
// JavaScript Document
(function($) {
	$.Media = {
		Load:function(id, func){
			var data = 'mediaId=' + id;
			$.ajax({
				url : '/customer/actions/ProductSeekAction/getProductMedia',
				type : 'post',
				data : data,// form.serialize(),
				cache : false,
				dataType : "json",
				error : function(XMLHttpRequest, textStatus,
						errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {
					//alert(JSON.stringify(json));
					switch (json['status']) {
					case 0:
						if(func) func(json['msg']);
						break;
					default:
						alert(json['msg']);
						break;
					}
				}
			});
			return false;
		}
	};
	
})(jQuery);
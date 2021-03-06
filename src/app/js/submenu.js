/**
 * 
 */
// JavaScript Document
(function($) {
	$.Submenu = {
		Load:function(id, func){
			var data = 'catId=' + id;
			$.ajax({
				url : '/customer/actions/ProductSeekAction/getCateInfo',
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
		},
		LoadProductCount:function(id, func){
			var data = 'subId=' + id;
			$.ajax({
				url : '/customer/actions/ProductSeekAction/getProductCountBySubmenuId',
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
						if(func) func(json);
						break;
					default:
						alert(json['msg']);
						break;
					}
				}
			});
			return false;
		},
		LoadProduct:function(id, page, func){
			var data = 'subId=' + id +' & page='+page;
			console.log(data);
			$.ajax({
				url : '/customer/actions/ProductSeekAction/getProductBySubId',
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
						if(func) func(json);
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
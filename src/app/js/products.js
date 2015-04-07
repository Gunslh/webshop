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
})(jQuery);
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
		get:function(id, func)
		{
			var data = 'id=' + id;
			$.ajax({
				url : '/customer/CustomizedAction/get',
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
						//alert(json['msg']);
						if(func) func(json['msg']);
						break;
					default:
						alert(json['msg']);
						break;
					}
					
				}
			});
		},
		comfired:function(id,func){
			var data = 'id=' + id;
			$.ajax({
				url : '/customer/CustomizedAction/comfired',
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
						alert(json['msg']);
						break;
					default:
						alert(json['msg']);
						break;
					}
					if(func) func();
				}
			});
		},
	};
	
})(jQuery);
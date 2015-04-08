/**
 * 
 */
// JavaScript Document
(function($) {
	$.User = {
		Auth:function(usrname, usrpwd){
				var data = 'usrname=' + usrname + '&usrpwd=' + usrpwd;
				$.ajax({
					url : 'customer/UserAction/login',
					type : 'post',
					data : data,// form.serialize(),
					cache : false,
					dataType : "json",
					error : function(XMLHttpRequest, textStatus,
							errorThrown) {
						alert("服务器无响应! status: " + textStatus);
					},
					success : function(json, textStatus) {
						switch (json['status']) {
						case 0:
							// alert(JSON.stringify(json));
							window.location.href = '/';
							break;
						default:
							alert(json['msg']);
							break;
						}
					}
				});
				return false;
		},
		GetCart:function(func){
			
		},
		GetInfo:function(func){
			$.ajax({
				url : '/customer/UserAction/getSession',
				type : 'post',
				data : false,// form.serialize(),
				cache : false,
				dataType : "json",
				error : function(XMLHttpRequest, textStatus,
						errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {					
					switch (json['status']) {
					case 0:				
						//window.location.href = '/';
						if(func) func(json['msg']);
						break;
					default:
						break;
					}
				}
			});
		},
	};
	
})(jQuery);
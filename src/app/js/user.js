/**
 * 
 */
// JavaScript Document
(function($) {
	$.User = {		
		LoginTest:function(url){
			$.ajax({
				url : '/customer/UserAction/getSession',
				type : 'post',
				data : false,// form.serialize(),
				cache : false,
				dataType : "json",
				async:false,
				error : function(XMLHttpRequest, textStatus,
						errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {
					switch (json['status']) {
					case 0:
						break;
					default:
							alert('You have to Login first. ');
							if(url==null)
								window.location.href = '/login.html';
							else
								window.location.href = '/login.html?url='+url;
						break;
					}
				}
			});
			return false;
		},
		Auth:function(usrname, usrpwd, url){
				var data = 'usrname=' + usrname + '&usrpwd=' + usrpwd;
				$.ajax({
					url : '/customer/UserAction/login',
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
							if(url==null)
								window.location.href = '/';
							else
								window.location.href = url;
							break;
						default:
							alert(json['msg']);
							break;
						}
					}
				});
				return false;
		},
		Logout:function(){
			$.ajax({
				url : '/customer/UserAction/logout',
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
		RemoveFromCart:function(id){
			var data = "productId="+id;
			console.log(data);
			$.ajax({
				url : '/customer/CartAction/del',
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
						//window.location.href = '/';
						alert('Remove from Cart Success');
						break;
					default:
						break;
					}
				}
			});
		},
		AddToCart:function(id, count, price){
			var data = "productId="+id+"&total="+count+"&price="+price;
			console.log(data);
			$.ajax({
				url : '/customer/CartAction/add',
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
						//window.location.href = '/';
						alert('Add to Cart Success');
						break;
					default:
						break;
					}
				}
			});
		},
		GetCart:function(func){
			$.ajax({
				url : '/customer/CartAction/watchCart',
				type : 'post',
				data : false,// form.serialize(),
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
						//window.location.href = '/';
						break;
					default:
						break;
					}
				}
			});
		},
		CartItemCheck:function(id){
			var data = 'id='+id;
			$.ajax({
				url : '/customer/CartAction/SetCheck',
				type : 'post',
				data : data,// form.serialize(),
				cache : false,
				dataType : "json",
				async:false,
				error : function(XMLHttpRequest, textStatus,
						errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {		
					//alert(JSON.stringify(json));
					switch (json['status']) {
					case 0:		
						break;
					default:
						break;
					}
				}
			});
		},
		CartItemUnCheck:function(id){
			var data = 'id='+id;
			$.ajax({
				url : '/customer/CartAction/SetUnCheck',
				type : 'post',
				data : data,// form.serialize(),
				cache : false,
				dataType : "json",
				async:false,
				error : function(XMLHttpRequest, textStatus,
						errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {		
					//alert(JSON.stringify(json));
					switch (json['status']) {
					case 0:		
						break;
					default:
						break;
					}
				}
			});
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
		AddressLoad:function(){		
			var list = null;
			$.ajax({
				url : '/customer/UserAction/AddressLoad',
				type : 'post',
				data : false,// form.serialize(),
				cache : false,
				dataType : "json",
				async:false,
				error : function(XMLHttpRequest, textStatus,
						errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {		
					
					list = json['msg'];
					switch (json['status']) {
					case 0:		
						break;
					default:
						break;
					}
				}
			});
			return list;
		},
		AddressAdd:function(name,country,state,city,street,telephone){
			var data = 'name='+name+'&country='+country+'&state='+state+'&city='+city+'&street='+street+'&phone='+telephone;
			$.ajax({
				url : '/customer/UserAction/AddressAdd',
				type : 'post',
				data : data,// form.serialize(),
				cache : false,
				dataType : "json",
				async:false,
				error : function(XMLHttpRequest, textStatus,
						errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {		
					//alert(JSON.stringify(json));
					switch (json['status']) {
					case 0:		
						break;
					default:
						break;
					}
				}
			});
		},
		AddressDel:function(id){
			var data = 'id='+id;
			$.ajax({
				url : '/customer/UserAction/AddressDel',
				type : 'post',
				data : data,// form.serialize(),
				cache : false,
				dataType : "json",
				async:false,
				error : function(XMLHttpRequest, textStatus,
						errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {		
					//alert(JSON.stringify(json));
					switch (json['status']) {
					case 0:		
						break;
					default:
						break;
					}
				}
			});
		},
		AddressDefault:function(id){
			var data = 'id='+id;
			$.ajax({
				url : '/customer/UserAction/addressDefault',
				type : 'post',
				data : data,// form.serialize(),
				cache : false,
				dataType : "json",
				async:false,
				error : function(XMLHttpRequest, textStatus,
						errorThrown) {
					alert("服务器无响应! status: " + textStatus);
				},
				success : function(json, textStatus) {		
					//alert(JSON.stringify(json));
					switch (json['status']) {
					case 0:		
						break;
					default:
						break;
					}
				}
			});
		}
	};
	
})(jQuery);
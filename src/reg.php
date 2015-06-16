<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration</title>
<link href="app/css/login.css" type="text/css" rel="stylesheet" />
<?php include_once __DIR__ . '/views/common/css2js.php'; ?>
</head>
<body>
<div class="body-container">
    <div class="index-top">
        <?php include_once __DIR__ . '/views/common/head.php'; ?>
    </div>
    <div class="index-search">
        <?php include_once __DIR__ . '/views/common/search.php'; ?>
    </div>
    <div class="index-menu">
        <?php include_once __DIR__ . '/views/common/menu.php'; ?>
    </div>
		<div class="reg-container">
			<div class="form">

				<div class="item">
					<span class="title">New Customers</span>
					<div class="reg-name">
						<span class="left label">UserName:</span>
						<div class="item-info left">
							<input id="loginname" class="text" type="text" autocomplete="off"
								tabindex="1"></input>
							<div class="i-name ico"></div>
						</div>
						<span class="left hits">User Name is required.</span> <span
							class="left hits_err"></span>
					</div>
					<div class="reg-pass">
						<span class="left label">Password:</span>
						<div class="item-info left">
							<input id="nloginpwd" class="text" tabindex="2"
								autocomplete="off" type="password" />
							<div class="i-pass ico"></div>
						</div>
						<span class="left hits">Enter your password.</span> <span
							class="left hits_err"></span>
					</div>
					<div class="re-pass">
						<span class="left label">Confirmed Password:</span>
						<div class="item-info left">
							<input id="ncloginpwd" class="text" tabindex="3"
								autocomplete="off" type="password" />
							<div class="i-pass ico"></div>
						</div>
						<span class="left hits">Enter your password again.</span> <span
							class="left hits_err"></span>
					</div>
					<div class="reg-rname">
						<span class="left label">Name:</span>
						<div class="item-info left">
							<input id="rname" class="text" type="text" autocomplete="off"
								tabindex="1"></input>
							<div class="i-name ico"></div>
						</div>
						<span class="left hits">Name is required.</span> <span
							class="left hits_err"></span>
					</div>
					<div class="reg-phone">
						<span class="left label">Phone:</span>
						<div class="item-info left">
							<input id="phone" class="text" type="text" autocomplete="off"
								tabindex="1"></input>
							<div class="i-name ico"></div>
						</div>
						<span class="left hits">Phone is required.</span> <span
							class="left hits_err"></span>
					</div>
					<div class="reg-addr">
						<span class="left label">Address:</span>
						<div class="item-info left">
							<input id="addr" class="text" type="text" autocomplete="off"
								tabindex="1"></input>
							<div class="i-name ico"></div>
						</div>
						<span class="left hits">Country is required.</span> <span
							class="left hits_err"></span>
					</div>
					<div class="item-info btn-submit">
						<input id="loginsubmit" class="btn-img btn-entry" type="button"
							tabindex="4" value="登录"></input>
					</div>
				</div>
			</div>
		</div>
    <div class="footer">
        <?php include_once __DIR__ . '/views/common/foot.php'; ?>
    </div>

	</div>
	<script src="app/js/templates.js"></script>
	<script type="text/javascript" src="/lib/js/md5-min.js"></script>
	<script type="text/javascript">
		$(function() {
			function checkName() {
				if ($('#loginname').val().length == 0) {
					$('.reg-name .hits_err').html("User Name required");
					$('.reg-name .hits_err').show();
					return false;
				}
				return true;
			}
			function checkPwd() {
				if ($('#nloginpwd').val().length == 0)
				{
					$('.reg-pass .hits_err').html("Need to be filled");
					$('.reg-pass .hits_err').show();
					return false;
				}
				if ($('#ncloginpwd').val() != $('#nloginpwd').val()) {
					$('.re-pass .hits_err').html("Password does not match");
					$('.re-pass .hits_err').show();
				}
				return true;
			}
			function checkRePwd() {
				if ($('#ncloginpwd').val() != $('#nloginpwd').val()) {
					$('.re-pass .hits_err').html("Password does not match");
					$('.re-pass .hits_err').show();
					return false;
				}
				return true;
			}
			function checkRealName(){
				if($('#rname').val().length == 0){
					$('.reg-rname .hits_err').html("Name is required");
					$('.reg-rname .hits_err').show();
					return false;
				}
				return true;
			}
			$('#rname').focus(function() {
				$(this).addClass('highlight1');
				$(this).parent("div").parent("div").find(".hits").show();
				$(this).parent("div").parent("div").find(".hits_err").hide();
			});
			$('#loginname').focus(function() {
				$(this).addClass('highlight1');
				$(this).parent("div").parent("div").find(".hits").show();
				$(this).parent("div").parent("div").find(".hits_err").hide();
			});
			$('#nloginpwd').focus(function() {
				$(this).addClass('highlight1');
				$(this).parent("div").parent("div").find(".hits").show();
				$(this).parent("div").parent("div").find(".hits_err").hide();
			});
			$('#ncloginpwd').focus(function() {
				$(this).addClass('highlight1');
				$(this).parent("div").parent("div").find(".hits").show();
				$(this).parent("div").parent("div").find(".hits_err").hide();

			});

			$('#loginname').blur(
					function() {
						$(this).removeClass('highlight1');
						$(this).parent("div").parent("div").find(".hits")
								.hide();
						$(this).parent("div").parent("div").find(".hits_err")
								.hide();
						if (checkName() == true)
							$(this).parent("div").find(".ico").addClass(
									"succeed");
						else
							$(this).parent("div").find(".ico").removeClass(
									"succeed");

						var usrname = $('#loginname').val();
						if (!usrname)
							return;
						var data = 'usrname=' + usrname;

						var obThis = $(this);
						$.ajax({
							url : 'customer/UserAction/registerCheck',
							type : 'post',
							data : data,//form.serialize(),
							cache : false,
							dataType : "json",
							error : function(XMLHttpRequest, textStatus,
									errorThrown) {
								alert("Server error! status: " + textStatus);
							},
							success : function(json, textStatus) {

								alert(json['msg']);
								switch (json['status']) {
								case 0:
									obThis.parent("div").find(".ico")
											.removeClass("failed");
									obThis.parent("div").find(".ico").addClass(
											"succeed");
									break;
								default:
									obThis.parent("div").find(".ico")
											.removeClass("succeed");
									obThis.parent("div").find(".ico").addClass(
											"failed");
									$('.reg-name .hits_err').html(
											"User Name exist");
									$('.reg-name .hits_err').show();
									break;
								}
							}
						});
					});
			$(' #nloginpwd').blur(function() {
				$(this).removeClass('highlight1');
				$(this).parent("div").parent("div").find(".hits").hide();
				$(this).parent("div").parent("div").find(".hits_err").hide();
				if (checkPwd() == true)
					$(this).parent("div").find(".ico").addClass("succeed");
				else
					$(this).parent("div").find(".ico").removeClass("succeed");
			});
			$('#ncloginpwd').blur(function() {
				$(this).removeClass('highlight1');
				$(this).parent("div").parent("div").find(".hits").hide();
				$(this).parent("div").parent("div").find(".hits_err").hide();
				if (checkRePwd() == true)
					$(this).parent("div").find(".ico").addClass("succeed");
				else
					$(this).parent("div").find(".ico").removeClass("succeed");
			});
			
			$('#rname').blur(function() {
				$(this).removeClass('highlight1');
				$(this).parent("div").parent("div").find(".hits").hide();
				$(this).parent("div").parent("div").find(".hits_err").hide();
				if (checkRealName() == true)
					$(this).parent("div").find(".ico").addClass("succeed");
				else
					$(this).parent("div").find(".ico").removeClass("succeed");
			});
			
			function submitCheck() {
				if (checkName() == false)
					return false;
				if (checkPwd() == false)
					return false;				
				if (checkRePwd() == false)
					return false;				
				if (checkRealName() == false)
					return false;							
				return true;
			}

			$('.btn-submit').click(
					function() {
						if (submitCheck() == false)
							return false;
						var data = 'usrname=' + $('#loginname').val()
								+ '&usrpwd=' + hex_md5($(' #nloginpwd').val())
								+ '&usrrealname=' + $('#rname').val()
								+ '&usrtele=' + $('#phone').val() + '&usraddr='
								+ $('#addr').val() + '&usrzipcode=1';
						$.ajax({
							url : 'customer/UserAction/register',
							type : 'post',
							data : data,//form.serialize(),
							cache : false,
							dataType : "json",
							error : function(XMLHttpRequest, textStatus,
									errorThrown) {
								alert("服务器无响应! status: " + textStatus);
							},
							success : function(json, textStatus) {

								switch (json['status']) {
								case 10:
									alert(json['msg']);
									break;
								default:
									alert(json['msg']);
									break;
								}
							}
						});
					});
		});
	</script>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="app/css/login.css" type="text/css" rel="stylesheet"/>
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
    <div class="login-container">
        <div class="form">
            <div class="item">
                <div class="item-info">
                    <input id="loginname" class="text" type="text" autocomplete="off"
                           tabindex="1" name="loginname" placeholder="UserName"></input>

                    <div class="i-name ico"></div>
                </div>
                <div class="item-info">
                    <input id="nloginpwd" name="nloginpwd" class="text" tabindex="2"
                           autocomplete="off" placeholder="Password" type="password"/>

                    <div class="i-pass ico"></div>
                </div>
                <div class="item-info login-btn2013">
                    <input id="loginsubmit" class="btn-img btn-entry" type="button"
                           tabindex="3" value="登录"></input>
                </div>
            </div>
        </div>
        <div class="free-regist">
            <span><a href="/reg.php">Register&gt;&gt;</a></span>
        </div>
    </div>
    <div class="footer">
        <?php include_once __DIR__ . '/views/common/foot.php'; ?>
    </div>
</div>
<script src="app/js/public.js"></script>
<script type="text/javascript" src="lib/js/md5-min.js"></script>
<script type="text/javascript">
$(function () {
    $('#loginname , #nloginpwd').focus(function () {
        $(this).css('border', '1px solid green');
    });
    $('#loginname , #nloginpwd').blur(function () {
        $(this).css('border', '1px solid #ccc');
    });
    $('#loginsubmit').click(function () {
        $.User.Auth($('#loginname').val(), hex_md5($('#nloginpwd').val()), $.public.getQueryString('url'));
    });
    $.key.enter(function () {
        $('#loginsubmit').click()
    });
});
</script>
</body>
</html>
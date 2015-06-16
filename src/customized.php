<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Customized</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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
    <div class="cc-info">
    </div>
    <div class="customized-container">
        <div class="cc-form left">
            <form id="cc-form" name="cc-form" method="post" action="/customer/CustomizedAction/add"
                  enctype="multipart/form-data">
                <div class="cc-name"><input type="text" id="name" name="name"></input></div>
                <div class="cc-lastname"><input type="text" id="lastname" name="lastname"></input></div>
                <div class="cc-email"><input type="text" id="email" name="email"></input></div>
                <div class="cc-phone"><input type="text" id="phone" name="phone"></input></div>
                <div class="cc-description"><textarea id="descr" name="descr"></textarea></div>
                <div class="cc-height"><input type="text" name="height"></input></div>
                <div class="cc-bust"><input type="text" name="bust"></input></div>
                <div class="cc-waist"><input type="text" name="waist"></input></div>
                <div class="cc-hip"><input type="text" name="hip"></input></div>
                <div class="cc-weight"><input type="text" name="weight"></input></div>
                <div class="cc-file1"><input type="file" name="files"></input></div>
                <div class="cc-file2"><input type="file" name="files1" id="file"></input></div>
                <div class="cc-text">(Your uploaded image must be JPG,GIF,PNG format. The image size can not exceed
                    150KB in size JPG,GIF,PNG format)
                </div>
                <div class="cc-send super-link"></div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="footer">
        <?php include_once __DIR__ . '/views/common/foot.php'; ?>
    </div>
</div>
<script src="lib/js/jquery-1.8.1.min.js"></script>
<script src="app/js/templates.js"></script>
<script src="app/js/public.js"></script>
<script src="app/js/user.js"></script>
<script src="app/js/ui.js"></script>
<script type="text/javascript" src="lib/js/md5-min.js"></script>
<script type="text/javascript">
$(function () {
    $.User.LoginTest("/customized.php");
    $('.cc-form .cc-send').click(function () {
        $.public.mask(true);
        $("#cc-form").submit();
    });
});
</script>
</body>
</html>
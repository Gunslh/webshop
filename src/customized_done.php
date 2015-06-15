<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Customized Done</title>
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
        <p class="cc-done">
            You have done the customized product submission. Please wait for the reply from our customer service through
            email. Please remember your service code below.
            you must provide your code when you contact customer service.

        <p class="guid"></p>
        </p>
    </div>
    <div class="footer">
        <?php include_once __DIR__ . '/views/common/foot.php'; ?>
    </div>
</div>
<script src="lib/js/jquery-1.8.1.min.js"></script>
<script src="app/js/templates.js"></script>
<script src="app/js/public.js"></script>
<script src="app/js/user.js"></script>
<script type="text/javascript" src="lib/js/md5-min.js"></script>
<script type="text/javascript">
$(function () {
    $.User.LoginTest("/customized.php");
    $('.guid').html($.public.getQueryString('guid'));
});
</script>
</body>
</html>
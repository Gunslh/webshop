<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<link href="/app/css/category.css" type="text/css" rel="stylesheet"/>
<?php include_once __DIR__ . '/views/common/css2js.php'; ?>
<link rel="stylesheet" href="/app/extend/uploadify/uploadify.css"/>
<script type="text/javascript" src="/app/extend/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript">
$(function () {
    $('#uploadify').uploadify({
        width: 120,
        height: 20,
        buttonText : 'SELECT THE FILE',
        swf : '/app/extend/uploadify/uploadify.swf'
    });
});
</script>
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
    <div class="category-container">
        <div class="c-info">
            <p>
                <?php //echo $cats->t_cateDescr?>
            </p>
        </div>
        <div id="bookForm">
            <form action="">
                <table>
                    <tr>
                        <td width="90">1.First Name:</td>
                        <td><input type="text" name="firstName" id="firstName"/></td>
                        <td>Last Name:</td>
                        <td><input type="text" name="lastName" id="lastName"/></td>
                    </tr>
                    <tr>
                        <td>2.Valid Email:</td>
                        <td><input type="text" name="email" id="email"/></td>
                        <td>Phone Number:</td>
                        <td><input type="text" name="phone" id="phone"/></td>
                    </tr>
                    <tr>
                        <td valign="baseline">3.Description:</td>
                        <td colspan="3" align="left">
                            <textarea name="description" id="description" cols="30" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" colspan="4">Size Chart:</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="3" align="left">Height <input type="text" name="height" id="height"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="3" align="left">Bust <input type="text" name="bust" id="bust"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="3" align="left">Waist <input type="text" name="waist" id="waist"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="3" align="left">Hip <input type="text" name="hip" id="hip"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="3" align="left">Weight<input type="text" name="weight" id="weight"/>kg</td>
                    </tr>
                    <tr>
                        <td align="right" valign="baseline">4.Upload:</td>
                        <td colspan="3" align="left"><input type="file" name="uploadify" id="uploadify"/></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td align="left" colspan="3">
                            (Your uploaded image must be in JPG, PNG, GIF format. The image size cannot exceed 150KB in size)
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="3" align="left">
                            <input type="button" value="" id="sendButton"/>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div class="footer">
        <?php include_once __DIR__ . '/views/common/foot.php'; ?>
    </div>
</div>
</body>
</html>
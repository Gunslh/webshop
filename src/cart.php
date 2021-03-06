<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Cart</title>
<link href="app/css/cart.css" type="text/css" rel="stylesheet"/>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
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
    <div class="cart-container">
        <div class="cart-total">Total</div>
        <div class="cart-detail">
            <div class="banner">
                <div class="left check">
                    <input type="checkbox"> </input> Select all
                </div>
                <div class="left cart-product">Product</div>
                <div class="left cart-price">Price</div>
                <div class="left cart-number">Number</div>
                <div class="left cart-sum">Total</div>
                <div class="left cart-op">Operation</div>
            </div>

            <div class="cart-toolbar">
                <div class="toolbar-wrap">
                    <div class="options-box">

                        <div class="select-all">
                            <div class="cart-checkbox">
                                <input type="checkbox"/> <label class="checked" for="">Select
                                    All</label>
                            </div>
                        </div>
                        <div class="toolbar-right">
                            <div class="normal">
                                <div class="comm-right">
                                    <div class="btn-area">
                                        <a href="/order.html"
                                           class="submit-btn "> Check Out<b></b></a>
                                        <!-- <a href="javascript:void(0);" class="submit-btn submit-btn-disabled">
                                    去结算<b></b></a> -->
                                    </div>
                                    <div class="price-sum">
                                        <div>
                                            <span class="txt">Total:</span> <span
                                                class="price sumPrice"><em>0</em></span>
                                            <br></br>
                                            <!-- 										<span class="txt">已节省：</span>
                                        <span class="price totalRePrice">- ¥225.00</span> -->
                                        </div>
                                    </div>
                                    <div class="amount-sum">
                                        Total<em>0</em>Items
                                    </div>
                                    <div class="clr"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <?php include_once __DIR__ . '/views/common/foot.php'; ?>
    </div>

</div>
<script src="/lib/js/jquery-1.8.1.min.js"></script>
<script src="/app/js/templates.js"></script>
<script type="text/javascript">
$(function () {
    $.User.LoginTest('/cart.html');
    function updateTotal(quntity_form, val) {
        var head = quntity_form.parent('div').parent('div');
        var price = getPrice(head.parent('div').attr("attid"));
        var sum_obj = head.find('.item-sum').find('strong');
        sum_obj.html(val * price);
        totalRefresh();
    }

    function setSum(val, num) {
        $('.sumPrice').find('em').html(val);
        $('.amount-sum em').html(num);
    }

    function getItemNum(obj) {
        return obj.find('.item-number .quantity-form input').val();
    }

    function getItemTotal(obj) {
        return obj.find('.item-sum strong').html();
    }

    function totalRefresh() {
        var sum = 0;
        var quntity = 0;
        $('.item-list').each(function () {
            var check = $(this).find('.item-check').find('input');
            if (check.attr('checked')) {
                sum += parseFloat(getItemTotal($(this)));
                quntity += parseInt(getItemNum($(this)));
            }
            //alert('total '+$(this).parent('div').attr('attid'));
        });
        //alert(parseFloat(sum)+'   '+ quntity);
        setSum(parseFloat(sum), quntity);
    }

    function getPrice(id) {
        var price = 0;
        $('.cart-list').each(function () {
            if ($(this).attr('attid') == id) {
                price = $(this).find('.item-list').find('.item-price').find('strong').html();
            }
        });
        return price;
    }


    $('.itxt').live("change", function () {
        var parment = $(this).parent('div');
        var num = $(this).val();
        if (num > 1)
            parment.find('.decrement').removeClass('disabled');
        else
            parment.find('.decrement').removeClass('disabled');
        updateTotal(parment, num);
    });

    $(".item-check input[type='checkbox']").live("change", function () {
        $.public.mask(true);
        if ($(this).attr('checked')) {
            $(this).parent('div').parent('div').addClass(
                'item-selected');
            //alert($(this).parent('div').parent('div').parent('div').attr('attid'));
            $.User.CartItemCheck($(this).parent('div').parent('div').parent('div').attr('attid'));
        } else {
            $(this).parent('div').parent('div').removeClass(
                'item-selected');
            $.User.CartItemUnCheck($(this).parent('div').parent('div').parent('div').attr('attid'));
        }
        totalRefresh();
        $.public.mask(false);
    });
    $(".check input[type='checkbox'], .cart-checkbox input[type='checkbox']").live("click", function () {
        if ($(this).attr('checked')) {
            $('.item-list').each(function () {
                if (!$(this).find('.item-check input[type="checkbox"]').attr('checked'))
                    $(this).find('.item-check input[type="checkbox"]').click();

            });
        } else {
            $('.item-list').each(function () {
                if ($(this).find('.item-check input[type="checkbox"]').attr('checked'))
                    $(this).find('.item-check input[type="checkbox"]').click();

            });
        }
    });
    function cartReload() {
        $.User.GetCart(function (json) {
            var itemcount = json.length - 1;
            var total = json[itemcount].totalPrice;
            //alert(JSON.stringify(json));
            var obj = $('.cart-detail .banner');

            for (var i in json) {
                if (i == itemcount)
                    break;
                var mediaId = json[i].fk_mediaId;
                var id = json[i].t_pkId;
                var pdid = json[i].fk_product;

                obj.after('' +
                '<div class="cart-list"  attid="' + pdid + '">' +
                '<div class="item-list">' +
                '<div class="item-check left">' +
                '<input type="checkbox"> </input>' +
                '</div>' +
                '<div class="item-product left" >' +
                '<div class="goods-item">' +
                '<div class="p-img" media="' + mediaId + '">' +
                '<a href="/product/' + id + '.html" target="_blank">' +
                '<img src=""></a>' +
                '</div>' +
                '<div class="item-msg">' +
                '<div class="p-name">' +
                '<a href="/product/' + id + '.html" target="_blank">' + json[i].t_descr + '</a>' +
                '</div>' +
                '<div class="p-extend">' +
                '<span class="promise"> </span>' +
                '<span class="promise"></span>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="item-price left cart-cell">' +
                '<strong>' + json[i].t_price + '</strong>' +
                '</div>' +
                '<div class="item-number left cart-cell">' +
                '<div class="quantity-form">' +
                '<a href="javascript:void(0);" class="decrement">-</a> <input ' +
                'autocomplete="off" class="itxt" value="' + json[i].t_total + '" type="text"/>' +
                '<a href="javascript:void(0);" class="increment">+</a>' +
                '</div>' +
                '</div>' +
                '<div class="item-sum left cart-cell">' +
                '<strong>' + parseFloat(json[i].t_price) * parseInt(json[i].t_total) + '</strong>' +
                '</div>' +
                '<div class="item-ops left cart-cell">' +
                '<a href="javascript:void(0)" class="item-del">delete</a>' +
                '</div>' +
                '</div>');


                $.Media.Load(mediaId, function (json1) {
                    //alert(JSON.stringify(json));
                    $('.item-list .p-img').each(function () {
                        if (parseInt($(this).attr('media')) == parseInt(json1[0].fk_mediaId)) {
                            $(this).find('a').find('img').attr('src', '/' + json1[0].t_url);
                        }
                    });
                });
                if (json[i].t_selected == "1") {
                    $('.cart-list').each(function () {
                        var input = $(this).find('.item-list').find('.item-check').find('input');
                        if (json[i].t_pkId == $(this).attr('attid'))
                        //input.attr('checked','checked');
                            input.click();
                    });
                }
            }

            totalRefresh();
        });
    }

    cartReload();
    $(".increment").live("click", function () {

        var parment = $(this).parent('div');
        var obj = parment.find('.itxt');
        var num = obj.val();
        num++;
        if (parment.find('.increment').hasClass('disabled'))
            return;
        obj.val(num);
        if (num > 1) {
            parment.find('.decrement').removeClass('disabled');
        }

        updateTotal(parment, num);
    });

    $(".decrement").live("click", function () {

        var parment = $(this).parent('div');
        var obj = parment.find('.itxt');
        var num = obj.val();
        num--;
        if (parment.find('.decrement').hasClass('disabled'))
            return;

        obj.val(num);
        if (num == 1) {
            parment.find('.decrement').addClass('disabled');
        }
        updateTotal(parment, num);
    });
});
</script>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Order</title>
<link href="app/css/order.css" type="text/css" rel="stylesheet" />
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
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
			<div class="order-container checkout-steps">

				<div class="mt step">
					<p>Order information form</p>
				</div>

				<div id="step-1" class="step step-complete">
					<div class="step-title">
						<div id="save-consignee-tip" class="step-right"></div>
						<strong id="consigneeTitleDiv">Address Selection</strong> <span
							class="step-action" id="consignee_edit_action"><a
							href="#none">Modify</a></span>
					</div>
					<div class="step-content">
						<div id="consignee" class="sbox-wrap">
							<div class="sbox">
								<div class="s-content">
									<p class="show">

									</p>
									<div class="form">
										<div id="consignee-list" name="consignee-list">

										</div>

										<!--更多常用收货人--->
										<div class="address-list">
											<div class="inner group">
												<div id="select-more" class="select-expand">
													<span >More Address</span><s></s>
												</div>
											</div>
										</div>


										<!---详细收货人信息表单--->
										<div class="item" id="use-new-address">
											<a name="editConsignee"></a>
											<input class="hookbox" name="consignee_radio" type="radio" attr="new">
											<labelfor="consignee_radio_new">New Address</label>
										</div>
										<form>
											<div class="consignee-form"
												style="padding-left: 12px; display: none;">

												<div class="list" id="name_div">
													<span class="label"><em>*</em>Your Name：</span>
													<div class="field">
														<input class="textbox" id="consignee_name"
															name="consigneeParam.name" maxlength="20" type="text">
													</div>
													<span class="status error" id="name_div_error"></span>
												</div>
												<div class="list" id="area_div">
													<span class="label"><em>*</em>Country：</span>
													<div class="field">
														<span id="span_area"> <span id="span_province">
																<select id="country-select" class="contury" style="width: 145px; height: 26px;">
															</select>
														</span>

													</div>
												</div>
												<div class="list">
													<span class="label"><em>*</em>State：</span>
													<div class="field">
														<span class="fl selected-address" id="areaNameTxt"></span>
														<input class="textbox" id="State" type="text"></input>
													</div>
												</div>
												<div class="list">
													<span class="label"><em>*</em>City：</span>
													<div class="field">
														<span class="fl selected-address" ></span>
														<input class="textbox" id="City" type="text"></input>
													</div>
												</div>
												<div class="list" >
													<span class="label"><em>*</em>Street：</span>
													<div class="field">
														<span class="fl selected-address" id="areaNameTxt"></span>
														<input class="textbox" id="Street" type="text"></input>
													</div>
												</div>
												<div class="list" id="call_div">
													<span class="label"><em>*</em>Telephone：</span>
													<div class="field">
															<input class="textbox" id="mobile" maxlength="11" value="" type="text"> </input>
														<span class="status error" id="call_div_error"></span>
													</div>
												</div>
											</div>
										</form>
										<div class="form-btn group">
											<a href="#none" class="btn-submit"><span
												id="saveConsigneeTitleDiv">Save Selection</span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--@end div#consignee-->
					</div>
				</div>
				<div id="shipAndSkuInfo" class="step">
					<div id="payShipAndSkuInfo">
						<div class="step-tit">
							<strong id="consigneeTitleDiv">Payment Selection</strong>
						</div>

						<div class="step-cont">
							<div class="payment-list" id="">
								<div class="list-cont">
									<ul id="payment-list">
										<li style="cursor: pointer;" >
											<div class="payment-item item-selected online-payment" payid="1">
												<b></b> Cheque<span class="qmark-icon qmark-tip"
													data-tips=""></span>
											</div>
										</li>
										<li style="cursor: pointer;">
											<div class="payment-item" payid="2">
												<b></b> PayPal<span class="qmark-icon qmark-tip"
													data-tips=""></span>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="step-tit">
							<h3>Delivery List</h3>
							<div class="extra-r">
								<a href="cart.html" id="cartRetureUrl"
									class="return-edit ftx-05">Back to Cart</a>
							</div>
						</div>
						<div class="step-cont" id="skuPayAndShipment-cont">
							<div class="shopping-lists" id="shopping-lists">
								<div class="shopping-list ABTest">
									<div class="goods-list">

										<h4 class="vendor_name_h" id="0">Item Lists</h4>

										<div class="goods-suit goods-last">
											<div class="goods-suit-tit">
												<strong> </strong>
											</div>
										</div>


									</div>
									<div class="dis-modes">

										<div class="mode-item mode-tab">
											<h4>
												Method：
											</h4>
											<div class="mode-tab-nav">
												<ul>
													<li class="mode-tab-item curr" id="free"><span class="m-txt">Free<i
															class="qmark-icon qmark-tip"
															data-tips="Fast by need payment"></i></span><b></b>
													</li>
													<li class="mode-tab-item " id="ems"><span
														id="jdShip-span-tip" class="m-txt">EMS<i
															class="qmark-icon qmark-tip"
															data-tips="Free But speed low"></i></span><b></b></li>
													<li class="mode-tab-item" id="tnt" ><span class="m-txt">TNT<i
															class="qmark-icon qmark-tip"
															data-tips="Fast by need payment"></i></span><b></b>
													</li>
												</ul>
											</div>
											<div class="mode-tab-con ui-switchable-panel-selected"
												id="jd_shipment">
												<ul class="mode-list">
													<!-- <li>
														<div class="fore1" id="payment_name_div">
															<span class="ftx-03">付款方式：</span>现金
														</div>
														<div class="fore2" onclick="doEditPayway('0')">
															<a href="#none" class="ftx-05 payment-edit">修改</a>
														</div>
													</li> -->

													<li>
														<div class="fore1" id="jd_shipment_calendar_date">
															<span class="ftx-03 timecost">TimeCost： 60 days</span>
														</div>
													</li>
												</ul>
											</div>


										</div>

									</div>
									<!--dis-modes 结束-->
									<div class="clr"></div>
									<div class="freight-cont">
										<strong class="ftx-01" style="color: #666"
											freightbyvenderid="0" popjdshipment="false"></strong>
									</div>
								</div>
							</div>
						</div>
						<div class="order-summary">
							<div class="statistic fr">
								<div class="list">
									<span><em class="ftx-01">1</em> Proucts, Total Gross：</span> <em
										class="price" id="warePriceId" v="79.9">0</em>
								</div>
								<div class="list">
									<span>Delivery：</span> <em class="price" id="freightPriceId"><font
										color="#000000"> 0</font></em>
								</div>
								<div style="display: block;" class="list" id="showCouponPrice">
									<span>Discount：</span><em class="price" id="couponPriceId">0</em>
								</div>
								<div class="list">
									<span>Total Payment：</span> <em class="price" id="sumPayPriceId">0</em>
								</div>
							</div>
							<div class="clr"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="trade-foot">
				<div id="checkout-floatbar" class="group">
					<div class="ui-ceilinglamp checkout-buttons ui-ceilinglamp-current">
						<div class="sticky-placeholder hide" style="display: none;">
						</div>
						<div class="sticky-wrap">
							<div class="inner">
								<button type="submit" class="checkout-submit btn-1"
									id="order-submit" style="font-size: 22px;">
									Submit
								</button>
								<span class="total">Total Payment：<strong id="payPriceId">0</strong>

								</span> <span id="checkCodeDiv"></span>
							</div>
							<span id="submit_message" style="display: none"
								class="submit-error"></span>
							<div class="submit-check-info" id="submit_check_info_message"
								style="display: none"></div>
						</div>
					</div>
				</div>
				<!--/ /widget/checkout-floatbar/checkout-floatbar.tpl -->
			</div>
			<div class="footer">
                <?php include_once __DIR__ . '/views/common/foot.php'; ?>
			</div>
            <div class="ui-tips ui-tips-top ui-tips-x-left qmarkTip"
                 style="z-index: 101; top: 372px; left: 414.5px; display: none;"
                 id="uis-tips-1">
                <div class="ui-tips-main">
                    送货上门后再收款，支持现金、POS机刷卡、支票支付 <a
                        href="http://help.jd.com/help/distribution-768-2-2813-2863-0-1410707152669.html"
                        target="_blank" class="ftx-05">查看服务及配送范围</a>
                </div>
                <span class="ui-tips-arrow" style="z-index: 101"></span>
            </div>
		</div>
</div>
<script src="/lib/js/jquery-1.8.1.min.js"></script>
<script src="/app/js/templates.js"></script>
<script src="/app/js/order.js"></script>
<script src="/app/js/ui.js"></script>
<script src="/app/js/user.js"></script>
<script type="text/javascript">
$(function () {
    $('.hookbox').live("click",
        function () {
            var attr = $(this).attr('attr');
            $('.hookbox').each(
                function () {
                    if ($(this).attr('attr') != attr) {
                        $(this).attr("checked", false);
                        $(this).parent('div').removeClass(
                            'item-selected');
                        $(this).parent('div').find(
                            '.item-action').css(
                            'display', 'none');

                    } else {
                        $(this).parent('div').addClass(
                            'item-selected');
                        $(this).parent('div').find(
                            '.item-action').css(
                            'display', 'inline');
                    }

                });
            if (attr == "new")
                $('.consignee-form').css('display', 'block');
            else
                $('.consignee-form').css('display', 'none');

        });
    $('.item').live(
        "click",
        function () {
            var attr = $(this).find('.hookbox').attr('attr');
            $(this).find('.hookbox').attr('checked', true);
            $('.hookbox').each(
                function () {
                    if ($(this).attr('attr') != attr) {
                        $(this).attr("checked", false);
                        $(this).parent('div').removeClass(
                            'item-selected');
                        $(this).parent('div').find(
                            '.item-action').css(
                            'display', 'none');

                    } else {
                        $(this).parent('div').addClass(
                            'item-selected');
                        $(this).parent('div').find(
                            '.item-action').css(
                            'display', 'inline');
                    }

                });
            if (attr == "new")
                $('.consignee-form').css('display', 'block');
            else
                $('.consignee-form').css('display', 'none');
            //hook.attr("checked",true);
        });

    //处理地址部分
    function addressLoad() {
        $.public.mask(true);
        var addrList = $.User.AddressLoad();
        var obj = $('#consignee #consignee-list');
        var html = '';
        var def = -1;
        //alert(JSON.stringify(addrList));
        obj.html("");
        for (var i in addrList) {
            html += '' +
            '<div class="item" index="consignee_index_1">' +
                '<input class="hookbox" type="radio" attr="' + addrList[i].t_pkId + '">' +
                '<label for="consignee_radio_26377362"> <b>' + addrList[i].t_name + '</b>&nbsp;' + addrList[i].t_country + ' ' + addrList[i].t_state + ' ' + addrList[i].t_city + ' ' + addrList[i].t_street + ' &nbsp; ' + addrList[i].t_phone + '&nbsp;</label> ' +
                '<span class="item-action"> ' +
                    '<a href="#none" class="default_btn">Default</a>' +
                        //'<a href="#none" class="edit_btn">Edit</a>&nbsp;'+
                    ' <a href="#none" class="del_btn" >Delete</a>&nbsp;' +
                '</span>' +
            '</div>';
            if (parseInt(addrList[i].isDefault) == 1) {
                $('#consignee .show').html(addrList[i].t_name + ' &nbsp; ' + addrList[i].t_phone + '&nbsp; <br>' +
                addrList[i].t_country + ' ' + addrList[i].t_state + ' ' + addrList[i].t_city + ' ' + addrList[i].t_street + ' &nbsp; ');
                def = addrList[i].t_pkId;
            }
            //alert(JSON.stringify(addrList[i]));
        }
        obj.html(html);
        $('.hookbox').each(function () {
            if (parseInt($(this).attr('attr')) == def)
                $(this).click();

        })
        $.public.mask(false);
        //setup default address
    }

    addressLoad();
    $('#consignee_edit_action a').click(function () {
        if ($(this).html() == "Modify") {
            $(".s-content .form").show();
            $(".s-content .show").hide();
            $('#consignee_edit_action a').html("Save");

        } else if ($(this).html() == "Save") {
            $(".s-content .form").hide();
            $(".s-content .show").show();
            $('#consignee_edit_action a').html("Modify");
        }
    });
    //设置默认地址
    $('.item .default_btn').live("click", function () {
        $.User.AddressDefault($(this).parent('span').parent().prev().attr('attr'));
        addressLoad();
    });
    $('.item .edit_btn').live("click", function () {

    });
    //删除按钮
    $('.item .del_btn').live("click", function () {
        //alert($(this).parent('span').parent().prev().attr('attr'));
        $.User.AddressDel($(this).parent('span').parent().prev().attr('attr'));
        addressLoad();
    });
    function newAddressTest() {
        if ($.test.empty($('#consignee_name'), function (obj, ret, msg) {
                if (ret == false) {
                    alert('Name need to be filled');
                    obj.focus();
                }
            }) == false) {
            return false;
        }
        ;

        if ($.test.empty($('#State'), function (obj, ret, msg) {
                if (ret == false) {
                    alert('State need to be filled');
                    obj.focus();
                }
            }) == false) {
            return false;
        }
        ;

        if ($.test.empty($('#City'), function (obj, ret, msg) {
                if (ret == false) {
                    alert('City need to be filled');
                    obj.focus();
                }
            }) == false) {
            return false;
        }
        ;

        if ($.test.empty($('#Street'), function (obj, ret, msg) {
                if (ret == false) {
                    alert('Street need to be filled');
                    obj.focus();
                }
            }) == false) {
            return false;
        }
        ;
        if ($.test.empty($('#mobile'), function (obj, ret, msg) {
                if (ret == false) {
                    alert('mobile need to be filled');
                    obj.focus();
                }
            }) == false) {
            return false;
        }
        ;
        if ($('#country-select option:selected').html() == 'NotSet') {
            alert('select a country');
            return false;
        }
        return true;
    }

    $('#saveConsigneeTitleDiv').click(function () {
        if ($('#use-new-address').hasClass('item-selected')) {
            if (newAddressTest() == false) return;
            var name = $('#consignee_name').val();
            var conutry = $('#country-select option:selected').html();
            var state = $('#State').val();
            var city = $('#City').val();
            var street = $('#Street').val();
            var mobile = $('#mobile').val();
            $.User.AddressAdd(name, conutry, state, city, street, mobile);
            addressLoad();
        }
        else {
            $(".s-content .form").hide();
            $(".s-content .show").show();
            $('#consignee_edit_action a').html("Modify");
        }
    });

    //读取购物车内容
    var totalGross = 0;
    var count = 0;
    var delivery = 10;

    function cartReload() {
        $.User.GetCart(function (json) {

            var itemcount = json.length - 1;
            var total = json[itemcount].totalPrice;
            //alert(JSON.stringify(json));
            var obj = $('.cart-detail .banner');
            count = itemcount;
            for (var i in json) {
                if (json[i].totalPrice) {
                    totalGross = json[i].totalPrice;
                }
                if (json[i].t_selected == "1") {

                    if (i == itemcount)
                        break;
                    var mediaId = json[i].fk_mediaId;
                    var id = json[i].t_pkId;
                    var pdid = json[i].fk_product;

                    $('.goods-list h4').after('' +
                        '<div class="goods-item goods-item-extra" attid="' + pdid + '">' +
                            '<div class="p-img" media="' + mediaId + '">' +
                                '<a target="_blank" href="/product/' + id + '.html"><img src=""	alt=""></a>' +
                            '</div>' +
                            '<div class="goods-msg">' +
                                '<div class="p-name">' +
                                    '<a href="/product/' + id + '.html" target="_blank">' +json[i].t_descr + '</a>' +
                                '</div>' +
                                '<div class="p-price">' +
                                    '<strong>' + json[i].t_price + '</strong> <span class="ml20"> x' + json[i].t_total + ' </span> <span class="ml20 p-inventory" skuid="679773">In Stock</span>' +
                                '</div>' +
                            '</div>' +
                            '<div class="clr"></div>' +
                        '</div>'
                    );

                    $.Media.Load(mediaId, function (json1) {
                        //alert(JSON.stringify(json));
                        $('.goods-item .p-img').each(function () {
                            if (parseInt($(this).attr('media')) == parseInt(json1[0].fk_mediaId)) {
                                $(this).find('a').find('img').attr('src', '/' + json1[0].t_url);
                            }
                        });
                    });
                }
            }
            //alert(parseInt(total)+parseInt(delivery));
            payRefresh();
            /* $('.statistic #warePriceId').html('$'+total);
             $('#payPriceId, #sumPayPriceId').html('$'+total); */
            $('.statistic .ftx-01').html(count);
        });
    }

    function payRefresh() {
        //alert(parseInt(totalGross)+parseInt(delivery));
        $('#freightPriceId').html('$' + delivery);
        $('.statistic #warePriceId').html('$' + (parseInt(totalGross)));
        $('#payPriceId, #sumPayPriceId').html('$' + (parseInt(totalGross) + parseInt(delivery)));
    }

    cartReload();

    //运费
    $('#free').click(function () {
        delivery = 0;
        payRefresh();
        $('.timecost').html('TimeCost： 60 days');
    });

    $('#ems').click(function () {
        delivery = 5;
        payRefresh();
        $('.timecost').html('TimeCost： 30 days');
    });
    $('#tnt').click(function () {
        delivery = 10;
        payRefresh();
        $('.timecost').html('TimeCost： 7 days');
    });
    //alert(parseInt(totalGross)+parseInt(delivery));

});
</script>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Admin Page</title>
<?php include_once './common/head.php'; ?>
<?php 
$cate = new Category();
$categorys = $cate->SelectAllCategory();

$subid = isset($_GET['subid'])? $_GET['subid']:1;
$prod = new Product();
$products = $prod->SelectAllProduct();
?>
<!-- <link href="./css/ajaxfileupload.css" type="text/css" rel="stylesheet"> -->
<script type="text/javascript" src="./js/ajaxfileupload.js"></script>

<script type="text/javascript">
$(function(){
	$.public.initMenu('#product', '#newproduct');

	$('.uploaddelbtn').live("click",function(){
		var path = $(this).parent("div").find('img').attr('src');
		///alert(path);
		$(this).parent("div").remove();
		
		var data = 'path='+path+'&act=filedel';

	    $.ajax({
	        url : 'action/submenu.php',
	        type : 'post',
	        data : data,//form.serialize(),
	        cache : false,
	        dataType : "json",
	        error : function(XMLHttpRequest, textStatus, errorThrown) 
	        {
	            alert("服务器无响应! status: " + textStatus);
	        },
	        success : function(json, textStatus) 
	        {
	
	            switch(json['status']){
	                case 0:
	                	alert(json['msg']);            	
	                    break;
	                default:
	                    alert(json['msg']);
	                    break;
	            }
	        }
	    });
	});
	$('.uploadbtn').live("click", function(){
		$.public.mask(true);
		$.ajaxFileUpload({
			url:'uploadAction.php',
			secureuri:false,
			fileElementId:'fileToUpload',
			dataType: 'json',
			data:{name:'logan', id:'fileToUpload'},
			success: function (data, status)
			{
				if(typeof(data.error) != 'undefined')
				{
					if(data.error != '')
					{
						alert(data.error);
					}else
					{
						var container = $('.pic-control');
						var html = '<div class="picture">' +
							'<img src="'+data.url+'" height="32px" width="32px">'+'<a class="uploaddelbtn" >删除</a>'
							'</div> ';
						container.append(html);			
						$('#fileToUpload').val("");
					}
				}
			},
			error: function (data, status, e)
			{
				alert(e+".."+status);
			}
		});
		$.public.mask(false);
		return false;
	});
	
	
	$("#cateselect").change(function()
	{
		var cateid = $(this).val();
		var data = 'cateId=' + cateid +' &act=getbycateid';
		$.ajax({
            url : 'action/product.php',
            type : 'post',
            data : data,//form.serialize(),
            cache : false,
            dataType : "json",
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("服务器无响应! status: " + textStatus);
             },
            success : function(json, textStatus) {
                var html = "<option value=\"0\" selected>未选中</option>";            	
                var isEmpty = true;
            	for (var i in json)
            	{
                	isEmpty = false;
                	html += "<option value="+json[i]['t_pkId']+">"+json[i]['t_menuName']+"</option>"            		
                }
                if(isEmpty)
                	html = "<option value=\"0\">空分类</option>";
                	
                $('#subselect').html(html);

            }
        });
	});

	

	$("#show_cateselect").change(function()
	{
		var cateid = $(this).val();
		var data = 'cateId=' + cateid +' &act=getbycateid';
		$.ajax({
            url : 'action/product.php',
            type : 'post',
            data : data,//form.serialize(),
            cache : false,
            dataType : "json",
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("服务器无响应! status: " + textStatus);
             },
            success : function(json, textStatus) {
                var html = "<option value=\"0\" selected>未选中</option>";            	
                var isEmpty = true;
            	for (var i in json)
            	{
                	isEmpty = false;
                	html += "<option value="+json[i]['t_pkId']+">"+json[i]['t_menuName']+"</option>"            		
                }
                if(isEmpty)
                	html = "<option value=\"0\">空分类</option>";
                	
                $('#show_subselect').html(html);

            }
        });
	});

	$("#show_subselect").change(function()
	{
		var menuid = $(this).val();
		var data = 'menuid=' + menuid +' &act=getbymenuid';
		$.ajax({
	        url : 'action/product.php',
	        type : 'post',
	        data : data,//form.serialize(),
	        cache : false,
	        dataType : "json",
	        error : function(XMLHttpRequest, textStatus, errorThrown) {
	            alert("服务器无响应! status: " + textStatus);
	         },
	        success : function(json, textStatus) {    
		        var html = "";    	
	            var isEmpty = true;
	        	for (var i in json)
	        	{
	            	isEmpty = false;
	            	html += "<tr msgid=\""+json[i]['t_pkId']+"\">";
	            	html += "<td>"+json[i]['t_pkId']+"</td>";
	            	html += "<td>"+json[i]['t_title'].substr(0,20)+"</td>";
	            	html += "<td>"+json[i]['t_descr'].substr(0,20)+"</td>";
	            	html += "<td>"+json[i]['t_discount']+"</td>";
	            	html += "<td>"+json[i]['t_createDate']+"</td>";
	            	html += "<td class=\"action-td\">";
	            	html += "<a href=\"javascript:;\" class=\"btn btn-small btn-warning showbtn\">"+
						"<i class=\"icon-zoom-in\"></i></a>"+
						"<a href=\"javascript:;\" class=\"btn btn-small btn-warning editbtn\"><i class=\"icon-edit\"></i>"+								
						"</a><a href=\"javascript:;\" class=\"btn btn-small delbtn\"><i class=\"icon-remove\"></i>"+		
						"</a></td></tr>";
	        	}	            
	            if(isEmpty)
	            	html = "<tr><td colspan=6>空</td></tr>"

				$('#pd_table').html(html);
	        }
	    });
	});
	$('#modcancel').click(function(){
		$('.showMiddle').hide();
		$.public.mask(false);
	});
	var e_checkVal = function()
	{
		if(!$.test.empty($('#e_name'), $.public.err_show))
			return false;
		if(!$.test.empty($('#e_descr'), $.public.err_show))
			return false;
		if(!$.test.digital($('#e_discount'), $.public.err_show))
			return false;
		if(!$.test.empty($('#e_seo_title'), $.public.err_show))
			return false;
		if(!$.test.empty($('#e_seo_descr'), $.public.err_show))
			return false;
		if(!$.test.empty($('#e_seo_keyword'), $.public.err_show))
			return false;

		return true;
	};
	$('#mod').click(function(){
		var check = 0;
		if(!e_checkVal())
			return;
		
		if($('#e_isShow').attr('checked'))
			check = 1;

		var data = 'pkid='+$('#e_pkid').val()+'& name=' + $('#e_name').val() + '&descr=' + $('#e_descr').val() + '&seo_title='+$('#e_seo_title').val()
			+ '&seo_descr='+$('#e_seo_descr').val() + '&seo_keyword='+$('#e_seo_keyword').val()
			+ '&isShow='+check + '&act=update&discount='+$('#e_discount').val();

        $.ajax({
            url : 'action/product.php',
            type : 'post',
            data : data,//form.serialize(),
            cache : false,
            dataType : "json",
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("服务器无响应! status: " + textStatus);
             },
            success : function(json, textStatus) {

                switch(json['status']){
                    case 0:
                    	alert(json['msg']);
                    	window.location.href = './newproduct.php';
                        break;
                    default:
	                    alert(json['msg']);
                        break;
                }
            }
        });
		return false;
	});
	
	$('.editbtn').live("click", function(){
		$.public.mask(true);
		var id = $(this).parent('td').parent('tr').attr('msgId');
		var data = 'pkid=' + id +' &act=show';
		$.ajax({
            url : 'action/product.php',
            type : 'post',
            data : data,//form.serialize(),
            cache : false,
            dataType : "json",
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("服务器无响应! status: " + textStatus);
             },
            success : function(json, textStatus) {

                    	$('#e_pkid').val(json['t_pkId']);
                    	$('#e_name').val(json['t_title']);  
                    	$('#e_descr').val(json['t_descr']); 
                    	$('#e_discount').val(json['t_discount']); 
                    	$('#e_seo_title').val(json['t_seoTitle']);
                    	$('#e_seo_descr').val(json['t_seoDescr']);
                    	$('#e_seo_keyword').val(json['t_seoKeyword']);    
                    	if(json['t_isShow'] == 1)
                    		$('#e_isShow').attr('checked','true');
                    	else
                    		$('#e_isShow').removeAttr('checked');

            }
        });
		$('#mod').show();
		$('.showMiddle').show();
		
	});
	$('.showbtn').live("click",function(){
		$.public.mask(true);
		var id = $(this).parent('td').parent('tr').attr('msgId');
		var data = 'pkid=' + id +' &act=show';
		$.ajax({
            url : 'action/product.php',
            type : 'post',
            data : data,//form.serialize(),
            cache : false,
            dataType : "json",
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("服务器无响应! status: " + textStatus);
             },
            success : function(json, textStatus) {

                    	$('#e_pkid').val(json['t_pkId']);
                    	$('#e_name').val(json['t_title']);  
                    	$('#e_descr').val(json['t_descr']); 
                    	$('#e_discount').val(json['t_discount']); 
                    	$('#e_seo_title').val(json['t_seoTitle']);
                    	$('#e_seo_descr').val(json['t_seoDescr']);
                    	$('#e_seo_keyword').val(json['t_seoKeyword']);    
                    	if(json['t_isShow'] == 1)
                    		$('#e_isShow').attr('checked','true');
                    	else
                    		$('#e_isShow').removeAttr('checked');

            }
        });
        
		$('#mod').hide();
		$('.showMiddle').show();
	});
	
	$('.delbtn').live("click",function(){
		
		var id = $(this).parent('td').parent('tr').attr('msgId');

		var data = 'pkid=' + id +' &act=del';
		
		$.ajax({
            url : 'action/product.php',
            type : 'post',
            data : data,//form.serialize(),
            cache : false,
            dataType : "json",
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("服务器无响应! status: " + textStatus);
             },
            success : function(json, textStatus) {

                switch(json['status']){
                    case 0:
                    	alert(json['msg']);
                    	window.location.href = './newproduct.php';
                        break;
                    default:
	                    alert(json['msg']);
                        break;
                }
            }
        });
	});
	
	var checkVal = function()
	{
		if(!$.test.notZero($('#cateselect'), $.public.err_show))
			return false;
		if(!$.test.notZero($('#subselect'), $.public.err_show))
			return false;
		if(!$.test.empty($('#name'), $.public.err_show))
			return false;
		if(!$.test.empty($('#descr'), $.public.err_show))
			return false;
		if(!$.test.digital($('#price'), $.public.err_show))
			return false;
		if(!$.test.digital($('#discount'), $.public.err_show))
			return false;
		if(!$.test.empty($('#seo_title'), $.public.err_show))
			return false;
		if(!$.test.empty($('#seo_descr'), $.public.err_show))
			return false;
		if(!$.test.empty($('#seo_keyword'), $.public.err_show))
			return false;

		
		return true;
	};
	
	$('#add').click(function(){	
		var check = 0;
		var images = "";
		if(!checkVal())
			return;
		$('.picture').each(function(){
			images+=$(this).find('img').attr('src')+"|";
			//alert($(this).find('img').attr('src'));
		});
		
		if($('#isShow').attr('checked'))
			check = 1;

		var data = 'images='+images+'&name=' + $('#name').val() + '&descr=' + $('#descr').val() + '&seo_title='+$('#seo_title').val()
			+ '&seo_descr='+$('#seo_descr').val() + '&seo_keyword='+$('#seo_keyword').val()
			+ '&isShow='+check + '&act='+$('#act').val() + '&discount='+$('#discount').val() + '&price='+$('#price').val()
			+ '&cateselect=' + $('#cateselect').val() + '&subselect=' + $('#subselect').val()  ;
		
        $.ajax({
            url : 'action/product.php',
            type : 'post',
            data : data,//form.serialize(),
            cache : false,
            dataType : "json",
            error : function(XMLHttpRequest, textStatus, errorThrown) {
                alert("服务器无响应! status: " + textStatus);
             },
            success : function(json, textStatus) {

                switch(json['status']){
                    case 0:
                    	alert(json['msg']);
                    	window.location.href = './newproduct.php?$ubid=2';
                        break;
                    default:
	                    alert(json['msg']);
                        break;
                }
            }
        });
		return false;
	});
});
</script>
</head>
<body>
<?php include_once './common/nav.php'; ?>
<div id="content">
	
	<div class="container">
	<div class="row">
		<div class="span3">
		<?php include_once './common/menu.php'; ?>
		</div>
		
		<div class="span9">
			<h1 class="page-title">
				<i class="icon-home"></i>
				产品管理				
			</h1>		
						
			<div class="row">
					
					<div class="span9">
				
						<div class="widget">
							
							<div class="widget-header">
							<i class="icon-th-list"></i>
								<h3>产品</h3>
							</div> <!-- /widget-header -->
									
								<div class="widget-content">																
									
								<div class="tabbable">	
								<ul class="nav nav-tabs">
								  <li
								  <?php if ($subid == 1) {?> 
								  class="active"
								  <?php } ?>
								  >
								    <a href="#1" data-toggle="tab">显示</a>
								  </li>
								  <li
								  <?php if ($subid == 2) {?> 
								  class="active"
								  <?php } ?>
								  ><a href="#2" data-toggle="tab">添加</a></li>
								</ul>					
									<br />				
										<div class="tab-content">
										<div class="tab-pane <?php if ($subid == 1) {?> active <?php }?>" id="1">
											<div class="widget-content">			
											分类    <select id="show_cateselect">
												<option value="0" selected>未选中</option>
												<?php
													foreach ($categorys as $cate){
														$out =  "<option value=\"".$cate->t_pkId."\">".$cate->t_cateName."</option>";
														echo $out;
													} 
												?>
											</select> 子目录  
											<select id="show_subselect">
												<option value="0" selected>未选中</option>
											</select>			
											<table class="table table-striped table-bordered">
												<thead>
													<tr>
														<th>#</th>
														<th>产品名称</th>
														<th>产品描述</th>
														<th>折扣</th>
														<th>创建时间</th>
														<th>操作</th>
													</tr>
												</thead>
												
												<tbody id="pd_table">
													<?php if(!empty($products)) { ?>
													<?php foreach($products as $product ){ ?>
													<tr msgid="<?php echo $product->t_pkId ?>">
														<td><?php echo $product->t_pkId ?></td>
														<td><?php echo substr($product->t_title,0,20) ?></td>
														<td><?php echo substr($product->t_descr,0,20) ?></td>
														<td><?php echo $product->t_discount ?></td>
														<td><?php echo $product->t_createDate ?></td>
														<td class="action-td">
														<a href="javascript:;" class="btn btn-small btn-warning showbtn">
																<i class="icon-zoom-in"></i>								
															</a>
															<a href="javascript:;" class="btn btn-small btn-warning editbtn">
																<i class="icon-edit"></i>								
															</a>					
															<a href="javascript:;" class="btn btn-small delbtn">
																<i class="icon-remove"></i>						
															</a>
														</td>
													</tr>
													<?php } } ?>
												</tbody>
											</table>
										
										</div> <!-- /widget-content -->
										</div>	
										<div class="tab-pane <?php if ($subid == 2) {?> active <?php }?>" id="2">
										<form id="edit-profile" class="form-horizontal" />
											<input type="hidden" id="act" value="add">
											<fieldset>		
												<div class="control-group">		
													<label class="control-label" for="firstname">选择分类ID:</label>								
													<div class="controls">
														<select id="cateselect">
															<option value="0" selected>未选中</option>
															<?php
																foreach ($categorys as $cate){
																	$out =  "<option value=\"".$cate->t_pkId."\">".$cate->t_cateName."</option>";
																	echo $out;
																} 
															?>
														</select>	
														<p class="fail_info" ></p>		
													</div>		
												</div> <!-- /control-group -->
												<div class="control-group">		
														<label class="control-label" for="firstname">子目录选择:</label>								
														<div class="controls">
															<select id="subselect">
																<option selected  value="0">未选中</option>
															</select>	
															<p class="fail_info" ></p>		
														</div>		
													</div> <!-- /control-group -->
																																						
												<div class="control-group">											
													<label class="control-label" for="firstname">产品名称</label>
													<div class="controls">
														<input type="text" class="input-medium" id="name" value="" />
														<p class="fail_info" mess="请输入名称"></p>
													</div> <!-- /controls -->				
												</div> <!-- /control-group -->
												
												<div class="control-group upload">											
												<label class="control-label" for="firstname">图片上传</label>
												<div class="controls">
													<input id="fileToUpload" type="file" size="45" name="fileToUpload" class="input"> <a class='uploadbtn' >上传</a>
													<p class="fail_info" mess="请输入名称"></p>
												</div> <!-- /controls -->	
												<div class="controls pic-control">
												</div>		
											</div> <!-- /control-group -->
											
												<div class="control-group">											
													<label class="control-label" for="lastname">产品描述</label>
													<div class="controls">
														<textarea type="text" class="input-medium span5" id="descr" value="" rows="10" cols="40"></textarea>
														<p class="fail_info" mess="请输入描述"></p>
													</div> <!-- /controls -->				
												</div> <!-- /control-group -->
												<div class="control-group">											
													<label class="control-label" for="firstname">价格</label>
													<div class="controls">
														<input type="text" class="input-medium" id="price" value="" />
														<p class="fail_info" mess="请输入打折"></p>		
													</div> <!-- /controls -->
															
												</div> <!-- /control-group -->
												<div class="control-group">											
													<label class="control-label" for="firstname">打折</label>
													<div class="controls">
														<input type="text" class="input-medium" id="discount" value="" />
														<p class="fail_info" mess="请输入打折"></p>		
													</div> <!-- /controls -->
															
												</div> <!-- /control-group -->
												<div class="control-group">											
													<label class="control-label" for="firstname">SEO标题</label>
													<div class="controls">
														<input type="text" class="input-medium" id="seo_title" value="" />
														<p class="fail_info"></p>
													</div> <!-- /controls -->				
												</div> <!-- /control-group -->
												
												
												<div class="control-group">											
													<label class="control-label" for="lastname">SEO描述</label>
													<div class="controls">
														<input type="text" class="input-medium span3" id="seo_descr" value=""></textarea>
														<p class="fail_info"></p>
													</div> <!-- /controls -->				
												</div> <!-- /control-group -->
												
												<div class="control-group">											
													<label class="control-label" for="lastname">SEO关键字</label>
													<div class="controls">
														<input type="text" class="input-medium span3" id="seo_keyword" value="" ></textarea>
														<p class="fail_info"></p>
													</div> <!-- /controls -->				
												</div> <!-- /control-group -->
												<div class="control-group">
													<label class="control-label" for="accountadvanced">是否启用</label>
													<div class="controls">
														<label class="checkbox">
															<input id="isShow" type="checkbox">
															
														</label>
													</div>
												</div>																																															
													
												<br />
												
												<div class="form-actions">
													<button type="button" id="add" class="btn btn-primary">添加</button> 
												</div> <!-- /form-actions -->
											</fieldset>
										</form>
									</div>
									
								</div> <!-- /widget-content -->		
								</div>
							</div>
						</div> <!-- /widget -->
						
					</div> <!-- /span9 -->
					
				</div> <!-- /row -->			
			</div> <!-- /widget -->
		</div>
	</div>
</div>

<?php include_once './common/foot.php'; ?>
<div class="showMiddle">
	<div class="showInfo">
		<form id="edit-profile" class="form-horizontal" >
			<input type="hidden" id="e_pkid" value="">
			<fieldset>																													
				<div class="control-group">											
					<label class="control-label" for="firstname">子目录名称</label>
					<div class="controls">
						<input type="text" class="input-medium" id="e_name" value="" disabled />
						<p class="fail_info" mess="请输入名称"></p>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->				
				
				<div class="control-group">											
					<label class="control-label" for="lastname">子目录描述</label>
					<div class="controls">
						<textarea type="text" class="input-medium span5" id="e_descr" value="" rows="10" cols="40"></textarea>
						<p class="fail_info" mess="请输入描述"></p>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
				<div class="control-group">											
					<label class="control-label" for="firstname">打折</label>
					<div class="controls">
						<input type="text" class="input-medium" id="e_discount" value="" />
						<p class="fail_info" mess="请输入打折"></p>		
					</div> <!-- /controls -->
							
				</div> <!-- /control-group -->
				<div class="control-group">											
					<label class="control-label" for="firstname">SEO标题</label>
					<div class="controls">
						<input type="text" class="input-medium" id="e_seo_title" value="" />
						<p class="fail_info"></p>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
				
				
				<div class="control-group">											
					<label class="control-label" for="lastname">SEO描述</label>
					<div class="controls">
						<input type="text" class="input-medium span3" id="e_seo_descr" value=""></textarea>
						<p class="fail_info"></p>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
				
				<div class="control-group">											
					<label class="control-label" for="lastname">SEO关键字</label>
					<div class="controls">
						<input type="text" class="input-medium span3" id="e_seo_keyword" value="" ></textarea>
						<p class="fail_info"></p>
					</div> <!-- /controls -->				
				</div> <!-- /control-group -->
				<div class="control-group">
					<label class="control-label" for="accountadvanced">是否启用</label>
					<div class="controls">
						<label class="checkbox">
							<input id="e_isShow" type="checkbox">
							
						</label>
					</div>
				</div>																																															
				<div class="form-actions">
					<button type="button" id="mod" class="btn btn-primary modbtn">修改</button>
					<button type="button" id="modcancel" class="btn btn-primary cancelbtn">取消</button> 
				</div> <!-- /form-actions -->
			</fieldset>
		</form>
	</div>
</div>	
</div>

</body>
</html>
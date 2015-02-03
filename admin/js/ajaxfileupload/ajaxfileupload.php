<html>
	<head>
		<title>Ajax File Uploader Plugin For Jquery</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />    
	<meta http-equiv="Content-Type" content=" charset=UTF-8">
	<link href="../../css/bootstrap.min.css" rel="stylesheet" />
	<link href="../../css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="../../css/font-awesome.css" rel="stylesheet" />
	<link href="../../css/adminia.css" rel="stylesheet" /> 
	<link href="../../css/adminia-responsive.css" rel="stylesheet" /> 
	<link href="../../css/pages/dashboard.css" rel="stylesheet" />
	<link href="../../css/menu.css" rel="stylesheet" />
	<link href="../../css/global.css" rel="stylesheet" />    
	
	<script type="text/javascript" src="../../assets/js/jquery-1.8.1.min.js"></script>
	<script type="text/javascript" src="../../js/ui.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.js"></script>
		
<link href="ajaxfileupload.css" type="text/css" rel="stylesheet">
<!-- 	<script type="text/javascript" src="jquery.js"></script> -->
	<script type="text/javascript" src="ajaxfileupload.js"></script>
	<script type="text/javascript">
	$(function(){
		$("#test").click(function(){
			$('input:file').each(function(){
				alert($(this).val());
			});
		});
		$("input:file").change(function(){
			alert($(this).val());
		});
		$("#buttonUpload").click(function(){

			$.ajaxFileUpload
			(
				{
					url:'doajaxfileupload.php',
					secureuri:false,
					fileElementId:'fileToUpload',
					dataType: 'json',
					data:{name:'logan', id:'fileToUpload'},
					success: function (data, status)
					{
						alert(data['msg']);
						if(typeof(data.error) != 'undefined')
						{
							if(data.error != '')
							{
								alert(data.error);
							}else
							{
								alert(data.msg);
							}
						}
					},
					error: function (data, status, e)
					{
						alert(e);
					}
				}
			)
			
			return false;

		
		});


			
	});
	
	</script>	
	</head>

	<body>
<div id="wrapper">
    <div id="content">
    	<h1>Ajax File Upload Demo</h1>
    	<p>Jquery File Upload Plugin  - upload your files with only one input field</p>
				<p>
				need any Web-based Information System?<br> Please <a href="http://www.phpletter.com/">Contact Us</a><br>
				We are specialized in <br>
				<ul>
					<li>Website Design</li>
					<li>Survey System Creation</li>
					<li>E-commerce Site Development</li>
				</ul>    	
		<img id="loading" src="loading.gif" style="display:none;">
		<form name="form" action="" method="POST" enctype="multipart/form-data">
		<table cellpadding="0" cellspacing="0" class="tableForm">

		<thead>
			<tr>
				<th>Please select a file and click Upload button</th>
			</tr>
		</thead>
		<tbody>	
			<tr>
				<td><input id="fileToUpload" type="file" size="45" name="fileToUpload" class="input"></td>
			</tr>

		</tbody>
			<tfoot>
				<tr>
					<td><button class="button" id="buttonUpload">Upload</button><input type="button" id="test" value="test"></button></td>
				</tr>
			</tfoot>
	
	</table>
		</form>    	
    </div>
    

	</body>
</html>
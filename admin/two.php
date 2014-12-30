<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Admin Page</title>
<?php include_once './common/head.php'; ?>
<script type="text/javascript">
$(function(){
	$.public.initMenu('#main', '#two');
});
</script>
 <script type="text/javascript" src="./assets/js/bui-min.js"></script>

 <script type="text/javascript">


BUI.use('bui/chart', function(Chart) {
	var chart = new Chart.Chart({
		render : '#canvas',
		height : 500,
		plotCfg : {
			margin : [ 50, 50, 80 ]
		//画板的边距
		},
		title : {
			text : '一年的平均温度'

		},
		subTitle : {
			text : 'Source: WorldClimate.com'
		},
		xAxis : {
			categories : [ '一月', '二月', '三月', '四月', '五月', '六月',
					'七月', '八月', '九月', '十月', '十一月', '十二月', '13' ]
		},
		yAxis : {
			title : {
				text : '温度',
				rotate : -90
			}
		},
		tooltip : {
			valueSuffix : '°C',
			shared : true, //是否多个数据序列共同显示信息
			crosshairs : true
		//是否出现基准线
		},
		series : [
				{
					name : 'Tokyo',
					data : [ 7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2,
							26.5, 23.3, 18.3, 13.9, 9.6,1 ]
				},
				{
					name : 'New York',
					data : [ -0.2, 0.8, 5.7, 11.3, 17.0, 22.0,
							24.8, 24.1, 20.1, 14.1, 8.6, 2.5 ]
				},
				{
					name : 'Berlin',
					data : [ -0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6,
									17.9, 14.3, 9.0, 3.9, 1.0 ]
						},
						{
							name : 'London',
							data : [ 3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0,
									16.6, 14.2, 10.3, 6.6, 4.8 ]
						} ]
			});

			chart.render();
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
				总计					
			</h1>
			
			<div class="stat-container">
										
					<div class="stat-holder">						
						<div class="stat">							
							<span>564</span>							
							Completed Sales							
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
					<div class="stat-holder">						
						<div class="stat">							
							<span>423</span>							
							Pending Sales							
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
					<div class="stat-holder">						
						<div class="stat">							
							<span>96</span>							
							Returned Sales							
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
					<div class="stat-holder">						
						<div class="stat">							
							<span>2</span>							
							Chargebacks							
						</div> <!-- /stat -->						
					</div> <!-- /stat-holder -->
					
				</div> <!-- /stat-container -->
				
				<div class="widget">
										
					<div class="widget-header">
						<i class="icon-signal"></i>
						<h3>统计</h3>
					</div> <!-- /widget-header -->
														
					<div class="widget-content">
	
							<div id="canvas">
							</div>
							<!-- /bar-chart -->				
					</div> <!-- /widget-content -->
					
				  
			</div> <!-- /widget -->
		</div>
	</div>
	</div>
<?php include_once './common/foot.php'; ?>
</div>
</body>
</html>
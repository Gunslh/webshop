
				
				<div class="account-container">
				
					<div class="account-avatar">
						<img src="./img/headshot.png" alt="" class="thumbnail" />
					</div> <!-- /account-avatar -->
				
					<div class="account-details">
					
						<span class="account-name"><?php echo $userSessionObj->t_name; ?></span>
						
						<span class="account-role">Administrator</span>
						
						<span class="account-actions">
							<a href="javascript:;">Profile</a> |
							
							<a href="javascript:;">Edit Settings</a>
						</span>
					
					</div> <!-- /account-details -->
				
				</div> <!-- /account-container -->
				
				<hr />
				
				<ul id="main-nav" class="nav nav-tabs nav-stacked">
					
					<li id="main">
						<div class="title">
						 
							<i class="icon-home"></i>
							主面板
						</div>
						<div class="sub-nav hide">
							<ul>
								<li id="one">
									<i class="icon-plus"></i>
									<a href="./">
										one 		
									</a>
								</li>
								<li id="two">
									<i class="icon-plus"></i>
									<a href="./two.php">
										two 		
									</a>
								</li>
							</ul>						
						</div>
						
					</li>
					<li id="product">
						<div class="title">
						 
							<i class="icon-th-large"></i>
							产品管理
						</div>
						<div class="sub-nav hide">
							<ul>
								<li id="show">
									<i class="icon-plus"></i>
									<a href="./product_show.php">
										查看信息 		
									</a>
								</li>
								<li id="newcategory">
									<i class="icon-plus"></i>
									<a href="./newcategory.php">
										分类管理		
									</a>
								</li>
								<li id="newsubmenu">
									<i class="icon-plus"></i>
									<a href="./newsubmenu.php">
										子目录管理		
									</a>
								</li>
								<li id="newproduct">
									<i class="icon-plus"></i>
									<a href="./newproduct.php">
										产品管理		
									</a>
								</li>
							</ul>						
						</div>
					</li>
					
					<li>
						<a href="javascript:void(0);">
							<i class="icon-user"></i>
							会员管理							
						</a>
					</li>

				</ul>	
				
				<hr />
				
				<div class="sidebar-extra">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
				</div> <!-- .sidebar-extra -->
				
				<br />
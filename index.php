<?php
	require_once './models/classes/Configurations.php'; 									// Include the project configuration file
	require_once './controllers/formProcess.php'; 											// Include the form processing file

	if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }		// Check if the admi is logged in
	$pageName = "Dashboard"; 																// Set the page name
	require_once './controllers/documentHeader.php'; 										// Include the document header
?>
	<!-- Begin page body -->
	<body class="fixed-top">
		
		<!-- Begin page header -->
		<?php
			require_once './views/pageHeader.php'; // Include the page header
		?>
		<!-- End page header -->
		
		<!-- Begin contents wrapper -->
		<div id="container" class="row-fluid sidebar-closed">
			
			<!-- Begin page left navigation -->
			<?php
				require_once './views/pageLeftNav.php'; // Include the page left navigation
			?>
			<!-- End page left navigation -->
			
			<!-- Begin page main contents -->
			<div id="main-content">
				<div class="container-fluid">
					<div style="margin-bottom: 50px;"></div>

					<!-- Begin inner contents -->
					<div id="page" class="dashboard">

						<!-- Begin welcome message -->
						<div class="alert alert-info">
							<button data-dismiss="alert" class="close">×</button> 
							Welcome to <strong>theteller Admin Lab</strong>. Please don't forget to log out when you are done! 
						</div>
						<!-- End welcome message -->
						
						<div class="widget">
							
							<!-- Begin content title -->
							<div class="widget-title">
								<h4><i class="icon-user"></i>Profile</h4>
								<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
								</span>
							</div>
							<!-- End content title -->
							
							<!-- Begin content body -->
							<div class="widget-body">
								<?php
									$Database = new Database();
									$Database -> where ( "adminID", $_SESSION['adminSession'] );
									$admin = $Database -> getOne ( "tlr_admins" );
									?>
										<div class="span3">
											<div class="text-center profile-pic">
												<img src="./models/img/profile-pic.jpg" alt="">
											</div>
											
											<ul class="nav nav-tabs nav-stacked">
												<li><a href="javascript:void(0)"><i class="icon-coffee"></i> Portfolio</a></li>
												<li><a href="javascript:void(0)"><i class="icon-paper-clip"></i> Projects</a></li>
												<li><a href="javascript:void(0)"><i class="icon-picture"></i> Gallery</a></li>
											</ul>
											
											<ul class="nav nav-tabs nav-stacked">
												<li><a href="javascript:void(0)"><i class="icon-facebook"></i> Facebook</a></li>
												<li><a href="javascript:void(0)"><i class="icon-twitter"></i> Twitter</a></li>
												<li><a href="javascript:void(0)"><i class="icon-linkedin"></i> LinkedIn</a></li>
											</ul>
										</div>
									
										<div class="span9">
											<h4><?php echo $admin['adminTitle'] . " " . $admin['firstName'] . " " . $admin['lastName']; ?><br><small><?php echo $admin['adminPosition']; ?></small></h4>
											<table class="table table-borderless">
												<tbody>
													<tr><td class="span2">First Name :</td><td> <?php echo $admin['firstName']; ?> </td></tr>
													<tr><td class="span2">Last Name :</td><td> <?php echo $admin['lastName']; ?> </td></tr>
													<tr><td class="span2">Region :</td><td> <?php echo $admin['adminRegion']; ?> </td></tr>
													<tr><td class="span2">Birthday :</td><td> <?php echo $admin['adminDOB']; ?> </td></tr>
													<tr><td class="span2">Position :</td><td> <?php echo $admin['adminPosition']; ?> </td></tr>
													<tr><td class="span2">Email :</td><td> <?php echo $admin['adminEmail']; ?> </td></tr>
													<tr><td class="span2">Mobile :</td><td> <?php echo $admin['adminPhone']; ?> </td></tr>
												</tbody>
											</table>
											
											<h4>Career Objectves</h4>
											<p class="push"><?php echo $admin['adminObjectives']; ?></p>
					
											<h4>Address</h4>
											<div class="well">
												<address>
													<strong><?php echo $admin['adminResAddress']; ?></strong><br>
													<abbr title="Phone">P:</abbr> <?php echo $admin['adminPhone']; ?> 
												</address>
											
												<address>
													<strong>Email</strong><br>
													<a href="mailto:#"><?php echo $admin['adminEmail']; ?></a>
												</address>
											</div>
										</div>
									
										<div class="space5"></div>
									<?php
								?>
							</div>
							<!-- End content body -->
							
						</div>
					</div>
					<!-- End inner contents -->
					
				</div>
			</div>
			<!-- Begin page main contents -->
			
		</div>
		<!-- End contents wrapper -->
			
		<!-- Begin page footer -->
		<?php
			require_once './views/pageFooter.php'; // Include the page footer
		?>
		<!-- End page footer -->
		
		<!-- Begin page scripts -->
		<?php
			require_once './controllers/pageScripts.php'; // Include the page scripts
		?>
		<!-- End page scripts -->
		
	</body>
	<!-- End page body -->
	
</html>
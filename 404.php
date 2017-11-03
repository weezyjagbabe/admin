<?php
	require_once './models/classes/Configurations.php'; 									// Include the project configuration file
	require_once './controllers/formProcess.php'; 											// Include the form processing file
	// if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }		// Check if the admin is logged in else redirect to signin page

	$pageName = "404"; 																		// Set the page name
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
						
						<!-- Begin content body -->
						<div class="span12">
							<div class="widget">
								<div class="widget-title">
									<h4><i class=" icon-ban-circle"></i>404 Error Page</h4>
									<span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span>
								</div>
								
								<div class="widget-body">
									<div class="error-page">
										<img src="./models/img/404.png" alt="404 error">
										<h1><strong>404</strong><br> Page Not Found </h1>
										<p>Sorry, the page you were looking for doesn't exist anymore.</p>
									</div>
								</div>
							</div>
						</div>
						<!-- End content body -->
							
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
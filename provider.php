<?php
	require_once './models/classes/Configurations.php'; 									// Include the project configuration file
	require_once './controllers/formProcess.php'; 											// Include the form processing file
	
	if( isset( $_GET['t'] ) ) { $t = $_GET['t']; }											// Check if there is a providerKey and grab it
	if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }		// Check if the admi is logged in
	
	$pageName = 'Provider Details'; 														// Set the page name
	require_once './controllers/documentHeader.php'; // Include the document header
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
						<div class="widget">
							
							<div class="widget-title">
								<h4><i class="icon-columns"></i><?php //echo $companyName; ?> Profile</h4>
								<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
								</span>
							</div>
							
							<div class="widget-body">
								<?php
									$cols = Array ( "providerID, companyName, companyEmail, companyPhone, companyLogo, aboutProvider, companyAddress, dateJoined, providerKey" );
									$Database -> where( 'providerKey', $t );
									$details = $Database -> get( 'tlr_services_providers' );
									if ( $Database -> count > 0 )
									{
										foreach ( $details as $detail )
										{
											$providerID				=	$detail['providerID'];
											$companyName			=	$detail['companyName'];
											$companyEmail			=	$detail['companyEmail'];
											$companyPhone			=	$detail['companyPhone'];
											$companyLogo			=	$detail['companyLogo'];
											$aboutProvider			=	$detail['aboutProvider'];
											$companyAddress			=	$detail['companyAddress'];
											$serviceIDS				=	$detail['serviceIDS'];
											$dateJoined				=	$detail['dateJoined'];
											$providerKey			=	$detail['providerKey'];
											$providerCode			=	$detail['providerCode'];
										}
									}
								?>
								
								<!-- Begin left side contents -->
								<div class="span3">
									
									<!-- Begin logo -->
									<div class="text-center profile-pic">
										<img src="https://www.theteller.net/<?php echo $companyLogo; ?>" alt="">
									</div>
									<!-- End logo -->
									
									<!-- Begin about -->
									<div style="margin-bottom: 25px">
										<h4>About <?php echo $companyName; ?></h4>
										<p><?php echo $aboutProvider; ?></p>
									</div>
									<!-- End about -->
									
									<!-- Begin social icons -->
									<div style="margin-bottom: 25px">
										<ul class="nav nav-tabs nav-stacked">
											<li><a href="./services?t=<?php echo $providerKey; ?>"><i class="icon-share"></i> View Services</a></li>
										</ul>
									</div>
									<!-- End social icons -->
									
									<!-- Begin social icons -->
									<div style="margin-bottom: 25px">
										<ul class="nav nav-tabs nav-stacked">
											<li><a href="javascript:void(0)"><i class="icon-facebook"></i> Facebook</a></li>
											<li><a href="javascript:void(0)"><i class="icon-twitter"></i> Twitter</a></li>
											<li><a href="javascript:void(0)"><i class="icon-linkedin"></i> LinkedIn</a></li>
											<li><a href="javascript:void(0)"><i class="icon-pinterest"></i> Pinterest</a></li>
										</ul>
									</div>
									<!-- End social icons -->
									
								</div>
								<!-- End left side contents -->
								
								<!-- Begin right side contents -->
								<div class="span9">
									<h4><?php echo $companyName; ?></h4>
									<table class="table table-borderless">
										<tbody>
											<tr><td class="span2" style="margin-left: 0; padding-left: 0;">Company Name :</td><td> <?php echo $companyName; ?> </td></tr>
											<tr><td class="span2" style="margin-left: 0; padding-left: 0;"> Email :</td><td> <?php echo $companyEmail; ?> </td></tr>
											<tr><td class="span2" style="margin-left: 0; padding-left: 0;"> Mobile :</td><td> <?php echo $companyPhone; ?> </td></tr>
											<tr><td class="span2" style="margin-left: 0; padding-left: 0;"> Date Joined :</td><td> <?php echo gmdate( "D M d, Y", strtotime( $dateJoined ) ); ?> </td></tr>
										</tbody>
									</table>
			
									<h4><?php echo $companyName; ?> Address and Contact Details</h4>
									<div class="well">
										<address>
											<strong><?php echo $companyAddress; ?><br>
										</address>
									
										<address>
											<strong><?php echo $companyName; ?> Email and Phone Contacts</strong><br>
											<abbr title="Phone"><a href="mailto:<?php echo $companyEmail; ?>"><?php echo $companyEmail; ?></a></abbr><br>
											<abbr title="Phone">Phone:</abbr> <?php echo $companyPhone; ?></abbr><br>
											<abbr title="Phone">Provider Code:</abbr> <?php echo $providerCode; ?></abbr><br>
										</address>
									</div>
			
									<h4>About <?php echo $companyName; ?></h4>
									<div class="well">
										<address>
											<strong><?php echo $aboutProvider; ?><br>
										</address>
									</div>
                                    <span class="label label-success"><a href="./updateprovider?t=<?php echo $t; ?>">Update Provider</a></span>

								</div>
								<!-- End right side contents -->
								
								<div class="space5"></div>
							</div>
							
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
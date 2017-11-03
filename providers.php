<?php
	require_once './models/classes/Configurations.php'; 									// Include the project configuration file
	require_once './controllers/formProcess.php'; 											// Include the form processing file

	if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }		// Check if the admi is logged in
	
	require_once './controllers/processing.php'; 											// Include the form processing file
	require_once './models/classes/ServiceProvider.php'; 									// Include the service provider class
	
	if( isset( $_GET['t'] ) ) { $t = $_GET['t']; }
	if( isset( $_GET['action'] ) ) { $action = $_GET['action']; $ServiceProvider -> updateProviderStatus( $action ); } // Get the status Value

	$pageName = "Service Providers"; 								// Set the page name
	require_once './controllers/documentHeader.php'; 				// Include the document header
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
						
						<!-- Begin service providers statistics -->
						<?php
							// Display this menu in drop list only if the user level is admin or suppueradmin
							if ( $AdminClass -> isSupperAdmin() ) 
							{
								require_once './views/pageProvidersButtons.php'; // Include the service providers top buttons
							}
						?>
						<!-- End service providers statistics -->
                        <?php if( isset($_GET['message'] ) ) { echo $_GET['message']; } ?>
						<!-- Begin users table -->
						<div class="row-fluid">
							<div class="span12">
								<div class="widget">
			
									<!-- Begin content title -->
									<div class="widget-title">
										<h4><i class="icon-reorder"></i> <?php // if ( !empty( $categoryID ) ) { echo $categoryName; } else { echo "All Service Providers"; } ?></h4>
										<span class="tools">
											<a href="javascript:;" class="icon-chevron-down"></a>
											<a href="javascript:;" class="icon-remove"></a>
										</span>
									</div>
									<!-- End content title -->
									
									<!-- Begin content body -->
									<div class="widget-body">
										<div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">

											<!-- Begin table -->
											<table aria-describedby="sample_1_info" class="table table-striped table-bordered dataTable" id="sample_1">
												
												<!-- Begin table headers -->
												<thead>
													<tr role="row">
														<th style="width: 150px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Company Name</th>
														<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Company Email</th>
														<th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Company Phone</th>
														<th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Date Joined</th>
														<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Details / Action</th>
													</tr>
												</thead>
												<!-- End table headers -->
												
												<!-- Begin table body -->
												<tbody aria-relevant="all" aria-live="polite" role="alert">
													<?php
														// Check if the categoryID is not empty and grab the details from the details base
														if ( !empty( $t ) ) 
														{
															$cols = Array ( "providerKey, companyName, companyEmail, companyPhone, companyLogo, dateJoined, companyStatus" );
															$Database -> where( 'categoryKey', $t );
															$providers = $Database -> get( "tlr_services_with_providers_view" );
															foreach ( $providers as $provider )
															{
																?>
																    <tr class="gradeX <?php if( ( $provider['providerID'] % 3 ) == 0 ) { echo "odd"; } else { echo "even"; } ?>">
																		<td><?php echo $provider['companyName']; ?></td>
																		<td><a href="mailto:<?php echo $provider['companyEmail']; ?>"><?php echo $provider['companyEmail']; ?></a></td>
																		<td><?php echo $provider['companyPhone']; ?></td>
																		<td><?php echo gmdate( "D M d, Y", strtotime( $provider['dateJoined'] ) ); ?></td>
																		<td style="text-align: center;">
																			<a href="./provider?t=<?php echo $provider['providerKey']; ?>"><span class="label label-success">View Details</span></a>
																			<?php
																				if ( $AdminClass -> isSupperAdmin() ) 
																				{
																					?>
																						<a href="./services?t=<?php echo $provider['providerKey']; ?>"><span class="label label-warning">View Services</span></a>
																						<?php
																							if ( $provider['companyStatus'] == 1 ) 
																							{
																								?>
																									<a href="./providers?action=<?php echo $provider['companyStatus']; ?><?php echo $provider['providerKey']; ?>">
																										<span class="label label-success">Suspend</span>
																									</a>
																								<?php
																							}
																							elseif ( $provider['companyStatus'] == 0 )
																							{
																								?>
																									<a href="./providers?action=<?php echo $provider['companyStatus']; ?><?php echo $provider['providerKey']; ?>">
																										<span class="label label-important">Activate</span>
																									</a>
																								<?php	
																							}
																						?>
																					<?php
																				}
																			?>
																		</td>
																	</tr>
																<?php
															}
														}
														
														// The categoryID is empty therefore grab everything service provider in the database
														else 
														{
															$cols = Array ( "providerID, companyName, companyEmail, companyPhone, companyLogo, dateJoined, providerKey" );
															$providers = $Database -> get( "tlr_services_providers" );
															foreach ( $providers as $provider )
															{
																?>
																	<tr class="gradeX <?php if( ( $provider['providerID'] % 3 ) == 0 ) { echo "odd"; } else { echo "even"; } ?>">
																		<td><?php echo $provider['companyName']; ?></td>
																		<td><a href="mailto:<?php echo $provider['companyEmail']; ?>"><?php echo $provider['companyEmail']; ?></a></td>
																		<td><?php echo $provider['companyPhone']; ?></td>
																		<td><?php echo gmdate( "D M d, Y", strtotime( $provider['dateJoined'] ) ); ?></td>
																		<td style="text-align: center;">
																			<a href="./provider?t=<?php echo $provider['providerKey']; ?>"><span class="label label-success">View Details</span></a>
																			<?php
																				if ( $AdminClass -> isSupperAdmin() ) 
																				{
																					?>
																						<a href="./services?t=<?php echo $provider['providerKey']; ?>"><span class="label label-warning">View Services</span></a>
																						<?php
																							if ( $provider['companyStatus'] == 1 ) 
																							{
																								?>
																									<a href="./providers?action=<?php echo $provider['companyStatus']; ?><?php echo $provider['providerKey']; ?>">
																										<span class="label label-success">Suspend</span>
																									</a>
																								<?php
																							}
																							elseif ( $provider['companyStatus'] == 0 )
																							{
																								?>
																									<a href="./providers?action=<?php echo $provider['companyStatus']; ?><?php echo $provider['providerKey']; ?>">
																										<span class="label label-important">Activate</span>
																									</a>
																								<?php	
																							}
																						?>
																					<?php
																				}
																			?>
																		</td>
																	</tr>
																<?php
															}
														}
													?>
												</tbody>
											</table>
											<!-- End table -->
											
										</div>
									</div>
									<!-- End content body -->
									
								</div>
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
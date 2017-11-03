<?php
	session_start();
	
	require_once './models/classes/Configurations.php'; 			// Include the project configuration file
	require_once './controllers/processing.php'; 					// Include the form processing file
	
	require_once './controllers/formProcess.php'; 					// Include the form processing file
	if( !$AdminClass -> adminIsLoggedin() ) 						{ $AdminClass -> redirect( 'sign-in' ); }
	if( !$AdminClass -> isSupperAdmin() ) 							{ $AdminClass -> redirect( '404' ); }

	require_once './models/classes/ServiceProvider.php'; 			// Include the service provider class
	if( isset( $_GET['t'] ) ) { $t = $_GET['t']; }
	
	$pageName = "Source Of Fund"; 									// Set the page name
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
                         <a class="icon-btn span2 right " href="addfunds"><i class="icon-money"></i><div>Add Fund Source</div><span class="badge badge-important"></span></a>
						
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
														<th style="width: 0;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="sorting">Logo</th>
														<th style="width: 80px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="sorting">Name</th>
														<th style="width: 400px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="sorting">Description</th>
														<th style="width: 0;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting">Action</th>
													</tr>
												</thead>
												<!-- End table headers -->
												
												<!-- Begin table body -->
												<tbody aria-relevant="all" aria-live="polite" role="alert">
													<?php
														$cols = Array ( "paymentSourceID, paymentSourceName, paymentSourceDesc, paymentSourceLogo, paymentSourceKey" );
														$sourcesOfFunds = $Database -> get( "tlr_payment_sources" );
														foreach ( $sourcesOfFunds as $sourceOfFund )
														{
															?>
																<tr class="gradeX <?php if( ( $sourceOfFund['paymentSourceID'] % 3 ) == 0 ) { echo "odd"; } else { echo "even"; } ?>">
																	<td><img src="../<?php echo $sourceOfFund['paymentSourceLogo']; ?>" width="40px" /></td>
																	<td><?php echo $sourceOfFund['paymentSourceName']; ?></td>
																	<td><?php echo $sourceOfFund['paymentSourceDesc']; ?></td>
																	<td>
																		<a href="./editfunds?t=<?php echo $sourceOfFund['paymentSourceKey']; ?>"><span class="label label-info">Edit</span></a>
                                                                        <?php
                                                                        if ( $sourceOfFund['paymentSourceStatus'] == 1 )
                                                                        {
                                                                            ?>
                                                                            <a href="./activatefunds?t=<?php echo $sourceOfFund['paymentSourceStatus']; ?>&k=<?php echo $sourceOfFund['paymentSourceKey']; ?>">
                                                                            <span class="label label-success">Suspend</span></a>
                                                                            <?php
                                                                        }
                                                                        elseif ( $sourceOfFund['paymentSourceStatus'] == 0 )
                                                                        {
                                                                            ?>
                                                                            <a href="./activatefunds?t=<?php echo $sourceOfFund['paymentSourceStatus']; ?>&k=<?php echo $sourceOfFund['paymentSourceKey']; ?>">
                                                                            <span class="label label-important">Activate</span></a>
                                                                            <?php
                                                                        }
                                                                        ?>
																	</td>
																</tr>
															<?php
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
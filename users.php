<?php
	session_start();
	$pageName = "Users"; 											// Set the page name
	date_default_timezone_set('Africa/Accra');						// Set the time zone
	
	require_once './controllers/formProcess.php'; 					// Include the form processing file
	if( !$AdminClass -> adminIsLoggedin() ) 						{ $AdminClass -> redirect( 'sign-in' ); }

	require_once './models/classes/Configurations.php'; 			// Include the project configuration file
	require_once './models/classes/Database.php'; 					// Include the database class
	$userType = NULL;
	if ( isset( $_GET['t'] ) ) 										{ $userType = $_GET['t'];}
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
						
						<!-- Begin users statistics -->
						<?php
							require_once './views/pageUserAnalysis.php'; // Include the page analysis
						?>
						<!-- End users statistics -->
						
						<!-- Begin users table -->
						<div class="row-fluid">
							<div class="span12">
								<div class="widget">
			
									<!-- Begin table header -->
									<div class="widget-title">
										<h4><i class="icon-reorder"></i> All <?php echo $userType; ?> users</h4>
										<span class="tools">
											<a href="javascript:;" class="icon-chevron-down"></a>
											<a href="javascript:;" class="icon-remove"></a>
										</span>
									</div>
									<!-- End table header -->
									
									<!-- Begin table wrapper -->
									<div class="widget-body">
										<div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
											
											<!-- Begin table -->
											<table aria-describedby="sample_1_info" class="table table-striped table-bordered dataTable" id="sample_1">
												
												<!-- Begin table headers -->
												<thead>
													<tr role="row">
														<th aria-label="Username: activate to sort column ascending" style="width: 283px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="sorting">Full Name</th>
														<th aria-label="Email: activate to sort column ascending" style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting">Email</th>
														<th aria-label="Email: activate to sort column ascending" style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting">Phone</th>
														<th aria-label="Joined: activate to sort column ascending" style="width: 166px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting"><?php if( $userType == "Site" ) { echo "Date Joined"; } else { echo "Date Added"; } ?></th>
														<?php
															if ( $AdminClass -> isSupperAdmin() || $AdminClass -> isAdmin() )
															{
																?>
																	<th aria-label=": activate to sort column ascending" style="width: 100px; text-align: center" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting">Status</th>
																	<th aria-label="Points: activate to sort column ascending" style="width: 170px; text-align: center" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting">Details</th>
																<?php
															}
														?>
													</tr>
												</thead>
												<!-- End table headers -->
												
												<!-- Begin table body -->
												<tbody aria-relevant="all" aria-live="polite" role="alert">
													<?php
														// Check if the user type is admin user and grab all admin users
														if ( $userType == "admin" ) 
														{
															$cols = Array ( "adminID, adminEmail, adminTitle, firstName, lastName, adminPhone, dateCreated, status" );
															$admins = $Database -> get( "tlr_admins" );
															foreach ( $admins as $admin )
															{
																?>
																    <tr class="gradeX <?php if( ( $admin['adminID'] % 3 ) == 0 ) { echo "odd"; } else { echo "even"; } ?>">
																		<td class=""><?php echo $admin['adminTitle'] . " " . $admin['firstName'] . " " . $admin['lastName']; ?></td>
																		<td class="hidden-phone"><a href="mailto:<?php echo $admin['adminEmail']; ?>"><?php echo $admin['adminEmail']; ?></a></td>
																		<td class="hidden-phone"><?php echo $admin['adminPhone']; ?></td>
																		<td class="hidden-phone"><?php echo gmdate( "D M d, Y", strtotime( $admin['dateCreated'] ) ); ?></td>
																		<td class="hidden-phone" style="text-align: center"><?php if( $admin['status'] == 0 ) { echo "<span class='label label-inverse'>Blocked</span>"; } elseif( $admin['status'] == 1 ) { echo "<span class='label label-success'>Active</span>"; }  ?></td>
																		<td class="hidden-phone" style="text-align: center">
																			<a href="./user-details-<?php echo $admin['adminID']; ?>"><span class="label label-success">Details</span></a>
																			<a href="./edituser?user-details=<?php echo $admin['adminID']; ?>"><span class="label label-success">Edit</span></a>
																		</td>
																	</tr>
																<?php
															}
														}

														// Check if the user type is corporate user and grab all admin users
														if ( $userType == "corporate" ) 
														{
															$cols = Array ( "userID, acHolderKey, mobilePhone, email, dateCreated, status" );
															$admins = $Database -> get( "tlr_corporate_users" );
															foreach ( $admins as $admin )
															{
																?>
																    <tr class="gradeX <?php if( ( $admin['userID'] % 3 ) == 0 ) { echo "odd"; } else { echo "even"; } ?>">
																		<td class=""><?php echo $admin['fullName']; ?></td>
																		<td class="hidden-phone"><a href="mailto:<?php echo $admin['email']; ?>"><?php echo $admin['email']; ?></a></td>
																		<td class="hidden-phone"><?php echo $admin['mobilePhone']; ?></td>
																		<td class="hidden-phone"><?php echo gmdate( "D M d, Y", strtotime( $admin['dateCreated'] ) ); ?></td>
																		<td class="hidden-phone" style="text-align: center"><?php if( $admin['status'] == 0 ) { echo "<span class='label label-inverse'>Blocked</span>"; } elseif( $admin['status'] == 1 ) { echo "<span class='label label-success'>Active</span>"; }  ?></td>
																		<td class="hidden-phone" style="text-align: center">
																			<a href="./corporate-details?user-details=<?php echo $admin['acHolderKey']; ?>"><span class="label label-success">Details</span></a>
																		</td>
																	</tr>
																<?php
															}
														}
														
														// Check if the user type is site user and grab all site users
														elseif ( $userType == "site" ) 
														{
															$cols = Array ( "userID, userEmail, userTitle, firstName, lastName, userPhone, dateCreated, status" );
															$users = $Database -> get( "tlr_users" );
															foreach ( $users as $user )
															{
																?>
																	<tr class="gradeX <?php if( ( $user['userID'] % 3 ) == 0 ) { echo "odd"; } else { echo "even"; } ?>">
																		<td class=""><?php echo $user['userTitle'] . " " . $user['userFirstName'] . " " . $user['userLastName']; ?></td>
																		<td class="hidden-phone"><a href="mailto:<?php echo $user['userEmail']; ?>"><?php echo $user['userEmail']; ?></a></td>
																		<td class="hidden-phone"><?php echo $user['userPhone']; ?></td>
																		<td class="hidden-phone"><?php echo gmdate( "D M d, Y", strtotime( $user['dateCreated'] ) ); ?></td>
																		<?php
																			if ( $AdminClass -> isSupperAdmin() || $AdminClass -> isAdmin() )
																			{
																				?>
																					<td class="hidden-phone" style="text-align: center"><?php if( $user['userStatus'] == 0 ) { echo "<span class='label label-inverse'>Pending</span>"; } elseif( $user['userStatus'] == 1 ) { echo "<span class='label label-success'>Activated</span>"; } elseif( $user['userStatus'] == 2 ) { echo "<span class='label label-warning'>Suspended</span>"; }  ?></td>
																					<td class="hidden-phone" style="text-align: center"><a href="./site-details?user-details=<?php echo $user['userID']; ?>"><span class="label label-success">View Details</span></a></td>
																				<?php
																			}
																		?>
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
									<!-- Begin table wrapper -->
									
								</div>
							</div>
						</div>
						<!-- End users table -->
						
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
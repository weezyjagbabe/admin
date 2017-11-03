<?php
	session_start();
	require_once './models/classes/Configurations.php'; 			// Include the project configuration file
	require_once './controllers/processing.php'; 					// Include the form processing file
	
	require_once './controllers/formProcess.php'; 					// Include the form processing file
	if( !$AdminClass -> adminIsLoggedin() ) 						{ $AdminClass -> redirect( 'sign-in' ); }
	if( !$AdminClass -> isSupperAdmin() ) 							{ $AdminClass -> redirect( '404' ); }
	$t = NULL;
	if( isset($_GET['user-details'])) { $t = $_GET['user-details'];}
	$pageName = "Edit User"; 									// Set the page name
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
						
						<!-- Begin form contents -->
						<div class="row-fluid">
							<div class="span12">
								
								<?php if( isset( $message ) ) { echo $message; } ?>								
								
								<div class="widget">
						
									<!-- Begin page header -->
									<div class="widget-title">
										<h4><i class="icon-reorder"></i> <?php echo $pageName; ?></h4>
										<span class="tools">
											<a href="javascript:;" class="icon-chevron-down"></a>
											<a href="javascript:;" class="icon-remove"></a>
										</span>
									</div>
									<!-- End page header -->
                                    <?php
                                    $Database = new Database();
                                    $Database -> where ( "adminID", $t );
                                    $admin = $Database -> getOne ( "tlr_admins" );
                                    ?>
									<!-- Begin form contents -->
									<div class="widget-body form">
										<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
											<div class="control-group">
												<div class="control-group">
													
													<!-- Begin companyName field -->
													<div class="control-group">
														<label class="control-label">First Name</label>
														<div class="controls">
															<div class="input-icon left">
																<i class="icon-user"></i>
																<input type="text" class="span6 popovers" name="firstName" placeholder="First Name" data-trigger="hover" data-content="Type in your first name." data-original-title="First Name" value="<?php echo $admin['firstName']?>" required/>
                                                                <input type="hidden" class="span6 popovers" name="adminID" placeholder="AdminID" data-trigger="hover"  data-original-title="AdminID" value="<?php echo $t ?>"/>
                                                            </div>
															</div>
														</div>
													</div>
													<!-- End companyName field -->
													
													<!-- Begin companyEmail field -->
													<div class="control-group">
														<label class="control-label">Last Name</label>
														<div class="controls">
															<div class="input-icon left">
																<i class="icon-user"></i>
																<input type="text" class="span6 popovers" name="lastName" placeholder="Last Name" data-trigger="hover" data-content="Type in your last name." data-original-title="Last Name" value="<?php echo $admin['lastName']?>" required/>
															</div>
														</div>
													</div>
													<!-- End companyEmail field -->
													
													<!-- Begin companyEmail field -->
<!--													<div class="control-group">-->
<!--														<label class="control-label">Select Admin Level</label>-->
<!--														<div class="controls">-->
<!--															<select class="span6" name="adminGroup" data-placeholder="Choose a Category" tabindex="1">-->
<!--																<option value="">Select level...</option>-->
<!--																<option value="Admin">Admin</option>-->
<!--																<option value="Accountant">Accountant</option>-->
<!--																<option value="Marketing">Marketing</option>-->
<!--																<option value="Support">Support</option>-->
<!--															</select>-->
<!--														</div>-->
<!--													</div>-->
													<!-- End companyEmail field -->
													
													<!-- Begin companyEmail field -->
													<div class="control-group">
														<label class="control-label">Admin Email</label>
														<div class="controls">
															<div class="input-icon left">
																<i class="icon-envelope"></i>
																<input type="email" class="span6 popovers" name="adminEmail" placeholder="Admin Email" data-trigger="hover" data-content="Type in the your email address." data-original-title="Admin Email" value="<?php echo $admin['adminEmail']?>" readonly/>
															</div>
														</div>
													</div>
													<!-- End companyEmail field -->
													
													<!-- Begin companyEmail field -->
													<div class="control-group">
														<label class="control-label">Address</label>
														<div class="controls">
															<div class="input-icon left">
																<i class="icon-building"></i>
                                                                <input type="text" class="span6 popovers" name="adminResAddress" placeholder="Address" data-trigger="hover" data-content="Type in the Address." data-original-title="Address" value="<?php echo $admin['adminResAddress']?>" required/>
															</div>
														</div>
													</div>
													<!-- End companyEmail field -->
													
													<!-- Begin companyEmail field -->
													<div class="control-group">
														<label class="control-label">Phone</label>
														<div class="controls">
															<div class="input-icon left">
																<i class="icon-user-md"></i>
																<input type="tel" class="span6 popovers" name="adminPhone" placeholder="Phone" data-trigger="hover" data-content="Type in Phone number." data-original-title="Phone" value="<?php echo $admin['adminPhone'] ?>" required />
															</div>
														</div>
													</div>
													<!-- End companyEmail field -->
													
													<!-- Begin submit actions -->
													<div class="form-actions">
														<button type="submit" name="editUser" class="btn btn-success">Submit</button>
														<button type="submit" name="cancel" class="btn">Cancel</button>
													</div>
													<!-- Begin submit actions -->
													
												</div>
											</div>
										</form>
									</div>
									<!-- End form contents -->
									
								</div>
							</div>
						</div>
						<!-- End form contents -->
						
					</div>
					<!-- End inner contents -->
					
				</div>
			</div>
			<!-- Ends page main contents -->
			
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
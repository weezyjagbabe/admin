<?php
	session_start();
	require_once './models/classes/Configurations.php'; 														// Include the project configuration file
	require_once './controllers/processing.php'; 																// Include the form processing file
	
	require_once './controllers/formProcess.php'; 																// Include the form processing file
	if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }
	if( !$AdminClass -> isSupperAdmin() ) { $AdminClass -> redirect( '404' ); }
	
	require_once './models/classes/Service.php'; 																// Include the service class
	if( isset( $_GET['t'] ) ) { $t = $_GET['t']; }
	if( isset( $_GET['action'] ) ) { $action = $_GET['action']; $Service -> updateServiceStatus( $action ); } 	// Get the status Value	
	
	$pageName = 'Provider Details'; 																			// Set the page name
	require_once './controllers/documentHeader.php'; 															// Include the document header
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
							
							<!-- Begin content title -->
							<div class="widget-title">
								<h4><i class="icon-columns"></i><?php //echo $companyName; ?> Profile</h4>
								<span class="tools">
									<a href="javascript:;" class="icon-chevron-down"></a>
									<a href="javascript:;" class="icon-remove"></a>
								</span>
							</div>
							<!-- Begin content title -->
							
							<!-- Begin content body -->
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
										}
									}
								?>
								
								<!-- Begin left side contents -->
								<div class="span3">
									<div class="text-center profile-pic">
										<img src="../<?php echo $companyLogo; ?>" alt="">
									</div>
									
									<div style="margin-bottom: 25px">
										<h4>About <?php echo $companyName; ?></h4>
										<p><?php echo $aboutProvider; ?></p>
									</div>

								</div>
								<!-- End left side contents -->
								
								<!-- Begin right side contents -->
								<div class="span9">
									<h4><?php echo $companyName; ?> Services</h4><br />

									<!-- Begin provider services table -->
									<table aria-describedby="sample_1_info" class="table table-striped table-bordered dataTable" id="sample_1">
										
										<!-- Begin table headers -->
										<thead>
											<tr role="row">
												<th aria-label="Username: activate to sort column ascending" style="width: 150px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="sorting">Service Name</th>
												<th aria-label="Email: activate to sort column ascending" style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting">Service Category</th>
												<th aria-label="Points: activate to sort column ascending" style="width: 170px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting">Commission Charge</th>
												<th aria-label="Points: activate to sort column ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting">Service Key</th>
												<th aria-label="Points: activate to sort column ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting">Status</th>
                                                <th aria-label="Points: activate to sort column ascending" style="width: 80px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="hidden-phone sorting">Action</th>

                                            </tr>
										</thead>
										<!-- End table headers -->
										
										<!-- Begin table body -->
										<tbody aria-relevant="all" aria-live="polite" role="alert">
											<?php
												$cols = Array ( "serviceIDS, serviceName, commissionCharge, categoryName, serviceKey, serviceStatus" );
												$Database -> where( 'providerID', $providerID );
												$services = $Database -> get('tlr_services_with_providers_view');
												if ( $Database -> count > 0 )
												{
													foreach ( $services as $service )
													{
														?>
														    <tr class="gradeX <?php if( ( $service['serviceIDS'] % 3 ) == 0 ) { echo "odd"; } else { echo "even"; } ?>">
																<td class=""><?php echo $service['serviceName']; ?></td>
																<td class="hidden-phone "><?php echo $service['categoryName']; ?></td>
																<td class="hidden-phone "><?php echo $service['commissionCharge']; ?></td>
																<td class="hidden-phone "><?php echo $service['serviceKey']; ?></td>
																<td style="text-align: center;">
																<?php
																	if ( $service['serviceStatus'] == 1 ) 
																	{
																		?>
<!--																			<a href="./services?action=--><?php //echo $service['serviceStatus']; ?><!----><?php //echo $service['serviceKey'].$providerKey; ?><!--">-->
																				<span class="label label-success">Activated</span>
<!--																			</a>-->
																		<?php
																	}
																	elseif ( $service['serviceStatus'] == 0 )
																	{
																		?>
<!--																			<a href="./services?action=--><?php //echo $service['serviceStatus']; ?><!----><?php //echo $service['serviceKey'].$providerKey; ?><!--">-->
																				<span class="label label-important">Suspended</span>
<!--																			</a>-->
																		<?php	
																	}
																?>
																</td>
                                                                <td style="text-align: center;">
                                                                    <div class="btn-group">
                                                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                                                            Action
                                                                            <span class="caret"></span>
                                                                        </a>
                                                                        <ul class="dropdown-menu">
                                                                            <?php
                                                                            if ( $service['serviceStatus'] == 1 )
                                                                            {
                                                                                ?>
                                                                            <li class="btn-cont"><a href="./services?action=<?php echo $service['serviceStatus']; ?><?php echo $service['serviceKey'].$providerKey; ?>">Suspend</a></li>
                                                                                <?php
                                                                            }
                                                                            elseif ( $service['serviceStatus'] == 0 )
                                                                            {
                                                                                ?>
                                                                            <li class="btn-cont" ><a href="./services?action=<?php echo $service['serviceStatus']; ?><?php echo $service['serviceKey'].$providerKey; ?>">Activate</a></li>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            <li class="btn-cont"><a href="./updateservice?t=<?php echo $service['serviceKey']; ?>">Edit</a></li>
                                                                            <li class="btn-cont"><a href="./deleteservice?t=<?php echo $service['serviceKey']; ?>">Delete</a></li>
                                                                        </ul>
                                                                    </div>

                                                                </td>
															</tr>
														<?php
													}
												}
											?>
										</tbody>
									</table>
									<!-- End provider services table -->
									
									<!-- Begin add service form -->
									<div style="margin-bottom: 25px">
										<h4>Add New Service</h4>
										
										<?php if( isset( $message ) ) { echo $message; } ?>
										
										<form action="" method="post" enctype="multipart/form-data">
											<!-- Begin serviceName field -->
											<div class="control-group">
												<div class="controls">
													<div class="input-icon left">
														<i class="icon-home"></i>
														<input type="text" class="span12" name="serviceName" placeholder="Service Name" required />
													</div>
												</div>
											</div>
											<!-- End serviceName field -->
											
											<!-- Begin companyLogo field -->
											<div class="control-group">
												<label class="control-label">Attach Service Logo (If Any)</label>
												<div class="controls">
													<div class="fileupload fileupload-new span12" data-provides="fileupload">
														<input type="hidden" name="serviceLogo" />
														<div class="input-append">
															<div class="uneditable-input" style="width: 625px;">
																<i class="icon-file fileupload-exists"></i>
																<span class="fileupload-preview"></span>
															</div>
															<span class="btn btn-file">
																<span class="fileupload-new">Select Logo</span>
																<span class="fileupload-exists">Change Logo</span>
																<input class="default" type="file" name="serviceLogo" required/>
															</span>
														</div>
													</div>
												</div>
											</div>
											<!-- End companyLogo field -->
											
											<!-- Begin categoryID field -->
											<div class="control-group">
												<div class="controls">
													<select class="span12" name="categoryID" data-placeholder="Choose a Category" tabindex="1" required>
														<option value="">Select Service Category</option>
														<?php
																$columns		= Array( "categoryID, categoryName, categoryKey" );
																$categories 	= $Database -> get( "tlr_categories", null, $columns );
																if( $Database -> count > 0 )
																foreach( $categories as $category ) 
																{ 
																	?>
																		<option value="<?php echo $category['categoryID'].$category['categoryKey']; ?>">
																			<?php echo $category['categoryName']; ?>
																		</option>
																	<?php
																}
															?>
													</select>
												</div>
											</div>
											<!-- End categoryID field -->
											
											<!-- Begin service charge field -->
											<div class="control-group">
												<div class="controls">
													<select class="span12" name="commissionCharge" data-placeholder="Choose a commission charge" tabindex="1" required>
														<option value="">Choose commission charge</option>
														<?php
																$columns		= Array ( "commissionID, constantCharge, percentageCharge, commissionKey, description" );
																$commissions 	= $Database -> get ( "tlr_commission", null, $columns );
																if ( $Database -> count > 0 )
																foreach ( $commissions as $commission ) 
																{ 
																	?>
																		<option value="<?php if( !empty( $commission['constantCharge'] ) ){ echo $commission['constantCharge']; } else{ echo $commission['percentageCharge']; } ?>">
																			<?php if( !empty( $commission['constantCharge'] ) ){ echo $commission['constantCharge'] . " - " . $commission['description']; } else{ echo $commission['percentageCharge'] . "%" . " - " . $commission['description']; } ?>
																		</option>
																	<?php
																}
															?>
													</select>
												</div>
											</div>
											<!-- End service charge field -->
											
											<!-- Begin categoryID field -->
											<div class="control-group">
												<div class="controls">
													<textarea class="span12" name="serviceDesc" rows="4"></textarea>
												</div>
											</div>
											<!-- End categoryID field -->
											
											<input type="hidden" name="providerID" value="<?php echo $providerID; ?>" />
											<input type="hidden" name="providerKey" value="<?php echo $providerKey; ?>" />
											
											<!-- Begin submit button -->
											<button type="submit" name="addService" class="btn btn-success" style="width: 230px;">Add Service</button>
											<!-- End submit button -->
											
										</form>
									</div>
									<!-- End add service form -->
									
								</div>
								<!-- End right side contents -->
								
								<div class="space5"></div>
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
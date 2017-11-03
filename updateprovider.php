<?php
	session_start();
	require_once './models/classes/Configurations.php'; 			// Include the project configuration file
	require_once './controllers/processing.php'; 					// Include the form processing file
	
	require_once './controllers/formProcess.php'; 					// Include the form processing file
	if( !$AdminClass -> adminIsLoggedin() ) 						{ $AdminClass -> redirect( 'sign-in' ); }
	if( !$AdminClass -> isSupperAdmin() ) 							{ $AdminClass -> redirect( '404' ); }

    if( isset( $_GET['t'] ) ) { $t = $_GET['t']; }
	$pageName = "Update Service Provider"; 						// Set the page name
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
							require_once './views/pageProvidersButtons.php'; // Include the service providers top buttons
						?>
						<!-- End service providers statistics -->
						
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
                                            $dateJoined             =   $detail['dateJoined'];
                                        }
                                    }
                                    ?>
						
									<!-- Begin form contents -->
									<div class="widget-body form">
										<form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
											<div class="control-group">
												<div class="control-group">
													
													<!-- Begin companyName field -->
													<div class="control-group">
														<label class="control-label">Company Name</label>
														<div class="controls">
															<div class="input-icon left">
																<i class="icon-home"></i>
																<input type="text" class="span6 popovers" name="companyName" placeholder="Company Name" data-trigger="hover" data-content="Type in the comapny name in this field." data-original-title="Company Name" value="<?php echo $companyName?>" required/>
															</div>
														</div>
													</div>
													<!-- End companyName field -->
													
													<!-- Begin companyEmail field -->
													<div class="control-group">
														<label class="control-label">Company Email</label>
														<div class="controls">
															<div class="input-icon left">
																<i class="icon-envelope"></i>
																<input type="email" class="span6 popovers" name="companyEmail" placeholder="Email Address" data-trigger="hover" data-content="Type in the comapny email address in this field." data-original-title="Company Email" value="<?php echo $companyEmail?>" readonly/>
															</div>
														</div>
													</div>
													<!-- End companyEmail field -->
													
													<!-- Begin companyPhone field -->
													<div class="control-group">
														<label class="control-label">Company Phone</label>
														<div class="controls">
															<div class="input-icon left">
																<i class="icon-phone"></i>
																<input type="tel" class="span6 popovers" name="companyPhone" placeholder="Phone" data-trigger="hover" data-content="Type in the comapny phone number in this field." data-original-title="Company Phone" value="<?php echo $companyPhone?>" required/>
															</div>
														</div>
													</div>
													<!-- End companyPhone field -->
													
													<!-- Begin companyLogo field -->
                                                    <div class="control-group">
                                                        <label class="control-label">Company Logo (If Any)</label>
                                                        <div class="controls">
                                                            <div class="fileupload fileupload-new span12" data-provides="fileupload">
                                                                <input type="hidden" name="companyLogo" value="<?php echo $companyLogo?>" />
                                                                <div class="input-append">
                                                                    <div class="uneditable-input" style="width: 625px;">
                                                                        <!--																<i class="icon-file fileupload-exists"></i>-->
                                                                        <?php echo $companyLogo?>
                                                                        <!--                                                                <span class="fileupload-preview"></span>-->
                                                                    </div>
                                                                    <span class="btn btn-file">
<!--																<span class="fileupload-new">Select Logo</span>-->
                                                                        <!--																<span class="fileupload-exists">Change Logo-->
																<input class="default" type="file" name="companyLogo" value="<?php echo $companyLogo?>" required/>
															</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<!-- End companyLogo field -->
													
													<!-- Begin companyAddress field -->
													<div class="control-group">
														<label class="control-label">Company Address</label>
														<div class="controls">
															<div class="input-icon left">
																<i class="icon-map-marker"></i>
																<input type="text" class="span6 popovers" name="companyAddress" placeholder="Address" data-trigger="hover" data-content="Type in the comapny address (Location) in this field." data-original-title="Company Address" value="<?php echo $companyAddress?>" required />
															</div>
														</div>
													</div>
													<!-- End companyAddress field -->
													
													<!-- Begin aboutProvider field -->
													<div class="control-group">
														<label class="control-label">About The Provider</label>
														<div class="controls">
															<textarea class="span6 popovers" name="aboutProvider" data-trigger="hover" data-content="Briefly state the services of the company." data-original-title="Service Description" rows="5"><?php echo $aboutProvider?></textarea>
														</div>
													</div>
													<!-- End aboutProvider field -->
													
													<!-- Begin categoryName checks -->
													<div class="control-group">
														<label class="control-label">Check Services</label>
														<div class="controls">
															<?php
//                                                                $length = strlen((string)$serviceIDS);
																$columns		= Array ( "categoryID, categoryName" );
																$categories 	= $Database -> get ( "tlr_categories", null, $columns );
																if ( $Database -> count > 0 )
																
																foreach ( $categories as $category ) 
																{

//																    for($i = 0; $i < $length; $i++){
//																        $a = substr($serviceIDS,$i,1)
																	?>
																		<label class="checkbox">
																			<div id="uniform-undefined" class="checker"><span><input style="opacity: 0;" name="serviceIDS[]" value="<?php echo $category['categoryID']; ?>" type="checkbox"></span></div> <?php echo $category['categoryName']; ?>
																		</label>
																	<?php
																}
															?>
														</div>
													</div>
													<!-- End categoryName checks -->
                                                    <input id="t" type="hidden" name="providerKey" data-t="<?php echo $t; ?>" value="<?php echo $t; ?>" />
                                                    <input type="hidden" name="providerCode" value="<?php echo $providerCode; ?>" />
                                                    <input type="hidden" name="dateJoined" value="<?php echo $dateJoined; ?>" />
													<!-- Begin submit actions -->
													<div class="form-actions">
														<button type="submit" name="updateProvider" class="btn btn-success">Submit</button>
                                                        <input type="button" name="cancel" class="btn" value="Cancel" onclick="sample()"/>
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
					<!-- End page main contents -->
					
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

        <script>
            function sample(){

                var x = document.getElementById('t').getAttribute('data-t');
                window.location.href = 'provider?t='+x;
            }
        </script>
		
	</body>
	<!-- End page body -->
	
</html>
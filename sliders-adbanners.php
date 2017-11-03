<?php
	session_start();
	require_once './models/classes/Configurations.php'; 															// Include the project configuration file
	require_once './controllers/processing.php'; 																	// Include the form processing file
	
	require_once './controllers/formProcess.php'; 																	// Include the form processing file
	if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }
	
	require_once './models/classes/ImagesClass.php'; 																// Include the images class
	if( isset( $_GET['action'] ) ) { $action = $_GET['action']; $ImagesClass -> updateImageStatus( $action ); } 	// Get the status Value
	
	$pageName = "Sliders and AD Banners"; 																			// Set the page name
	require_once './controllers/documentHeader.php'; 																// Include the document header
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

					<!-- Begin inner contents -->
					<div id="page" class="dashboard">
						
						<!-- Begin users table -->
						<div class="row-fluid">
							<div class="span12">
								
								<h3 class="page-title"> <?php echo $pageName; ?> </h3>
								
								<!-- Begin content body -->
								<div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
									<div class="widget">
										
										<!-- Begin table header -->
										<div class="widget-title">
											<h4><i class="icon-reorder"></i>Home Sliders</h4>
											<span class="tools">
												<a href="javascript:;" class="icon-chevron-down"></a>
												<a href="javascript:;" class="icon-remove"></a>
											</span>
										</div>
										<!-- End table header -->
										
										<!-- Begin add image form -->
										<div style="display: block;" class="widget-body">
											
											<?php if( isset( $message ) ) { echo $message; } ?>
											
											<form action="" method="post" enctype="multipart/form-data">
												<table class="table">
													<tbody>
														<tr>
															
															<!-- Begin image field -->
															<td style="border: none; padding: 0;">
																<div class="controls" style="margin-left: 0;">
																	<div class="fileupload fileupload-new" style="width: 440px;" data-provides="fileupload">
																		<div class="input-append">
																			<div class="uneditable-input" style="width: 300px;">
																				<i class="icon-file fileupload-exists"></i>
																				<span class="fileupload-preview"></span>
																			</div>
																			<span class="btn btn-file">
																				<span class="fileupload-new">Choose Image</span>
																				<span class="fileupload-exists">Change</span>
																				<input class="default" type="file" name="bannerImage">
																			</span>
																			<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
																		</div>
																	</div>
																</div>
															</td>
															
															<td style="border: none; padding: 0;">
																<div class="input-icon left">
																	<i class="icon-link"></i>
																	<input class="" type="text" name="bannerLink" placeholder="Enter link" style="width: 340px;">
																</div>
															</td>
															
															<td style="border: none; padding: 0; text-align: right;">
																<input class="" type="hidden" name="bannerType" value="slider">
																<button type="submit" name="uploadBanner" class="btn btn-success">Upload Banner</button>
															</td>
														</tr>
													</tbody>
												</table>
											</form>
										</div>
										<!-- End add image form -->
										
										<!-- Begin table content -->							
										<div style="display: block;" class="widget-body">
											<table class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>Image</th>
														<th>Ad Link</th>
														<th>Status</th>
													</tr>
												</thead>
												
												<tbody>
													<?php
														$cols = Array ( "imageID, imageKey, imageSource, imageLink, imageStatus" );
														$Database -> where( 'imageType', 'slider' );
														$sliders = $Database -> get( "tlr_bg_images" );
														foreach ( $sliders as $slider )
														{
															?>
																<tr>
																	<td><img src="../<?php echo $slider['imageSource']; ?>" width="200" /></td>
																	<td class="hidden-phone"><?php echo $slider['imageLink']; ?></td>
																	<td>
																		<?php
																			if ( $slider['imageStatus'] == 1 ) 
																			{
																				?>
																					<a href="./sliders-adbanners?action=<?php echo $slider['imageStatus']; ?><?php echo $slider['imageKey']; ?>">
																						<span class="label label-success">Deactivate</span>
																					</a>
																				<?php
																			}
																			elseif ( $slider['imageStatus'] == 0 )
																			{
																				?>
																					<a href="./sliders-adbanners?action=<?php echo $slider['imageStatus']; ?><?php echo $slider['imageKey']; ?>">
																						<span class="label label-important">Activate</span>
																					</a>
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
										</div>
										<!-- End table content -->
										
									</div>
								</div>
								<!-- End content body -->
								
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
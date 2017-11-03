<?php
	session_start();
	require_once './models/classes/Configurations.php'; 			// Include the project configuration file
	require_once './controllers/processing.php'; 					// Include the form processing file
	
	require_once './controllers/formProcess.php'; 					// Include the form processing file
	if( !$AdminClass -> adminIsLoggedin() ) 						{ $AdminClass -> redirect( 'sign-in' ); }
	if( !$AdminClass -> isSupperAdmin() ) 							{ $AdminClass -> redirect( '404' ); }
	
	$pageName = "Background Images"; 								// Set the page name	
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
			
					<!-- Begin page title -->
					<div class="row-fluid">
						<div class="span12">
							<h3 class="page-title"> <?php echo $pageName; ?> <small>statistics and more</small></h3>
						</div>
					</div>
					<!-- End page title -->
					
					<!-- Begin page contents -->
					<div class="widget">
						<div class="widget-title">
							<h4><i class="icon-camera-retro"></i>Gallery</h4>
							<span class="tools"><a href="javascript:;" class="icon-chevron-down"></a><a href="javascript:;" class="icon-remove"></a></span>
						</div>
						
						<div class="widget-body">
							<div class="row-fluid">
								<div class="span8">
									<div class="pull-right">
										
										<hr class="clearfix">
										<div class="row-fluid">
											
											<div class="span2">
												<div class="thumbnail">
													<div class="item">
														<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="../models/images/sliders/bg1.jpg">
															<div class="zoom"><img src="../models/images/sliders/bg1.jpg" alt="Photo"><div class="zoom-icon"></div></div>
														</a>
													</div>
												</div>
											</div>
											<div class="span2">
												<div class="thumbnail">
													<div class="item">
														<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="../models/images/sliders/bg2.jpg">
															<div class="zoom"><img src="../models/images/sliders/bg2.jpg" alt="Photo"><div class="zoom-icon"></div></div>
														</a>
													</div>
												</div>
											</div>
											<div class="span2">
												<div class="thumbnail">
													<div class="item">
														<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="../models/images/sliders/bg3.jpg">
															<div class="zoom"><img src="../models/images/sliders/bg3.jpg" alt="Photo"><div class="zoom-icon"></div></div>
														</a>
													</div>
												</div>
											</div>
											<div class="span2">
												<div class="thumbnail">
													<div class="item">
														<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="../models/images/sliders/bg4.jpg">
															<div class="zoom"><img src="../models/images/sliders/bg4.jpg" alt="Photo"><div class="zoom-icon"></div></div>
														</a>
													</div>
												</div>
											</div>
<!--											<div class="span2">-->
<!--												<div class="thumbnail">-->
<!--													<div class="item">-->
<!--														<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="./img/gallery/photo1.jpg">-->
<!--															<div class="zoom"><img src="./img/gallery/photo1.jpg" alt="Photo"><div class="zoom-icon"></div></div>-->
<!--														</a>-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
<!--											<div class="span2">-->
<!--												<div class="thumbnail">-->
<!--													<div class="item">-->
<!--														<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="./img/gallery/photo1.jpg">-->
<!--															<div class="zoom"><img src="./img/gallery/photo1.jpg" alt="Photo"><div class="zoom-icon"></div></div>-->
<!--														</a>-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
<!--											<div class="span2">-->
<!--												<div class="thumbnail">-->
<!--													<div class="item">-->
<!--														<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="./img/gallery/photo1.jpg">-->
<!--															<div class="zoom"><img src="./img/gallery/photo1.jpg" alt="Photo"><div class="zoom-icon"></div></div>-->
<!--														</a>-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
<!--											<div class="span2">-->
<!--												<div class="thumbnail">-->
<!--													<div class="item">-->
<!--														<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="./img/gallery/photo1.jpg">-->
<!--															<div class="zoom"><img src="./img/gallery/photo1.jpg" alt="Photo"><div class="zoom-icon"></div></div>-->
<!--														</a>-->
<!--													</div>-->
<!--												</div>-->
<!--											</div>-->
											
											<div class="row-fluid"><div class="span12"><div class="pagination text-center"><ul><li><a href="#">«</a></li><li><a href="#">1</a></li><li><a href="#">2</a></li><li><a href="#">3</a></li><li><a href="#">4</a></li><li><a href="#">5</a></li><li><a href="#">»</a></li></ul></div></div></div></div>
										</div>
									
									</div>
								</div>
							</div>
						</div>
					<!-- End page contents -->
					
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
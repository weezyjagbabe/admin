<?php
	session_start();
	require_once './models/classes/Configurations.php'; 			// Include the project configuration file
	require_once './controllers/processing.php'; 					// Include the form processing file
	
	require_once './controllers/formProcess.php'; 					// Include the form processing file
	if( !$AdminClass -> adminIsLoggedin() ) 						{ $AdminClass -> redirect( 'sign-in' ); }
	if( !$AdminClass -> isSupperAdmin() ) 							{ $AdminClass -> redirect( '404' ); }
	
	$pageName = "Analytics"; 										// Set the page name	
	require_once './controllers/documentHeader.php'; 				// Include the document header

?>
<script src="./controllers/js/Chart.bundle.js"></script>
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
					
					<div id="page" class="dashboard">
			
						<div class="alert alert-info">
							<button data-dismiss="alert" class="close">×</button> 
							Welcome to the <strong>Admin Lab</strong> Theme. Please don't forget to check all the pages! 
						</div>
						
<!--						<div class="row-fluid circle-state-overview">-->
<!--							-->
<!--							<div class="span2 responsive clearfix" data-tablet="span3" data-desktop="span2">-->
<!--								<div class="circle-wrap">-->
<!--									<div class="stats-circle turquoise-color"><i class="icon-user"></i></div>-->
<!--									<p><strong>+30</strong> New Users </p>-->
<!--								</div>-->
<!--							</div>-->
<!--							-->
<!--							<div class="span2 responsive" data-tablet="span3" data-desktop="span2">-->
<!--								<div class="circle-wrap">-->
<!--									<div class="stats-circle red-color">-->
<!--										<i class="icon-tags"></i>-->
<!--									</div>-->
<!--									<p><strong>+970</strong> Sales </p>-->
<!--								</div>-->
<!--							</div>-->
<!--							-->
<!--							<div class="span2 responsive" data-tablet="span3" data-desktop="span2">-->
<!--								<div class="circle-wrap">-->
<!--									<div class="stats-circle green-color">-->
<!--										<i class="icon-shopping-cart"></i>-->
<!--									</div>-->
<!--									<p><strong>+320</strong> New Order </p>-->
<!--								</div>-->
<!--							</div>-->
<!--							-->
<!--							<div class="span2 responsive" data-tablet="span3" data-desktop="span2">-->
<!--								<div class="circle-wrap">-->
<!--									<div class="stats-circle gray-color">-->
<!--										<i class="icon-comments-alt"></i>-->
<!--									</div>-->
<!--									<p><strong>+530</strong> Comments </p>-->
<!--								</div>-->
<!--							</div>-->
<!--							-->
<!--							<div class="span2 responsive" data-tablet="span3" data-desktop="span2">-->
<!--								<div class="circle-wrap">-->
<!--									<div class="stats-circle purple-color">-->
<!--										<i class="icon-eye-open"></i>-->
<!--									</div>-->
<!--									<p><strong>+430</strong> Unique Visitor </p>-->
<!--								</div>-->
<!--							</div>-->
<!--							-->
<!--							<div class="span2 responsive" data-tablet="span3" data-desktop="span2">-->
<!--								<div class="circle-wrap">-->
<!--									<div class="stats-circle blue-color">-->
<!--										<i class="icon-bar-chart"></i>-->
<!--									</div>-->
<!--									<p><strong>+230</strong> Updates </p>-->
<!--								</div>-->
<!--							</div>-->
<!--						-->
<!--						</div>-->
						
<!--						<div class="row-fluid">-->
<!--							<div class="span12">-->
<!--								<div class="widget">-->
<!--									<div class="widget-title">-->
<!--										-->
<!--										<h4><i class="icon-envelope"></i> Mailbox</h4>-->
<!--										<div class="tools pull-right mtop7 mail-btn">-->
<!--											<div class="btn-group">-->
<!--												<a class="btn btn-small element" data-original-title="Share" href="#" data-toggle="tooltip" data-placement="top"><i class="icon-share-alt"></i></a>-->
<!--												<a class="btn btn-small element" data-original-title="Report" href="#" data-toggle="tooltip" data-placement="top"><i class="icon-exclamation-sign"></i></a>-->
<!--												<a class="btn btn-small element" data-original-title="Delete" href="#" data-toggle="tooltip" data-placement="top"><i class="icon-trash"></i></a>-->
<!--											</div>-->
<!--											-->
<!--											<div class="btn-group">-->
<!--												<a class="btn btn-small element" data-original-title="Move to" href="#" data-toggle="tooltip" data-placement="top"><i class="icon-folder-close"></i></a>-->
<!--												<a class="btn btn-small element" data-original-title="Tag" href="#" data-toggle="tooltip" data-placement="top"><i class="icon-tag"></i></a>-->
<!--											</div>-->
<!--											-->
<!--											<div class="btn-group">-->
<!--												<a class="btn btn-small element" data-original-title="Prev" href="#" data-toggle="tooltip" data-placement="top"><i class="icon-chevron-left"></i></a>-->
<!--												<a class="btn btn-small element" data-original-title="Next" href="#" data-toggle="tooltip" data-placement="top"><i class="icon-chevron-right"></i></a>-->
<!--											</div>-->
<!--										</div>-->
<!--										-->
<!--									</div>-->
<!--									-->
<!--									<div class="widget-body">-->
<!--										<table class="table table-condensed table-striped table-hover no-margin">-->
<!--											<thead>-->
<!--												<tr>-->
<!--													<th style="width:3%"><input type="checkbox" class="no-margin" /></th>-->
<!--													<th style="width:17%"> Sent by </th>-->
<!--													<th class="hidden-phone" style="width:55%"> Subject </th>-->
<!--													<th class="right-align-text hidden-phone" style="width:12%"> Labels </th>-->
<!--													<th class="right-align-text hidden-phone" style="width:12%"> Date </th>-->
<!--												</tr>-->
<!--											</thead>-->
<!--											-->
<!--											<tbody>-->
<!--												<tr>-->
<!--													<td><input type="checkbox" class="no-margin" /></td>-->
<!--													<td> Dulal khan </td>-->
<!--													<td class="hidden-phone"><strong> Senior Creative Designer </strong><small class="info-fade"> Vector Lab </small></td>-->
<!--													<td class="right-align-text hidden-phone"><span class="label label label-info"> Read </span></td>-->
<!--													<td class="right-align-text hidden-phone"> Yesterday </td>-->
<!--												</tr>-->
<!--												-->
<!--												<tr>-->
<!--													<td><input type="checkbox" class="no-margin" /></td>-->
<!--													<td> Mosaddek Hossain </td>-->
<!--													<td class="hidden-phone">-->
<!--														<strong> Senior UI Engineer </strong>-->
<!--														<small class="info-fade"> Vector Lab International </small>-->
<!--													</td>-->
<!--													<td class="right-align-text hidden-phone">-->
<!--														<span class="label label label-success"> New </span>-->
<!--													</td>-->
<!--													<td class="right-align-text hidden-phone"> Today </td>-->
<!--												</tr>-->
<!--												-->
<!--												<tr>-->
<!--													<td><input type="checkbox" class="no-margin" /></td>-->
<!--													<td> Sumon Ahmed </td>-->
<!--													<td class="hidden-phone">-->
<!--														<strong> Manager </strong>-->
<!--														<small class="info-fade"> ABC International </small>-->
<!--													</td>-->
<!--													<td class="right-align-text hidden-phone"><span class="label label"> Imp </span></td>-->
<!--													<td class="right-align-text hidden-phone"> Yesterday </td>-->
<!--												</tr>-->
<!--												-->
<!--												<tr>-->
<!--													<td><input type="checkbox" class="no-margin" /></td>-->
<!--													<td> Rafiqul Islam </td>-->
<!--													<td class="hidden-phone">-->
<!--														<strong> Verify your email </strong>-->
<!--														<small class="info-fade"> lorem ipsum dolor imit </small>-->
<!--													</td>-->
<!--													<td class="right-align-text hidden-phone"><span class="label label label-info"> Read </span></td>-->
<!--													<td class="right-align-text hidden-phone"> 18-04-2013 </td>-->
<!--												</tr>-->
<!--												-->
<!--												<tr>-->
<!--													<td><input type="checkbox" class="no-margin" /></td>-->
<!--													<td> Dkmosa </td>-->
<!--													<td class="hidden-phone">-->
<!--														<strong> Statement for January 2012 </strong>-->
<!--														<small class="info-fade"> Director </small>-->
<!--													</td>-->
<!--													<td class="right-align-text hidden-phone">-->
<!--														<span class="label label label-success"> New </span>-->
<!--													</td>-->
<!--													<td class="right-align-text hidden-phone"> 10-02-2013 </td>-->
<!--												</tr>-->
<!--												-->
<!--												<tr>-->
<!--													<td><input type="checkbox" class="no-margin" /></td>-->
<!--													<td> Mosaddek </td>-->
<!--													<td class="hidden-phone">-->
<!--														<strong> You're In! </strong>-->
<!--														<small class="info-fade"> Frontend developer </small>-->
<!--													</td>-->
<!--													<td class="right-align-text hidden-phone"><span class="label label"> Imp </span></td>-->
<!--													<td class="right-align-text hidden-phone"> 21-01-2013 </td>-->
<!--												</tr>-->
<!--												-->
<!--												<tr>-->
<!--													<td><input type="checkbox" class="no-margin" /></td>-->
<!--													<td> Dulal khan </td>-->
<!--													<td class="hidden-phone">-->
<!--														<strong> Support </strong>-->
<!--														<small class="info-fade"> XYZ Interactive </small>-->
<!--													</td>-->
<!--													<td class="right-align-text hidden-phone">-->
<!--														<span class="label label label-info"> New </span>-->
<!--													</td>-->
<!--													<td class="right-align-text hidden-phone"> 19-01-2013 </td>-->
<!--												</tr>-->
<!--											</tbody>-->
<!--										</table>-->
<!--										-->
<!--									</div>-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
						
						<div class="row-fluid metro-overview-cont">
							<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
								<div class="metro-overview turquoise-color clearfix">
									
									<div class="display">
										<i class="icon-group"></i>
										<div class="percent">+55%</div>
									</div>
									
									<div class="details">
										<div class="numbers">530</div>
										<div class="title">New Users</div>
									</div>
									
									<div class="progress progress-info">
										<div style="width: 55%" class="bar"></div>
									</div>
								</div>
							</div>
							
							<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
								<div class="metro-overview red-color clearfix">
									
									<div class="display">
										<i class="icon-tags"></i>
										<div class="percent">+36%</div>
									</div>
									
									<div class="details">
										<div class="numbers">5440 $</div>
										<div class="title">Monthly Sales</div>
										
										<div class="progress progress-warning">
											<div style="width: 36%" class="bar"></div>
										</div>
									</div>
								</div>
							</div>
							
							<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
								<div class="metro-overview green-color clearfix">
									
									<div class="display">
										<i class="icon-shopping-cart"></i>
										<div class="percent">+46%</div>
									</div>
									
									<div class="details">
										<div class="numbers">1000</div>
										<div class="title">New Orders</div>
										
										<div class="progress progress-success">
											<div style="width: 46%" class="bar"></div>
										</div>
									</div>
								
								</div>
							</div>
							
							<div data-desktop="span2" data-tablet="span4 fix-margin" class="span2 responsive">
								<div class="metro-overview gray-color clearfix">
									
									<div class="display">
										<i class="icon-comments-alt"></i>
										<div class="percent">+26%</div>
									</div>
									
									<div class="details">
										<div class="numbers">170</div>
										<div class="title">Comments</div>
										<div class="progress progress-warning">
											<div style="width: 26%" class="bar"></div>
										</div>
									</div>
									
								</div>
							</div>
								
							<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
								<div class="metro-overview purple-color clearfix">
									
									<div class="display">
										<i class="icon-eye-open"></i>
										<div class="percent">+72%</div>
									</div>
									
									<div class="details">
										<div class="numbers">1130</div>
										<div class="title">Unique Visitor</div>
										<div class="progress progress-danger">
											<div style="width: 72%" class="bar"></div>
										</div>
									</div>
								</div>
							</div>
								
							<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
								<div class="metro-overview blue-color clearfix">
									
									<div class="display">
										<i class="icon-bar-chart"></i>
										<div class="percent">+20%</div>
									</div>
								
									<div class="details">
										<div class="numbers">170</div>
										<div class="title">Updates</div>
										<div class="progress progress-success">
											<div style="width: 20%" class="bar"></div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						
						<div class="row-fluid">
							<div class="span12">
								
								<div class="widget">
									<div class="widget-title">
										<h4><i class="icon-bar-chart"></i> Line Chart</h4>
										
										<span class="tools">
											<a href="javascript:;" class="icon-chevron-down"></a>
											<a href="javascript:;" class="icon-remove"></a>
										</span>
									</div>
									
									<div class="widget-body">
										<div id="site_statistics_loading">
											<img src="./models/img/loading.gif" alt="loading" />
										</div>

										<div id="site_statistics_content">
                                            <canvas id="canvas" height="100"></canvas>
										</div>
									</div>
								</div>
								
							</div>
							
<!--							<div class="span4">-->
<!--								<div class="widget">-->
<!--			-->
<!--									<div class="widget-title">-->
<!--										<h4><i class="icon-book"></i> Active Pages</h4>-->
<!--										<span class="tools">-->
<!--											<a href="javascript:;" class="icon-chevron-down"></a>-->
<!--											<a href="javascript:;" class="icon-remove"></a>-->
<!--										</span>-->
<!--									</div>-->
<!--									<div class="widget-body">-->
<!--										<table class="table table-striped">-->
<!--											<thead>-->
<!--												<tr>-->
<!--													<th>Page</th>-->
<!--													<th>Visits</th>-->
<!--												</tr>-->
<!--											</thead>-->
<!--											<tbody>-->
<!--												<tr><td>Categories</td><td><strong>8790</strong></td></tr>-->
<!--												<tr><td>Clothing</td><td><strong>7052</strong></td></tr>-->
<!--												<tr><td>About</td><td><strong>6577</strong></td></tr>-->
<!--												<tr><td>Contact Us</td><td><strong>5760</strong></td></tr>-->
<!--												<tr><td>Blog</td><td><strong>4876</strong></td></tr>-->
<!--												<tr><td>Prices</td><td><strong>3866</strong></td></tr>-->
<!--												<tr><td>Information</td><td><strong>1876</strong></td></tr>-->
<!--											</tbody>-->
<!--										</table>-->
<!--									</div>-->
<!--									-->
<!--								</div>-->
<!--							</div>-->
								
						</div>
							
<!--						<div class="row-fluid">-->
<!--							<div class="span12">-->
<!--								<div class="widget">-->
<!--									-->
<!--									<div class="widget-title">-->
<!--										<h4><i class="icon-umbrella"></i> Live Chart</h4>-->
<!--										<span class="tools">-->
<!--											<a href="javascript:;" class="icon-chevron-down"></a>-->
<!--											<a href="javascript:;" class="icon-remove"></a>-->
<!--										</span>-->
<!--									</div>-->
<!--									-->
<!--									<div class="widget-body">-->
<!--										<div id="load_statistics_loading">-->
<!--											<img src="./models/img/loading.gif" alt="loading" />-->
<!--										</div>-->
<!--										<div id="load_statistics_content" class="hide">-->
<!--											<div id="load_statistics" class="chart"></div>-->
<!--											<div class="btn-toolbar no-bottom-space clearfix">-->
<!--												<div class="btn-group" data-toggle="buttons-radio">-->
<!--													<button class="btn btn-mini">Web</button>-->
<!--													<button class="btn btn-mini">Database</button>-->
<!--													<button class="btn btn-mini">Static</button>-->
<!--												</div>-->
<!--												<div class="btn-group pull-right" data-toggle="buttons-radio">-->
<!--													<button class="btn btn-mini active">Asia</button>-->
<!--													<button class="btn btn-mini">-->
<!--														<span class="visible-phone">Eur</span>-->
<!--														<span class="hidden-phone">Europe</span>-->
<!--													</button>-->
<!--													<button class="btn btn-mini">USA</button>-->
<!--												</div>-->
<!--											</div>-->
<!--										</div>-->
<!--									</div>-->
<!--									-->
<!--								</div>-->
<!--							</div>-->
<!--						</div>-->
						
						<div class="row-fluid">
							<div class="span12">
								<div class="widget">
									
									<div class="widget-title">
										<h4><i class="icon-reorder"></i>Transactions for (
                                            <?php echo date('F-Y'); ?>)</h4>
										<span class="tools">
											<a href="javascript:;" class="icon-chevron-down"></a>
											<a href="javascript:;" class="icon-remove"></a>
										</span>
									</div>
									
									<div class="widget-body">
                                        <table aria-describedby="sample_1_info" class="table table-striped table-bordered dataTable" id="sample_1">

                                            <!-- Begin table headers -->
                                            <thead>
                                            <tr role="row">
                                                <th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Name</th>
                                                <th style="width: 150px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Service</th>
                                                <th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Paid To</th>
                                                <th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Fund Source</th>
                                                <th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Amount</th>
                                                <th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Commission</th>
                                                <th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Total</th>
                                                <th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Date</th>
                                                <th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Ref. Number</th>
                                                <th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Status</th>
                                            </tr>
                                            </thead>
                                            <!-- End table headers -->

                                            <!-- Begin table body -->
                                            <tbody aria-relevant="all" aria-live="polite" role="alert">
                                            <?php
                                            $cols = Array ( "transactionKey, userFirstName, userLastName, companyName, serviceName, transactionAmount, trasactionCharge, billingAmount, transactionRRN, companyName, paymentSourceName, transactionTime, transactionStatus" );
                                            $thisdate = date("Y-m")."%";
                                            $param = Array( $thisdate);
                                            $query = 'SELECT * FROM tlr_transactions_view WHERE  transactionDate LIKE ?';
                                            $transactions = $Database->rawQuery($query, $param);
                                            foreach ( $transactions as $transaction )
                                            {
                                                ?>
                                                <tr class="gradeX">
                                                    <td><?php echo $transaction['userFirstName'] . " " . $transaction['userLastName']; ?></td>
                                                    <td><?php echo $transaction['serviceName'] ?></td>
                                                    <td><?php echo $transaction['companyName'] ?></td>
                                                    <td><?php echo $transaction['paymentSourceName'] ?></td>
                                                    <td><?php echo $transaction['transactionAmount'] ?></td>
                                                    <td><?php echo $transaction['trasactionCharge'] ?></td>
                                                    <td><?php echo $transaction['billingAmount'] ?></td>
                                                    <td><?php echo date("M j, Y", strtotime( $transaction['transactionDate'] ) ) . " at " . date("G:i", strtotime( $transaction['transactionTime'] ) ); ?></td>
                                                    <td><?php echo $transaction['transactionRRN'] ?></td>
                                                    <td><?php if($transaction['transactionStatus'] === 1){echo '<span class="label label-success">APPROVED</span>';}elseif($transaction['transactionStatus'] === 0){echo '<span class="label label-default">DECLINED</span>';}else{ echo '<span class="label label-warning">PENDING</span>\'';} ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
									</div>
								</div>
							
							</div>
						</div>
						
<!--						<div class="row-fluid">-->
<!--							<div class="span7 responsive" data-tablet="span7 fix-margin" data-desktop="span7">-->
<!--								<div class="widget">-->
<!--			-->
<!--									<div class="widget-title">-->
<!--										<h4><i class="icon-calendar"></i> Calendar</h4>-->
<!--										<span class="tools">-->
<!--											<a href="javascript:;" class="icon-chevron-down"></a>-->
<!--											<a href="javascript:;" class="icon-remove"></a>-->
<!--										</span>-->
<!--									</div>-->
<!--									-->
<!--									<div class="widget-body">-->
<!--										<div id="calendar" class="has-toolbar"></div>-->
<!--									</div>-->
<!--									-->
<!--								</div>-->
<!--							</div>-->
<!--							-->
<!--							<div class="span5">-->
<!--								<div class="widget">-->
<!--									<div class="widget-title">-->
<!--										<h4><i class="icon-reorder"></i> Progress Bars</h4>-->
<!--										<span class="tools">-->
<!--											<a href="javascript:;" class="icon-chevron-down"></a>-->
<!--											<a href="javascript:;" class="icon-remove"></a>-->
<!--										</span>-->
<!--									</div>-->
<!--									-->
<!--									<div class="widget-body">-->
<!--										<span class="fc-header-title"><h2>Basic</h2></span>-->
<!--										<div class="progress">-->
<!--											<div style="width: 40%;" class="bar"></div>-->
<!--										</div>-->
<!--										<div class="progress progress-success">-->
<!--											<div style="width: 60%;" class="bar"></div>-->
<!--										</div>-->
<!--										<div class="progress progress-warning">-->
<!--											<div style="width: 80%;" class="bar"></div>-->
<!--										</div>-->
<!--										<div class="progress progress-danger">-->
<!--											<div style="width: 45%;" class="bar"></div>-->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								-->
<!--								<div class="widget">-->
<!--									<div class="widget-title">-->
<!--										<h4><i class="icon-bell-alt"></i> Alerts</h4>-->
<!--										<span class="tools">-->
<!--											<a href="javascript:;" class="icon-chevron-down"></a>-->
<!--											<a href="javascript:;" class="icon-remove"></a>-->
<!--										</span>-->
<!--									</div>-->
<!--									<div class="widget-body">-->
<!--										<div class="alert">-->
<!--											<button class="close" data-dismiss="alert">×</button>-->
<!--											<strong>Warning!</strong> Your monthly traffic is reaching limit. -->
<!--										</div>-->
<!--										<div class="alert alert-success">-->
<!--											<button class="close" data-dismiss="alert">×</button>-->
<!--											<strong>Success!</strong> The page has been added. -->
<!--										</div>-->
<!--										<div class="alert alert-info">-->
<!--											<button class="close" data-dismiss="alert">×</button>-->
<!--											<strong>Info!</strong> You have 198 unread messages. -->
<!--										</div>-->
<!--										<div class="alert alert-error">-->
<!--											<button class="close" data-dismiss="alert">×</button>-->
<!--											<strong>Error!</strong> The daily cronjob has failed. -->
<!--										</div>-->
<!--									</div>-->
<!--								</div>-->
<!--								-->
<!--							</div>-->
<!--						</div>-->
					</div>
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
<?php
	session_start();
	require_once './models/classes/Configurations.php'; 			// Include the project configuration file
	require_once './models/classes/Accounts.php'; 					// Include the project configuration file
	
	require_once './controllers/formProcess.php'; 					// Include the form processing file
	if( !$AdminClass -> adminIsLoggedin() ) 						{ $AdminClass -> redirect( 'sign-in' ); }
	// if( !$AdminClass -> isSupperAdmin() || !$AdminClass -> isAdmin() || !$AdminClass -> isAccountAdmin() ) { $AdminClass -> redirect( '404' ); }
	
	$pageName = "Todays Accounts"; 								// Set the page name
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
					<h3 class="page-title"><?php echo $pageName; ?></h3>
					<!-- End page title -->
					
					<!-- Begin inner contents -->
					<div id="page" class="dashboard">
						
						<div class="row-fluid">
							<div class="span4">
								<div class="widget">
									<div class="widget-title">
										<h4><i class="icon-reorder"></i> Total Transacted Amount</h4>
									</div>
									<div class="widget-body invoice">
										<?php 
											$cols = Array ( "transactedAmount" );
											$transactedAmounts = $Database -> get( "tlr_todaysTransactedAmount_view" );
											foreach ( $transactedAmounts as $transactedAmount )
											{
												if ( !$transactedAmount['transactedAmount'] == NULL ) { echo "GHS " . $transactedAmount['transactedAmount']; } else { echo "GHS 0.00"; }
											}
										?>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="widget">
									<div class="widget-title">
										<h4><i class="icon-reorder"></i> Total Commission Charge</h4>
									</div>
									<div class="widget-body invoice">
										<?php 
											$cols = Array ( "trasactionCharge" );
											$trasactionCharges = $Database -> get( "tlr_todaysCommissionAmount_view" );
											foreach ( $trasactionCharges as $trasactionCharge )
											{
												if ( !$trasactionCharge['trasactionCharge'] == NULL ) { echo "GHS " . $trasactionCharge['trasactionCharge']; } else { echo "GHS 0.00"; }
											}
										?>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="widget">
									<div class="widget-title">
										<h4><i class="icon-reorder"></i> Total Amount</h4>
									</div>
									<div class="widget-body invoice">
										<?php 
											$cols = Array ( "billingAmount" );
											$billingAmounts = $Database -> get( "tlr_todaysbillingAmount_view" );
											foreach ( $billingAmounts as $billingAmount )
											{
												if ( !$billingAmount['billingAmount'] == NULL ) { echo "GHS " . $billingAmount['billingAmount']; } else { echo "GHS 0.00"; }
											}
										?>
									</div>
								</div>
							</div>
						</div>
							
						
						<!-- Begin users statistics -->
						<?php
							require_once './views/pageDailyAccounts.php'; // Include the daily accounts
						?>
						<!-- End users statistics -->
						
						<!-- Begin users table -->
						<div class="row-fluid">
							<div class="span12">
								<div class="widget">
			
									<!-- Begin table header -->
									<div class="widget-title">
										<h4><i class="icon-reorder"></i> <?php echo $pageName; ?></h4>
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
														<th style="width: 150px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Service</th>
														<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Paid To</th>
														<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Paid With</th>
														<th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Amount</th>
														<th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Commission</th>
														<th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Total</th>
														<th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Time</th>
														<th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Ref. Number</th>
													</tr>
												</thead>
												<!-- End table headers -->
												
												<!-- Begin table body -->
												<tbody aria-relevant="all" aria-live="polite" role="alert">
													<?php
														$cols = Array ( "transactionKey, companyName, serviceName, transactionAmount, trasactionCharge, billingAmount, transactionRRN, companyName, paymentSourceName, transactionTime" );
														$Database -> where( 'transactionDate', date("Y-m-d") );
														$Database -> where( 'transactionStatus', 1 );
														$transactions = $Database -> get( "tlr_transactions_view" );
														foreach ( $transactions as $transaction )
														{
															?>
																<tr class="gradeX">
																	<td><?php echo $transaction['serviceName'] ?></td>
																	<td><?php echo $transaction['companyName'] ?></td>
																	<td><?php echo $transaction['paymentSourceName'] ?></td>
																	<td><?php echo $transaction['transactionAmount'] ?></td>
																	<td><?php echo $transaction['trasactionCharge'] ?></td>
																	<td><?php echo $transaction['billingAmount'] ?></td>
																	<td><?php echo $transaction['transactionTime'] ?></td>
																	<td><?php echo $transaction['transactionRRN'] ?></td>
																</tr>
															<?php
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
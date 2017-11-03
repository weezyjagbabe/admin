<?php
	require_once './models/classes/Configurations.php'; 									// Include the project configuration file
	require_once './controllers/formProcess.php'; 											// Include the form processing file
	
	if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }		// Check if the admi is logged in
	
	$pageName = "Previous Transactions"; 													// Set the page name
	require_once './controllers/documentHeader.php'; 										// Include the document header
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
							require_once './views/pageTransactionBreakDown.php'; // Include the transaction break down
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
											
											<div class="widget">
												<div class="widget-body form">
													<form action="#" class="form-horizontal">
														
														<div class="span6">
															<label>Transactions from</label>
															<div class="control-group">
																<div class="input-append" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" style="width: 92%;">
																	<input class="m-ctrl-medium date-picker" type="text" placeholder="From Date" style="width: 100%;">
																	<span class="add-on"><i class="icon-calendar"></i></span>
																</div>
															</div>
														</div>
														
														<div class="span6">
															<label>To</label>
															<div class="control-group">
																<div class="input-append" data-date="102/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months" style="width: 92%;">
																	<input class="m-ctrl-medium date-picker" type="text" placeholder="To Date" style="width: 100%;">
																	<span class="add-on"><i class="icon-calendar"></i></span>
																</div>
															</div>
														</div>
														
														<div class="clearfix"></div>
													</form>
												</div>
											</div>
											
											<div class="form-actions" style="padding: 0;"></div>
											
											<!-- Begin table -->
											<table aria-describedby="sample_1_info" class="table table-striped table-bordered dataTable" id="sample_1">
												
												<!-- Begin table headers -->
												<thead>
													<tr role="row">
														<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Name</th>
														<th style="width: 220px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Service</th>
														<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Paid To</th>
														<th style="width: 130px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Fund Source</th>
														<th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Amount</th>
														<th style="width: 50px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Charge</th>
														<th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Total</th>
														<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Date</th>
														<th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Ref. Number</th>
                                                        <th style="width: 100px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Status</th>
													</tr>
												</thead>
												<!-- End table headers -->
												
												<!-- Begin table body -->
												<tbody aria-relevant="all" aria-live="polite" role="alert">
													<?php
														$cols = Array ( "transactionKey, firstName, lastName, companyName, serviceName, transactionAmount, trasactionCharge, billingAmount, transactionRRN, companyName, paymentSourceName, transactionDate, transactionTime" );
														$transactions = $Database -> get( "tlr_transactions_view" );
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
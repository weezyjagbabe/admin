<?php
require_once './models/classes/Configurations.php'; 									// Include the project configuration file
require_once './controllers/formProcess.php'; 											// Include the form processing file

if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }		// Check if the admi is logged in
$t = "";
if(isset($_GET['userKey'])) { $t = $_GET['userKey'];}
$pageName = "Transaction History"; 																// Set the page name
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
    <div id="main-content">
        <div class="container-fluid">
            <div style="margin-bottom: 50px;"></div>

            <!-- Begin inner contents -->
            <div id="page" class="dashboard">

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
							<?php
								$cols = Array ( "transactionKey, transactionAmount, trasactionCharge, billingAmount, transactionRRN, transactionDesc, transactionDate, transactionStatus" );
								$Database -> where( 'userKey', $t );
								$Database -> orderBy( "transactionID", "DESC" );
								$transactions = $Database -> get( "tlr_transactions_view" );
								if ( $Database -> count > 0 )
								{
									?>
                                    <table aria-describedby="sample_1_info" class="table table-striped table-bordered dataTable" id="sample_1">
											<thead>
												<tr role="row">
													<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" data-hide="phone">Transaction Code</th>
													<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Date</th>
													<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" data-hide="phone">Amount</th>
													<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" data-hide="phone,tablet">Fee Charged</th>
													<th style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader">Total</th>
													<td style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="center">Status</th>
													<td style="width: 200px;" colspan="1" rowspan="1" aria-controls="sample_1" tabindex="0" role="columnheader" class="center">Action</th>
												</tr>
											</thead>

                                        <tbody aria-relevant="all" aria-live="polite" role="alert">
												<?php
													foreach ( $transactions as $transaction )
													{
														?>
															<tr class="odd gradeX">
																<td><?php echo $transaction['transactionRRN']; ?></td>
																<td><?php echo date("F j", strtotime( $transaction['transactionDate'] ) ) ." at " . date( "g:i a", strtotime( $transaction['transactionTime'] ) ); ?></td>
																<td class="center">GHS <?php echo $transaction['transactionAmount']; ?></td>
																<td class="center">GHS <?php echo $transaction['trasactionCharge']; ?></td>
																<td class="center">GHS <?php echo $transaction['billingAmount']; ?></td>
																<td class="center">
																	<?php 
																		if ( $transaction['transactionStatus'] === 1 ){ echo "<button type='button' class='btn btn-success btn-xs'>Successful</button>";}
																		elseif ( $transaction['transactionStatus'] === 2 ){ echo "<button type='button' class='btn btn-primary btn-xs'>Canceled</button>";}
																		else { echo "<button type='button' class='btn btn-danger btn-xs'>Declined</button>"; }
																	?>
																</td>
																<td class="center"><a href="details?t=<?php echo $transaction['transactionKey']; ?>&m=<?php echo $t?>"><button type='button' class='btn btn-primary btn-xs'>Details</button></a></td>
															</tr>
														<?php
													}
												?>
											</tbody>
											
											<tfoot>
												<tr>
													<th>Transaction Code</th>
													<th>Date</th>
													<th>Amount</th>
													<th>Fee Charged</th>
													<th>Total</th>
													<td class="center">Status</th>
													<td class="center">Action</th>
												</tr>
											</tfoot>
										</table>
										
										<script type="text/javascript">
											var responsiveHelper;
											var breakpointDefinition = 
											{
											    tablet: 1024,
											    phone : 480
											};
											
											var tableContainer;
											
											jQuery(document).ready(function($)
											{
												tableContainer = $("#table-1");
												tableContainer.dataTable({
													"sPaginationType": "bootstrap",
													"aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
													"bStateSave": true,
										
												    // Responsive Settings
												    bAutoWidth     : false,
												    fnPreDrawCallback: function () 
												    {
												        // Initialize the responsive datatables helper once.
												        if (!responsiveHelper) 
												        {
												            responsiveHelper = new ResponsiveDatatablesHelper(tableContainer, breakpointDefinition);
												        }
												    },
												    
												    fnRowCallback  : function (nRow, aData, iDisplayIndex, iDisplayIndexFull) 
												    {
												        responsiveHelper.createExpandIcon(nRow);
												    },
												    
												    fnDrawCallback : function (oSettings) 
												    {
												        responsiveHelper.respond();
												    }
												});
												
												$(".dataTables_wrapper select").select2({
													minimumResultsForSearch: -1
												});
											});
										</script>
									<?php
								}
								
								else 
								{
									echo "No record found";
								}
							?>
						</div>
                </div>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</div>
						<!-- End page left -->
						
						<!-- Begin page right -->
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
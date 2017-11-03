<?php
require_once './models/classes/Configurations.php'; 									// Include the project configuration file
require_once './controllers/formProcess.php'; 											// Include the form processing file

if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }		// Check if the admi is logged in
if(isset($_GET['t'])) { $tKey = $_GET['t'];}
if(isset($_GET['m'])) { $t = $_GET['m'];}

$pageName = "Invoice"; 																// Set the page name
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
				<!-- End page header -->

				<!-- Begin page name and description -->
                <div class="widget-title">
                    <h4><i class="icon-reorder"></i> <?php echo $pageName; ?></h4>
<!--				    <em>Your transaction response details are displayed below.</em>-->
                    <span class="tools">
                        <a href="javascript:;" class="icon-chevron-down"></a>
                        <a href="javascript:;" class="icon-remove"></a>
                    </span>
                </div>
				<hr />
				<!-- End page name and description -->
                <div class="widget-body">
                    <div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid">


                    <!-- Begin table header -->

				<!-- Begin contents -->				
				<div class="">
					<div class="row">
						
						<!-- Begin page left -->
						<div class="col-sm-8">
							<?php
								$DatabaseHandler = new Database();
								$cols = Array ( "transactionRRN, serviceName, serviceKey, transactionDate, billingAmount, companyName, trasactionCharge, transactionDesc, paymentSourceName, transactionDate, transactionTime, transactionStatus" );
								$DatabaseHandler -> where( 'transactionKey', $tKey );
								$transactions = $DatabaseHandler -> get( 'tlr_transactions_view' );
								
								if ( $DatabaseHandler -> count > 0 )
								{
									foreach ( $transactions as $transaction ) 
									{
										$transactionRRN 		=	$transaction['transactionRRN']; 
										$serviceName	 		=	$transaction['serviceName']; 
										$serviceKey		 		=	$transaction['serviceKey']; 
										$transactionAmount	 	=	$transaction['transactionAmount']; 
										$billingAmount		 	=	$transaction['billingAmount']; 
										$companyName	 		=	$transaction['companyName']; 
										$trasactionCharge	 	=	$transaction['trasactionCharge']; 
										$transactionDesc	 	=	$transaction['transactionDesc']; 
										$paymentSourceName	 	=	$transaction['paymentSourceName']; 
										$transactionDate	 	=	$transaction['transactionDate']; 
										$transactionTime	 	=	$transaction['transactionTime']; 
										$transactionStatus	 	=	$transaction['transactionStatus']; 
									}
								}
							?>
							<div class="row">
								<div class="col-sm-6 align-left"></div>
								<div class="col-sm-6 text-center">
									<h4 class="text-center">REFERENCE NO. <?php echo $transactionRRN; ?></h4>
									<span class="text-right"><?php echo date( "F j", strtotime( $transactionDate ) ) . " at " . date( "g:i a", strtotime( $transactionTime ) ); ?></span>
								</div>
							</div>

							<hr class="margin" />

							<table class="table table-bordered">
								<thead>
									<tr>
										<th class="text-center">#</th>
										<th class="text-left" width="50%">Description</th>
										<th class="text-right" width="50%">Details</th>
									</tr>
								</thead>
	
								<tbody>
									<tr>
										<td class="text-center">1</td>
										<td>Transaction Code:</td>
										<td class="text-right"><?php echo $transactionRRN; ?></td>
									</tr>
	
									<tr>
										<td class="text-center">2</td>
										<td>Service Paid For:</td>
										<td class="text-right"><?php echo $serviceName; ?></td>
									</tr>
	
									<tr>
										<td class="text-center">3</td>
										<td>Service Provider Paid To:</td>
										<td class="text-right"><?php echo $companyName; ?></td>
									</tr>
	
									<tr>
										<td class="text-center">4</td>
										<td>Service Description:</td>
										<td class="text-right"><?php echo $transactionDesc; ?></td>
									</tr>
	
									<tr>
										<td class="text-center">5</td>
										<td>Source Of Payment:</td>
										<td class="text-right"><?php echo $paymentSourceName; ?></td>
									</tr>
	
									<tr>
										<td class="text-center">6</td>
										<td>Transaction Status:</td>
										<td class="text-right">
											<?php 
												if ( $transaction['transactionStatus'] === 1 ){ echo "<button type='button' class='btn btn-success btn-xs'>Successful</button>";}
												elseif ( $transaction['transactionStatus'] === 2 ){ echo "<button type='button' class='btn btn-primary btn-xs'>Canceled</button>";}
												else { echo "<button type='button' class='btn btn-danger btn-xs'>Declined</button>"; }
											?>
										</td>
									</tr>
								</tbody>
							</table>
	
							<div class="margin"></div>
	
							<div class="row">
								<div class="col-sm-6">
									<div class="text-left">
									</div>
								</div>
	
								<div class="col-sm-6">
									<div class="text-right">
										<ul class="list-unstyled">
											<li>Amount: <strong>GHS <?php echo $transactionAmount; ?></strong></li>
											<li>Convinience Fee: <strong>GHS <?php echo $trasactionCharge; ?></strong></li>
											<li>Total Amount: <strong>GHS <?php echo $billingAmount; ?></strong></li>
										</ul>
										<br />
										<a href="javascript:window.print();" class="btn btn-primary  hidden-print">
											Print Invoice
											<i class="entypo-doc-text"></i>
										</a>
	
										&nbsp;
	
										<a href="history?userKey=<?php echo $t?>" class="btn btn-success  hidden-print">Back To History<i class="entypo-left"></i></a>
									</div>
								</div>
							</div>
						</div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </div></div>
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
<div class="row-fluid metro-overview-cont">
	<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
		<div class="metro-overview turquoise-color clearfix">
			<div class="details">
				<div class="numbers">
					<?php 
						$cols = Array ( "transactionAmount" );
						$transactionAmounts = $Database -> get( "tlr_totalTotalVisa" );
						foreach ( $transactionAmounts as $transactionAmount )
						{
							if ( !$transactionAmount['transactionAmount'] == NULL ) { echo "GHS " . $transactionAmount['transactionAmount']; } else { echo "GHS 0.00"; }
						}
					?>
				</div>
				<div class="title">Visa</div></div>
		</div>
	</div>
		
	<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
		<div class="metro-overview red-color clearfix">
			<div class="details">
				<div class="numbers">
					<?php 
						$cols = Array ( "transactionAmount" );
						$transactionAmounts = $Database -> get( "tlr_totalTotalMastercard" );
						foreach ( $transactionAmounts as $transactionAmount )
						{
							if ( !$transactionAmount['transactionAmount'] == NULL ) { echo "GHS " . $transactionAmount['transactionAmount']; } else { echo "GHS 0.00"; }
						}
					?>
				</div>
				<div class="title">Mastercard</div>
			</div>
		</div>
	</div>
		
	<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
		<div class="metro-overview green-color clearfix">
			<div class="details">
				<div class="numbers">
					<?php 
						$cols = Array ( "transactionAmount" );
						$transactionAmounts = $Database -> get( "tlr_totalTotalMTN" );
						foreach ( $transactionAmounts as $transactionAmount )
						{
							if ( !$transactionAmount['transactionAmount'] == NULL ) { echo "GHS " . $transactionAmount['transactionAmount']; } else { echo "GHS 0.00"; }
						}
					?>
				</div>
				<div class="title">MTN</div>
			</div>
		</div>
	</div>
	
	<div data-desktop="span2" data-tablet="span4 fix-margin" class="span2 responsive">
		<div class="metro-overview gray-color clearfix">
			<div class="details">
				<div class="numbers">
					<?php 
						$cols = Array ( "transactionAmount" );
						$transactionAmounts = $Database -> get( "tlr_totalTotalAirtel" );
						foreach ( $transactionAmounts as $transactionAmount )
						{
							if ( !$transactionAmount['transactionAmount'] == NULL ) { echo "GHS " . $transactionAmount['transactionAmount']; } else { echo "GHS 0.00"; }
						}
					?>
				</div>
				<div class="title">Airtel</div>
			</div>
		</div>
	</div>
	
	<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
		<div class="metro-overview purple-color clearfix">
			<div class="details">
				<div class="numbers">
					<?php 
						$cols = Array ( "transactionAmount" );
						$transactionAmounts = $Database -> get( "tlr_totalTotalTigo" );
						foreach ( $transactionAmounts as $transactionAmount )
						{
							if ( !$transactionAmount['transactionAmount'] == NULL ) { echo "GHS " . $transactionAmount['transactionAmount']; } else { echo "GHS 0.00"; }
						}
					?>
				</div>
				<div class="title">Tigo</div>
			</div>
		</div>
	</div>
	
	<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
		<div class="metro-overview green-color clearfix">
			<div class="details">
				<div class="numbers">
					<?php 
						$cols = Array ( "transactionAmount" );
						$transactionAmounts = $Database -> get( "tlr_totalTotalGHLink" );
						foreach ( $transactionAmounts as $transactionAmount )
						{
							if ( !$transactionAmount['transactionAmount'] == NULL ) { echo "GHS " . $transactionAmount['transactionAmount']; } else { echo "GHS 0.00"; }
						}
					?>
				</div>
				<div class="title">GH Link</div>
			</div>
		</div>
	</div>
</div>
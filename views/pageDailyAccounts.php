<div class="row-fluid metro-overview-cont">
	<div data-desktop="span2" data-tablet="span4" class="span2 responsive">
		<div class="metro-overview turquoise-color clearfix">
			<div class="details">
				<div class="numbers">
					<?php 
						$cols = Array ( "transactionAmount" );
						$transactionAmounts = $Database -> get( "tlr_todaysTotalVisa" );
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
						$transactionAmounts = $Database -> get( "tlr_todaysTotalMastercard" );
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
						$transactionAmounts = $Database -> get( "tlr_todaysTotalMTN" );
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
						$transactionAmounts = $Database -> get( "tlr_todaysTotalAirtel" );
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
						$transactionAmounts = $Database -> get( "tlr_todaysTotalTigo" );
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
						$transactionAmounts = $Database -> get( "tlr_todaysTotalGHLink" );
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
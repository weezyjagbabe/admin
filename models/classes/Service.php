<?php
	require_once 'Database.php'; 	// Include the database class
	require_once 'AdminClass.php'; 	// Include the admin user class
	
	class Service 
	{
		// This method adds new service provider into the database
		public function addService( $serviceName, $categoryID, $categoryKey, $commissionCharge, $serviceDesc, $providerID, $providerKey, $serviceKey, $serviceLogo )
		{
			$Database = new Database();
			$data = Array ( "serviceName" => $serviceName, "serviceDesc" => $serviceDesc, "commissionCharge" => $commissionCharge, "providerID" => $providerID, "providerKey" =>$providerKey, "serviceStatus" => 1, "categoryID" => $categoryID, "categoryKey" => $categoryKey, "serviceKey" => $serviceKey, "serviceLogo" => $serviceLogo );
			$addService = $Database->insert( 'tlr_services', $data );
			if( $addService ){ return TRUE; }
		}

        public function updateService( $serviceName, $categoryID, $categoryKey, $commissionCharge, $serviceDesc, $serviceKey, $serviceLogo )
        {
            $Database = new Database();
            $Database->where('serviceKey',$serviceKey);
            $data = Array ( "serviceName" => $serviceName, "serviceDesc" => $serviceDesc, "commissionCharge" => $commissionCharge,"categoryID" => $categoryID, "categoryKey" => $categoryKey, "serviceLogo" => $serviceLogo );
            $updateService = $Database->update( 'tlr_services', $data );
            if( $updateService ){ return TRUE; }else{ return FALSE;}
        }

        public function updateSource( $sourceName, $categoryKey, $sourceDesc, $sourceKey, $sourceLogo )
        {
            $Database = new Database();
            $Database->where('paymentSourceKey',$sourceKey);
            $data = Array ( "paymentSourceName" => $sourceName, "paymentSourceDesc" => $sourceDesc, "paymentSourceCatKey" => $categoryKey, "paymentSourceLogo" => $sourceLogo );
            $updateSource = $Database->update( 'tlr_payment_sources', $data );
            if( $updateSource ){ return TRUE; }else{ return FALSE;}
        }

        public function addSource( $sourceName, $categoryKey, $sourceDesc, $sourceKey, $sourceLogo )
        {
            $Database = new Database();
//            $Database->where('paymentSourceKey',$sourceKey);
            $data = Array ( "paymentSourceName" => $sourceName, "paymentSourceDesc" => $sourceDesc, "paymentSourceCatKey" => $categoryKey, "paymentSourceLogo" => $sourceLogo,'paymentSourceKey' => $sourceKey,'PaymentSourceStatus' => 1 );
            $updateSource = $Database->insert( 'tlr_payment_sources', $data );
            if( $updateSource ){ return TRUE; }else{ return FALSE;}
        }
		
		// This method suspend or activate services provider
		public function updateServiceStatus( $action )
		{
			$AdminClass = new AdminClass();
			
			// Extract the providerKey from the status code
			$status 		= substr( $action, 0, 1 );
			$serviceKey 	= substr( $action, 1, 15 );
			$providerKey 	= substr( $action, 16 );
			
			$Database = new Database();
			if ( $status == 1 ) 
			{
				$Data = Array ( 'serviceStatus' => 0 );
				$Database -> where ( 'serviceKey', $serviceKey );
				if( $Database -> update ( 'tlr_services', $Data ) == TRUE ) { $AdminClass -> redirect( 'services?t='.$providerKey ); }
			}
			elseif ( $status == 0 ) 
			{
				$Data = Array ( 'serviceStatus' => 1 );
				$Database -> where ( 'serviceKey', $serviceKey );
				if( $Database -> update ( 'tlr_services', $Data ) == TRUE ) { $AdminClass -> redirect( 'services?t='.$providerKey ); }
			}
		}
	}
	
	$Service = new Service();
?>
	
<?php
	require_once 'Database.php'; // Include the database class
	
	class ServiceProvider 
	{
		// This method adds new service provider into the database
		public function addNew( $companyName, $companyEmail, $companyPhone, $companyLogo, $companyAddress, $aboutProvider, $serviceIDS, $providerKey, $providerCode )
		{
			$Database = new Database();
			$data = Array ( "companyName" => $companyName, "companyEmail" => $companyEmail, "companyPhone" => $companyPhone, "companyLogo" => $companyLogo, "companyAddress" => $companyAddress, "aboutProvider" => $aboutProvider, "serviceIDS" => $serviceIDS, "companyStatus" => 1, "providerKey" => $providerKey, "providerCode" => $providerCode );
			$addProvider = $Database -> insert( 'tlr_services_providers', $data );
			if( $addProvider ){ return TRUE; }
		}
        public function updateProvider( $companyName, $companyEmail, $companyPhone, $companyLogo, $companyAddress, $aboutProvider, $serviceIDS, $providerKey, $dateJoined )
        {
            $Database = new Database();
            $data = Array ( "companyName" => $companyName, "companyEmail" => $companyEmail, "companyPhone" => $companyPhone, "companyLogo" => $companyLogo, "companyAddress" => $companyAddress, "aboutProvider" => $aboutProvider, "serviceIDS" => $serviceIDS, "dateJoined" => $dateJoined );
            $Database->where('providerKey',$providerKey);
            $updateProvider = $Database -> update( 'tlr_services_providers', $data );
            if( $updateProvider == TRUE ){ return TRUE; }else{return FALSE;}
        }
		
		// This method suspend or activate services provider
		public function updateProviderStatus( $action )
		{
			// Extract the providerKey from the status code
			$status 		= substr( $action, 0, 1 );
			$providerKey 	= substr( $action, 1, 15 );
			
			$Database = new Database();
			if ( $status == 1 ) 
			{
				$Data = Array ( 'companyStatus' => 0 );
				$Database -> where ( 'providerKey', $providerKey );
				if( $Database -> update ( 'tlr_services_providers', $Data ) == TRUE ) { return TRUE; }
			}
			elseif ( $status == 0 ) 
			{
				$Data = Array ( 'companyStatus' => 1 );
				$Database -> where ( 'providerKey', $providerKey );
				if( $Database -> update ( 'tlr_services_providers', $Data ) == TRUE ) { return TRUE; }
			}
		}
	}
	
	$ServiceProvider = new ServiceProvider();
?>
	
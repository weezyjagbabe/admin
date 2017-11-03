<?php
	require_once 'Database.php'; 	// Include the database class
	
	class ImagesClass 
	{
		// This method adds new image banner into the database
		public function addImage( $imageKey, $bannerImage, $bannerLink, $bannerType )
		{
			$Database = new Database();
			$data = Array ( "imageSource" => $bannerImage, "imageKey" => $imageKey, "imageLink" => $bannerLink, "imageType" => $bannerType, "imageStatus" => 1 );
			$addImage = $Database->insert( 'tlr_bg_images', $data );
			if( $addImage ){ return TRUE; }
		}
		
		// This method suspend or activate services provider
		public function updateImageStatus( $action )
		{
			// Extract the providerKey from the status code
			$status 		= substr( $action, 0, 1 );
			$imageKey 	= substr( $action, 1, 15 );
			
			$Database = new Database();
			if ( $status == 1 ) 
			{
				$Data = Array ( 'imageStatus' => 0 );
				$Database -> where ( 'imageKey', $imageKey );
				if( $Database -> update ( 'tlr_bg_images', $Data ) == TRUE ) { return TRUE; }
			}
			
			elseif ( $status == 0 ) 
			{
				$Data = Array ( 'imageStatus' => 1 );
				$Database -> where ( 'imageKey', $imageKey );
				if( $Database -> update ( 'tlr_bg_images', $Data ) == TRUE ) { return TRUE; }
			}
		}
	}
	
	$ImagesClass = new ImagesClass();
?>
	
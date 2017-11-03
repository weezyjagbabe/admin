<?php
	require_once './models/classes/FileHandler.php'; 														// Include the file handler class
	require_once './models/classes/ServiceProvider.php'; 													// Include the service provider class
	require_once './models/classes/Service.php'; 															// Include the services class
	require_once './models/classes/ImagesClass.php'; 														// Include the ImagesClass class
	require_once './models/functions/functions.php'; 														// Include the functions file
		
	/* Add new services provider
	*  Grabs data from the form and validates them
	*  It checks if the file field is not empty and process the file accordingly
	*/

	// Check if the addProvider button is clicked and grab the form data
	if( isset( $_POST['addProvider'] ) )
	{
		$companyName				=	$_POST['companyName'];
		$companyEmail				=	$_POST['companyEmail'];
		$companyPhone				=	$_POST['companyPhone'];
		$companyLogo				=	$_FILES["companyLogo"]["name"];
		$logoTempLocation			= 	$_FILES["companyLogo"]["tmp_name"];
		$companyAddress				=	$_POST['companyAddress'];
		$aboutProvider				=	$_POST['aboutProvider'];
		
		if ( empty( $_POST['serviceIDS'] ) ) { } else { $serviceIDS	= join( $_POST['serviceIDS'] ); }
		
		// Process the file in the form if any
		if ( !empty( $companyLogo ) ) 
		{
			$imageDestination = IMAGESTOREPROVIDERS; 				// Set the image final destination
			$companyLogo = renameFile( $companyLogo, $imageDestination ); 									// Rename the logo
			
			// Check if the file is moved to the targeted location
			if( move_uploaded_file( $logoTempLocation, $companyLogo ) )
			{
				$companyLogo 		= substr( "$companyLogo", 35 ); 										// Remove dots and slashes
				$providerKey 		= generateKey(); 														// Generate activation code
				$companyPhone 		="+233" . substr( $companyPhone, 1 ); 									// Add the country code to the phone number
				$providerCode		= "TLR-SP-".date('YmdHis');
				
				// If everything looks fine then add the data into the database and return a response									
				if ( $ServiceProvider -> addNew( $companyName, $companyEmail, $companyPhone, $companyLogo, $companyAddress, $aboutProvider, $serviceIDS, $providerKey, $providerCode ) == TRUE ) 
				{
					$message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> The service provider has been added.</div>';
				}
			}
			
			// Send error message when file upload failed
			else 
			{
				$message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem uploading the logo to the remote server.</div>';
			}
		}
	}elseif( isset( $_POST['updateProvider'] ) )
    {   $serviceIDS                 =   NULL;
        $companyName				=	$_POST['companyName'];
        $companyEmail				=	$_POST['companyEmail'];
        $companyPhone				=	$_POST['companyPhone'];
        $companyLogo				=	$_FILES["companyLogo"]["name"];
        $logoTempLocation			= 	$_FILES["companyLogo"]["tmp_name"];
        $companyAddress				=	$_POST['companyAddress'];
        $aboutProvider				=	$_POST['aboutProvider'];
        $providerKey                =   $_POST['providerKey'];
        $providerCode               =   $_POST['providerCode'];
        $dateJoined                 =   $_POST['dateJoined'];

        if ( empty( $_POST['serviceIDS'] ) ) { } else { $serviceIDS	= join( $_POST['serviceIDS'] ); }

        // Process the file in the form if any
        if ( !empty( $companyLogo ) )
        {
            $imageDestination = IMAGESTOREPROVIDERS; 				// Set the image final destination
            $companyLogo = renameFile( $companyLogo, $imageDestination ); 									// Rename the logo

            // Check if the file is moved to the targeted location
            if( move_uploaded_file( $logoTempLocation, $companyLogo ) )
            {
                $companyLogo 		= substr( "$companyLogo", 35 ); 										// Remove dots and slashes	                // Generate activation code
                if(substr( $companyPhone,0,1) == 0) {
                    $companyPhone = "+233" . substr($companyPhone, 1);                                    // Add the country code to the phone number
                }
                // If everything looks fine then add the data into the database and return a response
                if ( $ServiceProvider -> updateProvider( $companyName, $companyEmail, $companyPhone, $companyLogo, $companyAddress, $aboutProvider, $serviceIDS, $providerKey, $dateJoined ) == TRUE )
                {
                    $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> The service provider has been updated.</div>';
                }else
                {
                    $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Could not update Provider</div>';
                }
            }

            // Send error message when file upload failed

        }
        else {
            if ( $ServiceProvider -> updateProvider( $companyName, $companyEmail, $companyPhone, NULL, $companyAddress, $aboutProvider, $serviceIDS, $providerKey, $dateJoined ) == TRUE )
            {
                $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> The service provider has been updated.</div>';
            }else
            {
                $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Could not update Provider</div>';
            }
        }
    }

	// Check if the addService button is clicked and grab the form data
	elseif( isset( $_POST['addService'] ) )
	{
		$serviceName				=	$_POST['serviceName'];
		$serviceLogo				=	$_FILES["serviceLogo"]["name"];
		$logoTempLocation			= 	$_FILES["serviceLogo"]["tmp_name"];
		$categoryID					=	substr( $_POST['categoryID'], 0, 1 );
		$categoryKey				=	substr( $_POST['categoryID'], 1 );
		$commissionCharge			=	$_POST['commissionCharge'];
		$serviceDesc				=	$_POST['serviceDesc'];
		$providerID					=	$_POST['providerID'];
		$providerKey				=	$_POST['providerKey'];
		
		$serviceKey = generateKey(); // Generate activation code
		
		if ( !empty( $serviceLogo ) )
		{
			$imageDestination = IMAGESTORESERVICES; 				// Set the image final destination
			$serviceLogo = renameFile( $serviceLogo, $imageDestination ); 
			
			if( move_uploaded_file( $logoTempLocation, $serviceLogo ) )
			{
				$serviceLogo 		= substr( "$serviceLogo", 35 ); 										// Remove dots and slashes
				
				// If everything looks fine then add the data into the database and return a response									
				if ( $Service -> addService( $serviceName, $categoryID, $categoryKey, $commissionCharge, $serviceDesc, $providerID, $providerKey, $serviceKey, $serviceLogo ) == TRUE ) 
				{
					$message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> Service is added.</div>';
				}
				
				// Send error message
				else 
				{
					$message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem adding the service.</div>';
				}
			}
		}

		else 
		{
			// If everything looks fine then add the data into the database and return a response									
			if ( $Service -> addService( $serviceName, $categoryID, $categoryKey, $commissionCharge, $serviceDesc, $providerID, $providerKey, $serviceKey, NULL ) == TRUE ) 
			{
				$message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> Service is added.</div>';
			}
			
			// Send error message
			else 
			{
				$message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem adding the service.</div>';
			}
		}
	}

	// Check if the uploadBanner button is clicked and grab the form data
	elseif( isset( $_POST['uploadBanner'] ) )
	{
		$bannerImage				=	$_FILES["bannerImage"]["name"];
		$bannerImageTempLocation	= 	$_FILES["bannerImage"]["tmp_name"];
		$bannerLink					=	$_POST['bannerLink'];
		$bannerType					=	$_POST['bannerType'];
		
		if ( $bannerType == "slider" ) { $imageDestination = IMAGESTORESLIDERS; }
		else {  }

		$bannerImage = renameFile( $bannerImage, $imageDestination ); 
		
		if( move_uploaded_file( $bannerImageTempLocation, $bannerImage ) )
		{
			$imageKey = generateKey(); // Generate activation code
			$bannerImage 		= substr( "$bannerImage", 35 ); 										// Remove dots and slashes
			
			// If everything looks fine then add the data into the database and return a response									
			if ( $ImagesClass -> addImage( $imageKey, $bannerImage, $bannerLink, $bannerType ) ) 
			{
				$message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> Image is uploaded succesfully!</div>';
			}
			
			// Send error message
			else 
			{
				$message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem adding the image.</div>';
			}
		}
	}
	elseif (isset( $_POST['UpdateService'])){
        $serviceName				=	$_POST['serviceName'];
        $serviceLogo				=	$_FILES["serviceLogo"]["name"];
        $logoTempLocation			= 	$_FILES["serviceLogo"]["tmp_name"];
        $categoryID					=	substr( $_POST['categoryID'], 0, 1 );
        $categoryKey				=	substr( $_POST['categoryID'], 1 );
        $commissionCharge			=	$_POST['commissionCharge'];
        $serviceDesc				=	$_POST['serviceDesc'];
//        $providerID					=	$_POST['providerID'];
        $serviceKey				=	$_POST['serviceKey'];

//        $serviceKey = generateKey(); // Generate activation code

        if ( !empty( $serviceLogo ) )
        {
            $imageDestination = IMAGESTORESERVICES; 				// Set the image final destination
            $serviceLogo = renameFile( $serviceLogo, $imageDestination );

            if( move_uploaded_file( $logoTempLocation, $serviceLogo ) )
            {
                $serviceLogo 		= substr( "$serviceLogo", 35 ); 										// Remove dots and slashes

                // If everything looks fine then add the data into the database and return a response
                if ( $Service -> updateService( $serviceName, $categoryID, $categoryKey, $commissionCharge, $serviceDesc, $serviceKey, $serviceLogo ) == TRUE )
                {
                    $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> Service Updated.</div>';
                }

                // Send error message
                else
                {
                    $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem updating service.</div>';
                }
            }
        }

        else
        {
            // If everything looks fine then add the data into the database and return a response
            if ( $Service -> updateService( $serviceName, $categoryID, $categoryKey, $commissionCharge, $serviceDesc, $serviceKey, NULL ) == TRUE )
            {
                $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> Service Updated.</div>';
            }

            // Send error message
            else
            {
                $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem updating service.</div>';
            }
        }
	} elseif (isset( $_POST['UpdateSource'])){
        $sourceName				    =	$_POST['sourceName'];
        $sourceLogo				    =	$_FILES["sourceLogo"]["name"];
        $logoTempLocation			= 	$_FILES["sourceLogo"]["tmp_name"];
        $categoryID					=	substr( $_POST['categoryID'], 0, 1 );
        $categoryKey				=	substr( $_POST['categoryID'], 1 );
        $sourceDesc				    =	$_POST['sourceDesc'];
        $sourceKey				    =	$_POST['sourceKey'];


        if ( !empty( $sourceLogo ) )
        {
            $imageDestination = IMAGESTOREFUNDS; 				// Set the image final destination
            $sourceLogo = renameFile( $sourceLogo, $imageDestination );

            if( move_uploaded_file( $logoTempLocation, $sourceLogo ) )
            {
                $sourceLogo 		= substr( "$sourceLogo", 35 ); 										// Remove dots and slashes

                // If everything looks fine then add the data into the database and return a response
                if ( $Service -> updateSource( $sourceName, $categoryKey, $sourceDesc, $sourceKey, $sourceLogo ) == TRUE )
                {
                    $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> Payment Source Updated.</div>';
                }

                // Send error message
                else
                {
                    $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem updating payment source.</div>';
                }
            }
        }

        else
        {
            // If everything looks fine then add the data into the database and return a response
            if ( $Service -> updateSource( $sourceName, $categoryKey, $sourceDesc, $sourceKey, NULL ) == TRUE )
            {
                $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> Payment Source Updated.</div>';
            }

            // Send error message
            else
            {
                $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem updating payment source.</div>';
            }
        }
    }elseif (isset( $_POST['AddSource'])){
        $sourceName				    =	$_POST['sourceName'];
        $sourceLogo				    =	$_FILES["sourceLogo"]["name"];
        $logoTempLocation			= 	$_FILES["sourceLogo"]["tmp_name"];
        $categoryID					=	substr( $_POST['categoryID'], 0, 1 );
        $categoryKey				=	substr( $_POST['categoryID'], 1 );
        $sourceDesc				    =	$_POST['sourceDesc'];
        $sourceKey				    =	generateKey();


        if ( !empty( $sourceLogo ) )
        {
            $imageDestination = IMAGESTOREFUNDS; 				// Set the image final destination
            $sourceLogo = renameFile( $sourceLogo, $imageDestination );

            if( move_uploaded_file( $logoTempLocation, $sourceLogo ) )
            {
                $sourceLogo 		= substr( "$sourceLogo", 35 ); 										// Remove dots and slashes

                // If everything looks fine then add the data into the database and return a response
                if ( $Service -> addSource( $sourceName, $categoryKey, $sourceDesc,$sourceKey, $sourceLogo ) == TRUE )
                {
                    $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> Payment Source Added.</div>';
                }

                // Send error message
                else
                {
                    $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem updating payment source.</div>';
                }
            }
        }

        else
        {
            // If everything looks fine then add the data into the database and return a response
            if ( $Service -> addSource( $sourceName, $categoryKey, $sourceDesc, $sourceKey, NULL ) == TRUE )
            {
                $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> Payment Source Added.</div>';
            }

            // Send error message
            else
            {
                $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem updating payment source.</div>';
            }
        }
    }



?>	
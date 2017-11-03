<?php
	require_once 'models/classes/EmailClass.php'; 						// Include the emailing class
	require_once 'models/classes/Database.php'; 						// Include the Database class
	
	class AdminClass 
	{
		// Add the admin details into the database
		public function registerAdmin( $adminEmail, $firstName, $lastName, $adminPassword, $adminGroup, $adminLevel )
		{
			$Database = new Database();
			$data = Array ( "adminEmail" => $adminEmail, "firstName" => $firstName, "lastName" => $lastName, "adminGroup" => $adminGroup, "adminLevel" => $adminLevel, "adminPassword" => $adminPassword, "status" => 1 );
			$Database -> insert( 'tlr_admins', $data );
			if( $Database ) { return TRUE; }
			else { return FALSE; }
		}
        public function updateAdmin( $firstName, $lastName, $adminEmail, $adminResAddress, $adminPhone, $adminID )
        {
            $Database = new Database();
            $data = Array ( "adminEmail" => $adminEmail, "firstName" => $firstName, "lastName" => $lastName, "adminResAddress" => $adminResAddress, "adminPhone" => $adminPhone );
            $Database -> where ( 'adminID', $adminID );
            if($Database -> update ( 'tlr_admins', $data )== TRUE)
            { return TRUE; }
            else { return FALSE; }
        }
		// Generate activation code
		public function activateAccount( $adminEmail, $adminActivationCode ) 
		{ 
			$Database = new Database();
			$Data = Array ( 'status' => 1, 'activationCode' => '' );
			$Database -> where ( 'adminEmail', $adminEmail );
			if( $Database -> update ( 'tlr_admins', $Data ) == TRUE ) 
			{ return TRUE; } else { return FALSE; }
		}

		// Check the admin status based on the email address sent
		public function isEmailExist( $adminEmail )
		{
			$Database = new Database();
			$Database -> where( "adminEmail", $adminEmail );
			$admin = $Database -> getOne( "tlr_admins" );
			return $status = $admin['adminEmail'];
		}

		// Check the admin status based on the email address sent
		public function adminStatus( $adminEmail )
		{
			$Database = new Database();
			$Database -> where( "adminEmail", $adminEmail );
			$admin = $Database -> getOne( "tlr_admins" );
			return $status = $admin['status'];
		}

		// Check the admin status based on the email address sent
		public function requestPasswordReset( $adminEmail, $code )
		{
			$Database = new Database();
			$cols = Array ( "adminEmail, firstName, lastName" );
			$Database -> where( "adminEmail", $adminEmail );
			$admins = $Database -> get( "tlr_admins" );
			foreach ( $admins as $admin ){ $adminEmail = $admin['adminEmail']; $firstName = $admin['firstName']; $lastName = $admin['lastName'];
			
			$EmailClass = new EmailClass();
			$from 		= COMPANYEMAIL;
			$subject	= 'Reset Password';
			
			$messageBody = $EmailClass -> emailTemplate( 'Reset Password', $adminEmail, $firstName, $lastName, $code );
			if( $EmailClass -> sendEmail( $adminEmail, $from, $subject, $messageBody ) == TRUE ) { return TRUE; } else { return FALSE; }
			}
		}

		// Check the admin status based on the email address sent
		public function resetPassword( $newPassword, $adminEmail )
		{
			$Database = new Database();
			$Data = Array ( 'adminPassword' => $newPassword );
			$Database -> where ( 'adminEmail', $adminEmail );
			if( $Database -> update ( 'tlr_admins', $Data ) == TRUE ) 
			{ return TRUE; } else { return FALSE; }
		}

		// Prepare the login details and log the admin in
		public function changePassword( $oldPassword, $newPassword, $adminID )
		{
			$Database = new Database();
			$Database -> where ( "adminID", $adminID );
			$admin = $Database -> getOne ( "tlr_admins" );
			
			if ( $adminID == $admin['adminID'] && password_verify( $oldPassword, $admin['adminPassword'] ) == TRUE ) 
			{
				$Database = new Database();
				$Data = Array ( 'adminPassword' => $newPassword );
				$Database -> where ( 'adminID', $adminID );
				if( $Database -> update ( 'tlr_admins', $Data ) == TRUE ) 
				{ return TRUE; } else { return FALSE; } 
			} 
			else { return FALSE; }
		}
		
		// Generate activation code
		public function editAccount( $adminTitle, $firstName, $lastName, $adminGender, $adminDOB, $adminRegion, $adminCity, $adminResAddress, $adminPhone, $adminID ) 
		{ 
			$Database = new Database();
			$Data = Array ( 'adminTitle' => $adminTitle, 'firstName' => $firstName, 'lastName' => $lastName, 'adminGender' => $adminGender, 'adminDOB' => $adminDOB, 'adminRegion' => $adminRegion, 'adminCity' => $adminCity, 'adminResAddress' => $adminResAddress, 'adminPhone' => $adminPhone );
			$Database -> where ( 'adminID', $adminID );
			if( $Database -> update ( 'tlr_admins', $Data ) == TRUE ) 
			{ return TRUE; } else { return FALSE; }
		}

		// Prepare the login details and log the admin in
		public function logInAdmin( $adminEmail, $adminPassword )
		{
			$Database = new Database();
			$Database -> where ( "adminEmail", $adminEmail );
			$admin = $Database -> getOne ( "tlr_admins" );
			
			if ( $adminEmail == $admin['adminEmail'] && password_verify( $adminPassword, $admin['adminPassword'] ) == TRUE ) 
			{ $_SESSION['adminSession'] = $admin['adminID']; return TRUE; }
			else { return FALSE; }
		}
		
		// Check if the admin is already logged in
		public function adminIsLoggedin()
		{
			if( isset( $_SESSION['adminSession']) > 0 ) { return TRUE; }else{ return FALSE;}
		}

		// Check if the logged in user is the supper admin
		public function isSupperAdmin()
		{
			$Database = new Database();
			$Database -> where ( "adminID", $_SESSION['adminSession'] );
			$admin = $Database -> getOne ( "tlr_admins" );
			
			if ( $admin['adminGroup'] === "Supper" && $admin['adminLevel'] === 9 ) 
			{ return TRUE; } else { return FALSE; }
		}

		// Check if the logged in user is the admin
		public function isAdmin()
		{
			$Database = new Database();
			$Database -> where ( "adminID", $_SESSION['adminSession'] );
			$admin = $Database -> getOne ( "tlr_admins" );
			
			if ( $admin['adminGroup'] === "Admin" && $admin['adminLevel'] === 8 ) 
			{ return TRUE; } else { return FALSE; }
		}

		// Check if the logged in user is the account admin
		public function isAccountAdmin()
		{
			$Database = new Database();
			$Database -> where ( "adminID", $_SESSION['adminSession'] );
			$admin = $Database -> getOne ( "tlr_admins" );
			
			if ( $admin['adminGroup'] === "Accountant" && $admin['adminLevel'] === 7 )
			{ return TRUE; } else { return FALSE; }
		}

		// Check if the logged in user is the marketing admin
		public function isMarketingAdmin()
		{
			$Database = new Database();
			$Database -> where ( "adminID", $_SESSION['adminSession'] );
			$admin = $Database -> getOne ( "tlr_admins" );
			
			if ( $admin['adminGroup'] === "Marketing" && $admin['adminLevel'] === 6 )
			{ return TRUE; } else { return FALSE; }
		}
		
		// Logout the admin
		public function logAdminOut()
		{
			session_destroy();
			unset( $_SESSION['adminSession'] );
			return TRUE;
		}
		
		// Redirect the admin to the appropriate page
		public function redirect( $url )
		{
			echo '<script>location.href=\''.$url.'\';</script>';
		}
		
		// Encrypt the admin password
		public function encryptPassword( $adminPassword )
		{
			$adminPassword = password_hash( $adminPassword, PASSWORD_DEFAULT );
			return $adminPassword;
		}

        public function generateCode( $lenth = 40 )
        {
            $range		=	array_merge( range( 'A', 'Z' ), range( 'a', 'z' ), range( 0, 9 ) );
            $out		=	'';
            for( $c = 0; $c < $lenth; $c++ )
            {
                $out .= $range[mt_rand( 0, count( $range ) -1 ) ];
            }
            return $out;
        }
	}
	
	$AdminClass = new AdminClass();
?>
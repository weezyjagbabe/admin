<?php
	require_once './models/classes/AdminClass.php'; 										// Include the database class
	require_once './models/functions/functions.php'; 										// Include the functions file
	
	// check if the admin has clicked on signup button and process the form
	if( isset( $_POST['addUser'] ) )
	{
		$firstName				=	$_POST['firstName'];
		$lastName				=	$_POST['lastName'];
		$adminGroup				=	$_POST['adminGroup'];
		$adminEmail				=	$_POST['adminEmail'];
		$adminPassword			=	$_POST['adminPassword'];
		$adminPasswordConfirm	=	$_POST['adminPasswordConfirm'];
		
		// Confirm the passwords entered
		if ( $adminPassword != $adminPasswordConfirm ) 
		{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The password you entered do not match.</div>'; }
		
		// Check if the email address entered already exist in our database
		elseif( $AdminClass -> isEmailExist( $adminEmail ) != NULL ) 
		{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The email address entered is already taken.</div>'; }
		
		// Theres nothing wrong, encrypt the password and generate activation code 
		else 
		{
			$adminPassword				=	$AdminClass -> encryptPassword( $adminPassword ); // Encript the password
			$adminLevel					=	createAdminLevel( $adminGroup ); // create admin level
			
			// Call the register admin method to add the new admin to the database and send validation message
			if( $AdminClass -> registerAdmin( $adminEmail, $firstName, $lastName, $adminPassword, $adminGroup, $adminLevel ) == TRUE )
			{ return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Check your email for activation code.</div>'; }
			else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong>  A problem occured. Try again later.</div>'; }
		}
	}

if( isset( $_POST['editUser'] ) )
{
    $firstName				=	$_POST['firstName'];
    $lastName				=	$_POST['lastName'];
    $adminID				=	$_POST['adminID'];
    $adminEmail				=	$_POST['adminEmail'];
    $adminPhone			    =	$_POST['adminPhone'];
    $adminResAddress	    =	$_POST['adminResAddress'];

    // Confirm the passwords entered
//    if ( $adminPassword != $adminPasswordConfirm )
//    { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The password you entered do not match.</div>'; }
//
//    // Check if the email address entered already exist in our database
//    elseif( $AdminClass -> isEmailExist( $adminEmail ) != NULL )
//    { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The email address entered is already taken.</div>'; }

    // Theres nothing wrong, encrypt the password and generate activation code


//        $adminPassword				=	$AdminClass -> encryptPassword( $adminPassword ); // Encript the password
//        $adminLevel					=	createAdminLevel( $adminGroup ); // create admin level

        // Call the register admin method to add the new admin to the database and send validation message
        if( $AdminClass -> updateAdmin( $firstName, $lastName, $adminEmail, $adminResAddress, $adminPhone, $adminID ) == TRUE )
        { return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Account Updated.</div>'; }
        else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong>  A problem occured. Try again later.</div>'; }

}
if(isset($_POST['cancel'])){
    $AdminClass ->redirect('users?t=admin');
}
		
	// Activate admin account
	if ( isset( $_GET['adminActivationCode'] ) ) 
	{
		$adminEmail = $_GET['adminEmail']; 
		$adminActivationCode = $_GET['adminActivationCode']; 
		
		// Send validation code to the admin
		if ( $AdminClass -> activateAccount( $adminEmail, $adminActivationCode ) == TRUE )
		{ return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Account activated. You can now sign in.</div>'; } 
	} 

	// Check if the admin has clicked on the sign in button and process the form
	if( isset( $_POST['signIn'] ) )
	{
		$adminEmail				=	$_POST['adminEmail'];
		$adminPassword			=	$_POST['adminPassword'];
		
		// Confirm the passwords entered
		if ( ( $adminEmail != NULL ) && ( $adminPassword != NULL ) ) 
		{
			// Check if the email address entered already exist in our database
			if( $AdminClass -> isEmailExist( $adminEmail ) == NULL ) 
			{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The email or password entered is incorrect.</div>'; }
			
			// Check if the admin account status is active
			elseif( $AdminClass -> adminStatus( $adminEmail ) == 0 )
			{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Your account has not been activated yet.</div>'; }

			// Check if the admin account status is suspended
			elseif( $AdminClass -> adminStatus( $adminEmail ) == 2 )
			{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Your account has been suspended. Contact Theteller for more information.</div>'; }

			// Validate the credentials and log the admin in
			else 
			{
				// If the credentials are right, log the admin in
				if ( $AdminClass -> logInAdmin( $adminEmail, $adminPassword ) == TRUE ) { $AdminClass -> redirect('dashboard'); }
				
				// The credentials are wrong. Print the error message on screen
				else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The email or password entered is incorrect.</div>'; }
			}
		}
		
		// The admin has entered nothing on both fields therefore show the error message
		else 
		{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The email or password fields cannot be empty.</div>'; }
	}
	
	// check if the admin has clicked on request update account button and process the form
	if( isset( $_POST['changePassword'] ) )
	{
		$oldPassword			=	$_POST['oldPassword'];
		$newPassword			=	$_POST['newPassword'];
		$confirmNewPassword		=	$_POST['confirmNewPassword'];
		$adminID				=	$_POST['adminID'];
		
		// Check if the old password field is not empty
		if ( !empty( $oldPassword ) ) 
		{
			if ( $newPassword == $confirmNewPassword )
			{
				$newPassword				=	$AdminClass -> encryptPassword( $newPassword ); // Encript the password
				if( $AdminClass -> changePassword( $oldPassword, $newPassword, $adminID ) == TRUE )
				{ return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Your password is changed.</div>'; }
				else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Problem occured. Please try again later.</div>'; }
			} 
			else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The new passwords entered do not match.</div>'; }
		}
		// The old password field is empty therefore send the error message
		else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The old password field cannot be empty.</div>'; }
	}
	
	// check if the admin has clicked on change password button and process the form
	if( isset( $_POST['requestPasswordReset'] ) )
	{
		$adminEmail				=	$_POST['adminEmailReset'];
		
		// Check if the email address entered exist in our database
		if( $AdminClass -> isEmailExist( $adminEmail ) != NULL ) 
		{
			$code						=	$AdminClass -> generateCode(); // Generate activation code
			// Call the reset admin password method
//            var_dump($code);
			if( $AdminClass -> requestPasswordReset( $adminEmail, $code ) == TRUE )
			{ return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Check your email for password reset.</div>'; }
			else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong>  A problem occured. Try again later.</div>'; }
		}
		else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> The email address entered does not exist.</div>'; }
	}

	// check if the admin has clicked on reset password button and process the form
	if( isset( $_POST['resetPassword'] ) )
	{
		$newPassword			=	$_POST['newPassword'];
		$confirmNewPassword		=	$_POST['confirmNewPassword'];
		$adminEmail				=	$_POST['adminEmail'];
		
		// Check if the new password and the confirm new password are the same
		if ( $newPassword == $confirmNewPassword )
		{
			$newPassword				=	$AdminClass -> encryptPassword( $newPassword ); // Encript the password
			if( $AdminClass -> resetPassword( $newPassword, $adminEmail ) == TRUE )
			{ return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Password has been reset. Sign in now</div>'; }
			else { return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong>  A problem occured. Try again later.</div>'; }
		} 
		
		// The passwords entered do not match
		else { return $message = '<div class="alert-box error"><span>Error: </span>The new passwords entered do not match.</div>'; }
	}

	// check if the admin has clicked on request update account button and process the form
	if( isset( $_POST['editAccount'] ) )
	{
		$adminTitle				=	$_POST['adminTitle'];
		$firstName				=	$_POST['firstName'];
		$lastName				=	$_POST['lastName'];
		$adminGender			=	$_POST['adminGender'];
		$adminDOB				=	$_POST['adminDOB'];
		$adminRegion			=	$_POST['adminRegion'];
		$adminCity				=	$_POST['adminCity'];
		$adminResAddress		=	$_POST['adminResAddress'];
		$adminPhone				=	$_POST['adminPhone'];
		$adminID				=	$_POST['adminID'];
		
		if ( $AdminClass -> editAccount( $adminTitle, $firstName, $lastName, $adminGender, $adminDOB, $adminRegion, $adminCity, $adminResAddress, $adminPhone, $adminID ) == TRUE )
		{ return $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong>  Your account has been updated.</div>'; } 
		else{ return $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> There was a problem updating your account. Try again later.</div>'; } 
	}
?>
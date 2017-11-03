<?php
	require_once './controllers/formProcess.php'; 											// Include the form processing file
	    session_start();
        session_destroy();
        unset( $_SESSION['adminSession'] );
	    $AdminClass->redirect('sign-in');

	if( !isset( $_SESSION['adminSession'] )) { $AdminClass -> redirect( 'sign-in' ); }
?>
<?php
	session_start();
	require_once './models/classes/Configurations.php'; 														// Include the project configuration file
	require_once './models/classes/AdminClass.php'; 																// Include the form processing file
	
																// Include the form processing file
	if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }
	if( !$AdminClass -> isSupperAdmin() ) { $AdminClass -> redirect( '404' ); }
	
	require_once './models/classes/Database.php'; 																// Include the service class
	
	$pageName = 'Delete Services'; 																			// Set the page name
															// Include the document header
    if( isset( $_GET['t'] ) ) {
        $t = $_GET['t'];
        $Database = new Database();
        $Database->where('serviceKey',$t);
        $imageLocation = $Database->getOne('tlr_services',null,['serviceLogo']);
        $imageLogo = $imageLocation['serviceLogo'];
        if($imageLogo != NULL){
            $Database = new Database();
            $Database->where('serviceKey',$t);
            $delete = $Database->delete('tlr_services',1);
            if($delete > 0){
                $folder = $_SERVER['DOCUMENT_ROOT'] .'/'.$imageLogo;
                unlink($folder);
                $message = '<div class="alert alert-success"><button class="close" data-dismiss="alert">×</button><strong>Success!</strong> Service Deleted.</div>';
                $AdminClass->redirect('providers?message='.$message);
            }else{
                $message = '<div class="alert alert-error"><button class="close" data-dismiss="alert">×</button><strong>Error!</strong> Unable to delete service.</div>';
                $AdminClass->redirect('providers?message='.$message);
            }
        }
    }
?>

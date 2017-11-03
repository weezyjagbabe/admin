<?php
session_start();
require_once './models/classes/Configurations.php'; 														// Include the project configuration file
require_once './controllers/processing.php'; 																// Include the form processing file

require_once './controllers/formProcess.php'; 																// Include the form processing file
if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }
if( !$AdminClass -> isSupperAdmin() ) { $AdminClass -> redirect( '404' ); }

require_once './models/classes/Service.php'; 																// Include the service class
if( isset( $_GET['t'] ) ) {
    $t = $_GET['t'];
    $k = $_GET['k'];
    if($t == 1){
        $Database = new Database();
        $Database->where('paymentSourceKey', $k);
        $info = $Database->update('tlr_payment_sources',[ 'paymentSourceStatus' => 0 ]);
        if($info){
            $AdminClass ->redirect('source-of-fund');
        }$AdminClass ->redirect('source-of-fund');
    }else{
        $Database = new Database();
        $Database->where('paymentSourceKey', $k);
        $info = $Database->update('tlr_payment_sources',[ 'paymentSourceStatus' => 1 ]);
        if($info){
            $AdminClass ->redirect('source-of-fund');
        }$AdminClass ->redirect('source-of-fund');
    }

}
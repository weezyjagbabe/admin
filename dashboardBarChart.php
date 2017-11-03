<?php
$pageName = "DashboardBarChart"; 																				// Set the page name

require_once './models/classes/Configurations.php'; 													// Include the configurations class
require_once './controllers/formProcess.php';
if( !$AdminClass -> adminIsLoggedin() ) { $AdminClass -> redirect( 'sign-in' ); }
//
$approved = array();
$declined = array();
$dates = array();
for ($i = 1; $i <= date('d'); $i++) {
    $thisDate = date('Y-m') . '-' . date('d', mktime(0, 0, 0, 0, $i, 0));
    if (date('Y-m-d') >= $thisDate) {
        $Database = new Database();
        $param = Array(1, $thisDate);
        $query = 'SELECT COUNT(transactionStatus) as approved FROM tlr_transactions_view WHERE transactionStatus=? AND transactionDate=?';
        $transactions = $Database->rawQuery($query, $param);
        if (!empty($transactions)) {
            foreach ($transactions as $transaction) {

                array_push($approved,$transaction['approved']);
            }
        }else{
                array_push($approved,0);
        }
    } array_push($dates,$thisDate);
}

for ($i = 1; $i <= date('d'); $i++) {
    $thisDate = date('Y-m') . '-' . date('d', mktime(0, 0, 0, 0, $i, 0));
    if (date('Y-m-d') >= $thisDate) {
        $Database = new Database();
        $param = Array(0, $thisDate);
        $query = 'SELECT COUNT(transactionStatus) as declined FROM tlr_transactions_view WHERE transactionStatus=? AND transactionDate=?';
        $transactions = $Database->rawQuery($query, $param);
        if (!empty($transactions)) {
            foreach ($transactions as $transaction) {

                array_push($declined,$transaction['declined']);
            }
        }else{
            array_push($declined,0);
        }
    }
}




//$xStart = 0; $yStart = 0; $numberOfY = 1; $length = sizeof($sinContent);
//
//$y1 = $yStart;
//$x = $xStart;
//$dataPoints = array();
//
//for($i = 0; $i < $length; $i++){
//    $y1 = $sinContent[$i] + 1;//rand(0, 10) - 5;
//    $x = $xStart + $i;

    //$dataPoint = array("x" => $xStart, "y" => $y1);
//    $dataPoint = array($x, $y1);
//    array_push($dataPoints, $dataPoint);
//}

//    return $dataPoints;



//$dataPoints = array(
//    array("y" => 6, "label" => "Apple"),
//    array("y" => 4, "label" => "Mango"),
//    array("y" => 5, "label" => "Orange"),
//    array("y" => 7, "label" => "Banana"),
//    array("y" => 4, "label" => "Pineapple"),
//    array("y" => 6, "label" => "Pears"),
//    array("y" => 7, "label" => "Grapes"),
//    array("y" => 5, "label" => "Lychee"),
//    array("y" => 4, "label" => "Jackfruit")
//);
//
//$sinContent = array(6,4,5,7,4,6,7,5,4);
//$cosContent = array(2,4,2,6,7,2,8,3,2);
//$dates = array("Apple","Mango","Orange","Banana","Pineapple","Pears","Grapes","Lychees","Jackfruit");

header('Content-Type: application/json');
echo json_encode(['labels' => $approved, 'dates' => $dates, 'extra' => $declined]);
//    echo  json_encode($dataPoints);
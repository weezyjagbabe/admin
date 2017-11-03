<?php
	require_once 'models/classes/Database.php'; 						// Include the Database class
	class Accounts 
	{
		public function getTotalTransactedAmountToday()
		{
			$Database = new Database();
			$transactionAmounts = $Database->rawQuery( "SELECT sum(transactionAmount) AS transactionAmount FROM tlr_transactions WHERE transactionDate = curdate() AND transactionStatus = 1" );
			foreach ($transactionAmounts as $transactionAmount ) 
			{
    			$transactionAmount = $transactionAmount['transactionAmount'];
			}
			return $transactionAmount;
		}
	}
	
	$Accounts = new Accounts();
?>
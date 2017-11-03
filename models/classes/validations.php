<?php
	
	class Validation 
	{
		private $error;
		
		function requiredFields( $val ) 
		{
			if ( empty( $val ) )
			{
				$this -> error = "All";
				return $this -> error; 
			}	
		}
		
		
	}
	
	$Validations = new Validation();
?>
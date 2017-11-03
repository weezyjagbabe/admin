<?php
		/*
	* This function is to separate the extension from a filE NAME.
	* It takes the file $filename as a parameter and returns the
	* file extension.
	*/
	function findexts ( $filename )
	{
		$filename = strtolower( $filename ) ;
		$exts = preg_split( "[/\\.]", $filename ) ;
		$n = count( $exts )-1;
		$exts = $exts[ $n ];
		return $exts;
	}
	
	/*
	* This function renames a file. It takes the $filename and $fileLocation
	* as parameters. Its then calls findexts fuctions to seperate the file name
	* from the extension. Finaly it will rename the file and assign it the 
	* $fileLocation variable as a returned value
	*/
	function renameFile( $filename, $imageDestination )
	{
		//Get the file extension for renaming
		$filename = findexts( $filename );
		date_default_timezone_set('Africa/Accra');
			
		$allowed_extensions = array( 'png', 'gif', 'jpg', 'jpeg', 'JPEG', 'JPG', 'mp3', 'MP3', '' );
		$fileExtention = explode( '.', $filename );
		if( in_array( $fileExtention[count( $fileExtention ) -1], $allowed_extensions ) )
		{
			//Renaming the file
			$newName = substr( md5( 'codfish' ),0,2 ) . "_" . gmdate( "Y" ) . "_" . time() . "." .$filename;
			$imageDestination = $imageDestination . $newName;
			return $imageDestination;
		}
		else { return FALSE; }
	}
?>
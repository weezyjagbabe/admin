<?php
	// Generate new key
	function generateKey()
	{
		$in 		= randomNum();						// create a random number for key
		$uniqueKey 	= alphaID ( $in );					// Generate key
		return $uniqueKey;
	}
	
	// Create a random number to generate uniqueKey
	function randomNum() 
	{
		$number = "";
		for( $i = 0; $i < 12; $i++ )
		{
			$min = ($i == 0) ? 1:0;
			$number .= mt_rand($min,9);
		}
		return $number.gmdate( "Y" ).time();
	}

	function alphaID( $in, $to_num = false, $pad_up = false, $pass_key = null )
	{
		$out		=	'';
		$index		=	'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$base		=	strlen($index);
	
		if ( $pass_key !== null ) 
		{
			// Although this function's purpose is to just make the
			// ID short - and not so much secure, with this patch 
			// you can optionally supply a password to make it harder
			// to calculate the corresponding numeric ID
	
			for ($n = 0; $n < strlen($index); $n++) 
			{
				$i[] = substr($index, $n, 1);
			}
	
			$pass_hash = hash('sha256',$pass_key);
			$pass_hash = (strlen($pass_hash) < strlen($index) ? hash('sha512', $pass_key) : $pass_hash);
	
			for ($n = 0; $n < strlen($index); $n++) 
			{
				$p[] =  substr($pass_hash, $n, 1);
			}
	
			array_multisort($p, SORT_DESC, $i);
			$index = implode($i);
		}
	
		if ($to_num) 
		{
			// Digital number  <<--  alphabet letter code
			$len = strlen($in) - 1;
	
			for ($t = $len; $t >= 0; $t--) 
			{
				$bcp = bcpow($base, $len - $t);
				$out = $out + strpos($index, substr($in, $t, 1)) * $bcp;
			}
	
			if (is_numeric($pad_up)) 
			{
				$pad_up--;
				if ($pad_up > 0) 
				{
					$out -= pow($base, $pad_up);
				}
			}
		}
	  
		else 
		{
			// Digital number  -->>  alphabet letter code
			if (is_numeric($pad_up)) 
			{
				$pad_up--;
				if ($pad_up > 0) 
				{
					$in += pow($base, $pad_up);
				}
			}
	
			for ($t = ($in != 0 ? floor(log($in, $base)) : 0); $t >= 0; $t--) 
			{
				$bcp = bcpow($base, $t);
				$a   = floor($in / $bcp) % $base;
				$out = $out . substr($index, $a, 1);
				$in  = $in - ($a * $bcp);
			}
		}
		return $out;
	}

	function createAdminLevel( $adminGroup )
	{
		if ( $adminGroup == "Admin" ) { return 8;  }
		elseif ( $adminGroup == "Accountant" ) { return 7;  }
		elseif ( $adminGroup == "Marketing" ) { return 6;  }
		elseif ( $adminGroup == "Support" ) { return 9;  }
	}
?>
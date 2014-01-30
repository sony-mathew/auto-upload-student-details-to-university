<?php


function validate_phone( $phone, $num )
	{
		$phone = trim($phone);
		$phone = preg_replace("/[^0-9]/", "", $phone);
		if( $num )
			{
				if( is_numeric($phone) )
					{
						if( strlen($phone) > 10 && strlen($phone) < 13 )
							{
								return $phone;
							}
						else
							{
								echo '<pre> --------  MISMATCH 	: 1. A phone number mismatch was found. So pushed default landphone number 04842427835.('.$phone.')</pre>';
								return '04842427835';
							}
					}
				else
					{	
						echo '<pre> --------  MISMATCH 	: 2. A phone number mismatch was found. So pushed default landphone number 04842427835. ('.$phone.')</pre>';
						return '04842427835';
					}	
			}
		else
			{

				if( is_numeric($phone) )
					{
						if( strlen($phone) == 10 )
							{
								return $phone;
							}
						else
							{
								if( strlen($phone) ==11 && $phone[0] == 0 )
									{
										return substr($phone, 1,11);
									}
								elseif( strlen($phone) ==12 && $phone[0] == 9 && $phone[1] == 1 )
									{
										return substr($phone, 2,12);
									}
								else	
									{
										echo '<pre> --------  MISMATCH 	: 1. A phone number mismatch was found. So pushed default mobile number 4842427835.('.$phone.')</pre>';
										return '4842427835';
									}	
							}
					}
				else
					{	
						echo '<pre> --------  MISMATCH 	: 2. A phone number mismatch was found. So pushed default mobile number 4842427835.('.$phone.')</pre>';
						return '4842427835';
					}	
			}	
	}


?>
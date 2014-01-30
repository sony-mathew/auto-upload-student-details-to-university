<?php

	function branch_code( $branch_str )
		{ 
			/*  <option value="1">APPLIED ELECTRONICS AND INSTRUMENTATION ENGINEERING</option>
                <option value="4">CIVIL ENGINEERING</option>
				<option value="5">COMPUTER SCIENCE AND ENGINEERING</option>
                <option value="6">ELECTRICAL AND ELECTRONICS ENGINEERING</option>
                <option value="7">ELECTRONICS AND COMMUNICATION ENGINEERING</option>
                <option value="9">INFORMATION TECHNOLOGY</option>
                <option value="10">MECHANICAL ENGINEERING</option>
			*/  
            $branch_str = preg_replace("/[^a-zA-Z]/", "", $branch_str);

			if    ( $branch_str == 'AEI')		{ return 1;	}
			elseif( $branch_str == 'CE' )		{ return 4;	}
			elseif( $branch_str == 'CSE')		{ return 5;	}
			elseif( $branch_str == 'EEE')		{ return 6;	}
			elseif( $branch_str == 'ECE')		{ return 7;	}
			elseif( $branch_str == 'IT' )		{ return 9;	}
			elseif( $branch_str == 'ME' )		{ return 10;}
			else                                { return 0;	}
		}

	function religion_code( $religion )
		{
			$religion = preg_replace("/[^a-zA-Z]/", "", $religion);

			if    ( $religion == 'HINDU')			{ return 1;	}
			elseif( $religion == 'MUSLIM' )			{ return 2;	}
			elseif( $religion == 'CHRISTIAN' )		{ return 3; }
			else                               		{ return 4;	}
				
		}	

	function district_code( $dis )
		{
			$dis = strtolower(trim($dis));
			if    ( $dis == 'trivandrum')		{ return 1;	}
			elseif( $dis == 'Kollam' )			{ return 2;	}
			elseif( $dis == 'Pathanmthita')		{ return 3;	}
			elseif( $dis == 'alleppey')			{ return 4;	}
			elseif( $dis == 'kottayam')			{ return 5;	}
			elseif( $dis == 'idukki' )			{ return 6;	}
			elseif( $dis == 'ernakulam' )		{ return 7; }
			elseif( $dis == 'trichur')			{ return 8;	}
			elseif( $dis == 'palakkad')			{ return 9;	}
			elseif( $dis == 'malappuram')		{ return 10;	}
			elseif( $dis == 'kozhikode')		{ return 11;	}
			elseif( $dis == 'wayanad' )			{ return 12;	}
			elseif( $dis == 'kannur' )			{ return 13;    }
			elseif( $dis == 'kasargod' )		{ return 14;    }
			else                        		{ return 07;	}

		}	

	function reg_no( $num )
		{
			$num = preg_replace("/[^0-9]/", "", $num);			
			if ( strlen($num) < 3 )
				{
					echo '<pre> --------  MISMATCH 	: Register number was found to wrong. Pushed default reg_no 1234567.</pre>';
					$num = '1234567'; 
				}
			return $num;	
		}		

?>                                                                                    

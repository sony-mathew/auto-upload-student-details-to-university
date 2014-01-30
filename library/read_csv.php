<?php


function read_csv( )
	{

			echo '<pre> Step 4. Trying to read the csv file.</pre>';

			$flag = 0;
			if( file_exists("./last_pushed.txt") && strlen(file_get_contents('last_pushed.txt'))>1 )
				{
					$flag = 1;
				}

			if ( ( $handle = fopen('output.csv', 'r') ) !== FALSE ) 
				{
			    	while ( ( $data = fgetcsv($handle, 1000, ',', '"' ) ) !== FALSE ) 
			    		{
			    			array_walk_recursive($data, 'sanitize');

			        		if( trim($data[0]) == 'SlNo' )  {}
			        		else
			        			{
					        		if( $flag  == 1)
					        			{
					        				if( $data[0] == file_get_contents('last_pushed.txt'))
						        				{
					        						submit_details($data);
					        						$flag = 0;							
						        				}
					        			}
					        		else
					        			{
					        				submit_details($data);
					        				file_put_contents('last_pushed.txt', $data[0]);	
					        			}
			        			}		

			    		}

			    	fclose($handle);
			    	unlink('last_pushed.txt');
				}
			else
				{
					echo '<pre> ------- Could not read the csv file. Exiting.</pre>';
					exit();					
				}	
	}

// sanitization 
function sanitize(&$item, $key) 
      { 
          if (!is_array($item)) 
          { 
              
             $item = preg_replace("/[^a-zA-Z0-9\- .,\\\\\/\(\)*&%=_$#@!]/", "", $item); 
          } 
      } 

?>
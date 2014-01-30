<?php


//url 			: 	Request to be send url
//fields 		: 	Contains the post data in array format
//ckfile 		:	path of the cookie file


function curl_request( $url, $fields = NULL)
	{

		  //proccessing the post data		
		  $fields_string = ''; 
          
          //echo var_dump($fields);
		  //checking if there is any post data
          if( !( is_null( $fields ) ) )
          	{
		          foreach($fields as $key=>$value) 
			            { 
			                  $fields_string .= $key . '=' . $value . '&'; 
			            }
			}            
          rtrim($fields_string, '&'); 
		  

          //initialisng curl 
		  $ch = curl_init(); 

          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 			// Accepts all CAs 
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt ($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6");

          //checking if there is any post data
          if( !( is_null( $fields ) ) )
          	{
	          curl_setopt($ch, CURLOPT_POST, count($fields)); 
	          curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string); 
	        }  

	      curl_setopt ($ch, CURLOPT_HEADER, true); 
		  curl_setopt ($ch, CURLOPT_REFERER, $url);   
		  curl_setopt ($ch, CURLOPT_COOKIEJAR, $GLOBALS["cookie"]);  
          curl_setopt($ch, CURLOPT_COOKIEFILE, $GLOBALS["cookie"]); 			//Uses cookies from the temp file 

          		
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 			// Tells cURL to follow redirects 
          
          return curl_exec($ch);
	}







?>
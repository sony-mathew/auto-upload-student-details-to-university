<?php


function user_login()
	{
		echo file_get_contents('./login.html');
	}

function user_authenticate( )
	{
		//upload the file
		upload();

		echo '<pre> Step 3. Trying logging in </pre>';

		$fields = array(
							'user_name' => $_POST['user'],
							'user_pass' => $_POST['pass']
						);
		$url = 'http://14.139.185.85/bTech/modules/public/loginActionPg.php';

		//remote logging in
		$page = curl_request( $url, $fields );

		//checking if logged in
		if( substr_count($page, 'RAJAGIRI SCHOOL OF ENGINEERING AND TECHNOLOGY') > 0)
			{
				echo '<pre> ------ Succesfully logged in. <pre />';
				return 1;
			}
		else 
			{
				echo '<pre> -------- Couldn\'t login. Either the page is down or Username/Password is wrong.</pre>';
				echo '<pre> -------- We recieved the following result for login request. Try Again.</pre>'.$page;
				return 0;
			}	
	}		


function upload()
	{
		$allowedExts = array("xls", "csv");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		

		if( empty($_FILES['file']['name']) && file_exists("./output.csv") )
			{
					echo '<pre> Step 1. No file was found for uploading. So retrieving data from the pre - recently uploaded file.</pre>';
			}

		elseif(in_array($extension, $allowedExts))
			{

					//uploading the file
					if ($_FILES["file"]["error"] > 0)
					    {
						    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
					    }
			    	else
				    	{
						    echo "<pre>Step 1. Upload: " . $_FILES["file"]["name"] . "-----";
						    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB </pre>";

						    if (file_exists("./" . $_FILES["file"]["name"]))      	{	unlink($_FILES["file"]["name"]);     }
						    if (file_exists("input.xls"))					  		{ 	unlink('input.xls');				 }  
						    if (file_exists("output.csv"))					  		{ 	unlink('output.csv');				 }  
						    
						    if($extension == 'xls')
						    	{
							      	move_uploaded_file($_FILES["file"]["tmp_name"],"./input.xls");
							      	echo "<pre> -------- Stored in: " . "./input.xls </pre>";

						            //converting the xls file to csv format for easy parsing  and proccessing
						            parse_xls_to_csv();
						    	}
						    elseif( $extension == 'csv') 
						    	{
							      	move_uploaded_file($_FILES["file"]["tmp_name"],"./output.csv");
							      	echo "<pre> -------- Stored in: " . "./output.csv  </pre>";  	
						    	}	  
				    	}	  	
			}
		else
			{
				echo '<pre> Step 1. Sorry the attached file extension does not match with the required extensions. You should upload either ".xls" or ".csv" file.</pre>';
				exit();
			}			
	}


?>
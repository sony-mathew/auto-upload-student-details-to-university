<?php


include_once('./library/curl_request.php');
include_once('./library/parse_xls_data.php');
include_once('./library/login.php');
include_once('./library/codes.php');
include_once('./library/phone_validate.php');
include_once('./library/submit_details.php');
include_once('./library/read_csv.php');


// Create temp file to store cookies 
$cookie = tempnam ("./tmp", "CURLCOOKIE"); 
echo $cookie;
    if( isset($_POST['user']) )
      {
                
        //STEP 1  : Authenticate_user
        $level_1 = user_authenticate();

        //if user authentication is succesfull
        if( $level_1)
          {
              //read and submit the csv file entries one by one
              read_csv();
          }
        else
          {
            exit();
          }  
      }

    else
      {
        //load the login page initilally
        user_login();
      }   

?>
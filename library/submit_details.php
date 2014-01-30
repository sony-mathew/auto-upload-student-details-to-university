<?php


function submit_details( $data)
		{

			echo '<pre> -------- Pushing details of '.$data[1].' with Sl No. :'.$data[0].' and Admission Number : '.$data[4].'.</pre>';


			$url = 'http://14.139.185.85/bTech/index.php?module=officials&page=course_selection';
			$req_result = curl_request( $url , initial_fields($data) );

			$url = 'http://14.139.185.85/bTech/index.php?module=officials&page=studentRegistration';
			//$url = 'http://14.139.185.85/bTech/index.php?module=officials&page=course_selection';
			$fields = field_set_values( $data);
			$req_result = curl_request( $url , $fields );

			//check if succesfull
			if( check_result($req_result, $data) )
				{
					echo '<pre> -------- SUCCESSFULL 	: details of '.$data[1].' with Sl No. :'.$data[0].' and Admission Number : '.$data[4].'.</pre>';
				}
			else	
				{
					echo '<pre> -------- FAILED 		: details of '.$data[1].' with Sl No. :'.$data[0].' and Admission Number : '.$data[4].'.</pre>';
				}	
			
		}
function initial_fields( $data )
		{
				$fields = array(
									'frm_branch' 			=> branch_code( $data[3] ) ,
									'frm_admn_year' 		=> '2013' ,
									'frm_admn_semester' 	=> 1 ,
									'frm_studyt_type' 		=> 1 ,
									'frm_seat_type' 		=> 1 ,
									'Submit'				=> 'Submit'
								);
				return $fields;					
		}


function field_set_values($data)
		{

				$dob = explode("/", $data[5]);
				$data[5] = $dob[1].'-'.$dob[0].'-'.$dob[2];
				$fields = array(
									'frm_branch' 			=> branch_code( $data[3] ) ,
									'frm_admn_year' 		=> '2013' ,
									'frm_admn_semester' 	=> 1 ,
									'frm_studyt_type' 		=> 1 ,
									'frm_seat_type' 		=> 1 ,
									'frm_application_no' 	=> trim( $data[4] ) ,
									'frm_fee_concession' 	=> '01',
									'frm_txtsname' 			=> trim($data[1]) , 
									'frm_rdgender' 			=> $data[6][0] ,
									'frm_txtdob' 			=> $data[5] ,
									'frm_nationality'		=> 86 ,
									'frm_religion' 			=> religion_code($data[7]) ,
									'frm_cmbCategory' 		=> 1 ,
									'frm_cmbCaste' 			=> 1 ,
									'frm_txttelephone' 		=> validate_phone($data[19],1) ,
									'frm_txtmobile' 		=> validate_phone($data[20],0) ,
									'frm_txtfather' 		=> trim($data[25]) ,
									'frm_h_name' 			=> substr( $data[10], 0, 50 ) ,
									'frm_place' 			=> trim($data[14]),
									'frm_state' 			=> 18,
									'frm_city' 				=> 7,
									'frm_taluk' 			=> 2,
									'frm_pincode' 			=> trim($data[17]),
									'frm_p_h_name' 			=> substr( $data[11], 0, 50 ),
									'frm_p_place' 			=> trim($data[14]),
									'frm_p_state' 			=> 18,
									'frm_p_city' 			=> 7,
									'frm_p_taluk' 			=> 2,
									'frm_p_pincode' 		=> trim($data[17]),
									'frm_txt_course' 		=> 'XII',
									'frm_institution' 		=> trim($data[24]),
									'frm_university' 		=> trim($data[23]),
									'frm_regno' 			=> reg_no($data[21]),
									'frm_matriculation' 	=> 'N',
									'frm_recognition' 		=> 'N',
									'frm_year_passing' 		=> trim($data[22]),
									'frm_month_pass' 		=> 'May',
									'frm_entrance_regno' 	=> '',
									'frm_entrance_rank' 	=> '',
									'eligibility' 			=> 1,
									'Submit'				=> 'Submit'
								);
				return $fields;
					
		} 

function check_result( $page, $data )
		{

			if( substr_count($page, 'Student Registration Success') > 0)
				{
					return 1;
				}
			elseif ( substr_count($page, 'Student Registration will close') > 0)
				{
					return 0;
				}
		}

?>
<?php
/*
Function for parsing the xls file and converting it to csv file.
*/

function parse_xls_to_csv()
		{
			
			echo '<pre> Step 2. Parsing the xls file.</pre>';
			//convert xls file to csv format

			require_once('./library/PHPExcel/Classes/PHPExcel.php');
 
				//Usage:
				convertXLStoCSV('input.xls','output.csv');
				 
			//due to file format and unicode formatting some special characters may come into picture
			//So cleaning that up and saving the file again	
			file_put_contents('output.csv', str_replace(chr(194), " " ,file_get_contents('output.csv')));


			echo '<pre> ------- Parsing complete.</pre>';
		}


function convertXLStoCSV($infile,$outfile)
		{
		    $fileType = PHPExcel_IOFactory::identify($infile);
		    $objReader = PHPExcel_IOFactory::createReader($fileType);
		 
		    $objReader->setReadDataOnly(true);   
		    $objPHPExcel = $objReader->load($infile);    
		 
		    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
		    $objWriter->save($outfile);
		}

?>
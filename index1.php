<?php
  
   
  
 $code  = str_pad(rand(1000000,99999999),8);
 
//The url you wish to send the POST request to
$url = "http://mv1.in/ciplaomnigel/validatePromo";

//The data you want to send via POST
$fields = [
    'mobileno'      => '7006074515',
    'code' => "$code", ];

//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);



		
		if(preg_match("/\bvalid code\b/i", $result) )
		{  
			
			$page = $_SERVER['PHP_SELF'];
			$sec = "2";
			header("Refresh: $sec; url=$page");

					print_r( $fields);
			
			echo "
			<br /> -- 		---<br />
			<br /> -- 		---<br />
			<br /> -- 		---<br />
			<br /> -- 		---<br />
			<br /> -- INVALID CODE		---<br />";
			
			
			
		} else {echo "-- FOUND ---";  die();}
	
	echo "<hr /><br /><br /><br />".$result;




?>
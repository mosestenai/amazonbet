<?php

require_once 'register.php';
echo pay(300);
/*$url = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';
  
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer'.generateToken())); //setting custom header
  
  
    $curl_post_data = array(
            //Fill in the request parameters with valid values
           'ShortCode' => '174379 ',
           'CommandID' => 'CustomerPayBillOnline',
           'Amount' => '100 ',
           'Msisdn' => ' 254719412833',
           'BillRefNumber' => '00000'
    );
  
    $data_string = json_encode($curl_post_data);
  
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
    $curl_response = curl_exec($curl);
    print_r($curl_response);
  
    echo $curl_response;*/
	?>
<?php

require_once("../Controllers/payment_process.php");
require_once("../Controllers/booking_controller.php");
session_start();
$ref=$_GET['reference'];
$curl = curl_init();

$customer_id = $_SESSION['customerId'];
$bookedslot_status = "success";
$$booked_slot_id = insertIntoBookedSlot_ctr($customer_id,$invoice_no, $currency, $bookedslot_status);
  
 curl_setopt_array($curl, array(
   CURLOPT_URL => "https://api.paystack.co/transaction/verify/:".$ref,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "GET",
   CURLOPT_HTTPHEADER => array(
     "Authorization: Bearer sk_test_9140e1b413d42984f88abc931f0e7af7218d9aab",
     "Cache-Control: no-cache",
   ),
 ));
 
 $response = curl_exec($curl);
 $err = curl_error($curl);
 $result = json_decode($response,true);

 curl_close($curl);
 
 if ($err) {
   echo "cURL Error #:" . $err;
 } else {
   echo $response;
   $amount = $result['data']['amount'];
   $currency =$result['data']['currency'];
   $payment_date=date("Y-m-d");
   $finalresult=payment_process($amount, $customer_id, $currency, $payment_Date, $booked_slot_id);
 }

?>
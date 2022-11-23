<?php 
    require_once("../Controllers/booking_controller.php");
    session_start();
    $appointment_id = $_GET['appointment_id']; 
    $s_id = $_GET['s_id'];
    $customer_id = $_SESSION['customerId']; ///use session here
    
    $optional_name = NULL; 
    $optional_email =NULL;
    
  
    $result = create_booking_ctr($appointment_id, $s_id, $customer_id, $optional_name, $optional_email);

    if($result){
        echo "success";
        header("location: ../View/booking.php");
    }else{
        echo "failed";
    }
    
?>
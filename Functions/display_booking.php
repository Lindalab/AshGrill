<?php 
    require_once("../Controllers/booking_controller.php");

    require_once("../Controllers/appointment_controller.php");

    require_once("../Controllers/service_controller.php");

    function displayAllBooking($customer_id){
        $total = 0;
        $counter = 1;
        $allbooking = get0neBookingCustomer_ctr($customer_id);
        if($allbooking){
        foreach($allbooking as $book){
            $appointment_id = $book['appointment_id'];
            $service_id = $book['s_id'];
            $book_id = $book['book_id'];             
            $appointmentDetails = getOneAppointment_ctr($appointment_id);

            $appointmentDay = $appointmentDetails['appointment_day'];

            $appointment_date = $appointmentDetails['appointment_date'];

            $appointment_time = $appointmentDetails['appointment_time'];


            $service_details = getOneService_ctr($service_id);

            $service_price = $service_details['price'];

            $service_name = $service_details['service_name'];

            $total += $service_price;

            displaybooking_row($counter,   $appointmentDay,    $appointment_date,  $appointment_time, $service_name,$service_price, $service_id, $book_id);
            $counter++;
            
        }

    }else{
        echo "no booking available";
    }
    return $total;
    }


   function displaybooking_row($counter, $day, $date, $time, $service_name, $price, $service_id, $book_id){
    echo "
    <tr>
    <th scope='row'>$counter</th>
    <td>$day</td>
    <td>$date</td>
    <td>$time</td>
    <th>$service_name</th>
    <td>$price</td>
    <td><a class='btn btn-outline-danger btn-sm' href='../Actions/delete_booking.php?book_id=$book_id' role='button'>cancel</a></td>
</tr>
    ";
   }

?>
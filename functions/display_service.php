<?php
require_once("../Controllers/service_controller.php");

function showServicesUsers_fnc()
{
    $mydata = getAllService_ctr();
    echo "<table class='table'>
    <thead class='table-dark'>
      <tr>
      <th scope='col'>Serivice Name Day</th>
        <th scope='col'>Service Price</th>
        <th scope=''>Go To Booking</th> 
      </tr>
    </thead>
    <tbody>";

    foreach ($mydata as $brand) {
        $serviceId = $brand['s_id'];
        $servicename = $brand['service_name'];
        $serviceimage= $brand['service_image'];
        $serviceprice = $brand['price'];
       // $cateName = $brand['cat_name '];
        showServicesRow_fnc($serviceId , $servicename, $serviceimage,$serviceprice);
    }

    echo "
    </tbody>
    </table>

    ";
    
}

function showServicesRow_fnc($serviceId , $servicename, $serviceimage,$serviceprice)
{
  echo "
  <tr>
  <td>$servicename</td>
    <td>$serviceprice</td>
    <td>
    <a href = 'appointment.php?service_id=$serviceId'class='btn btn-primary btn-sm active' role='button' aria-pressed='true'><i class='bi bi-x-diamond-fill'></i></a>
    </td>
  </tr>
  ";
}

?>
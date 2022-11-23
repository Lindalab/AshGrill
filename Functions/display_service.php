<?php
require_once("../Controllers/service_controller.php");

function showServicesUsers_fnc()
{
    $mydata = getAllService_ctr();

    foreach ($mydata as $brand) {
        $serviceId = $brand['s_id'];
        $servicename = $brand['service_name'];
        $serviceimage= $brand['service_image'];
        $serviceprice = $brand['price'];
        $cateName = $brand['cat_name '];
        showServicesRow_fnc($serviceId , $servicename, $serviceimage,$serviceprice,$cateName);
    }
    
}

function showServicesRow_fnc($serviceId , $servicename, $serviceimage,$serviceprice,$cateName)
{
    echo "
    <div class='card' style='width: 18rem;'>
  <img class='card-img-top' src='../$serviceimage' alt='Card image cap'>
  <div class='card-body'>
    <h5 class='card-title'>$servicename</h5>
    <p class='card-text'>Category :$cateName</p>
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'$serviceprice</li>
  </ul>
</div>
    ";
}

?>
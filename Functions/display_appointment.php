<?php
require_once("../Controllers/appointment_controller.php");

function showAppointmentUsers_fnc()
{
    $mydata = getAllAppointment_ctr();

    echo "<table class='table'>
    <thead class='table-dark'>
      <tr>
      <th scope='col'>Appointment Day</th>
        <th scope='col'>Appointment Date</th>
        <th scope='col'>Appointment Time</th>
        <th scope='col'>Book</th>
        
      </tr>
    </thead>
    <tbody>";
    foreach ($mydata as $brand) {
        $appointmentday = $brand['appointment_day'];
        $appointmentId = $brand['appointment_id'];
        $appointmentDate = $brand['appointment_date'];
        $appointmentTime = $brand['appointment_time'];
        showAppointmentRow_fnc($appointmentId,$appointmentday, $appointmentDate,$appointmentTime);
    }
    echo "
    </tbody>
</table>";
}

function showAppointmentRow_fnc($appointmentId, $appointmentday,$appointmentDate,$appointmentTime)
{
    echo "
    <tr>
    <td>$appointmentday</td>
      <td>$appointmentDate</td>
      <td>$appointmentTime</td>
      <td>
      <a href = '?appointment_id=$appointmentId'class='btn btn-primary btn-sm active' role='button' aria-pressed='true'><i class='bi bi-x-diamond-fill'></i></a>
      </td>

    </tr>
    ";
}

?>
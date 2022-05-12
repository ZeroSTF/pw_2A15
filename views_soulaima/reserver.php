<?php 
include_once '../controller/reservationC.php';
include_once '../model/reservation.php';

if(isset($_POST['IdClient']) && isset($_POST['IdProj']))
{

    $reservationC = new reservationC();
    $today = date("Y-m-d");                    
    echo $today;
    $reservation = new reservation($_POST['IdClient'],$_POST['IdProj'],$today);
    $reservationC->ajouterreservation($reservation);
    header('Location:projectionF.php');
}

?>
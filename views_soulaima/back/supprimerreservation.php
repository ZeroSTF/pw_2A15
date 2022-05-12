
<?php
include '../../controller/reservationC.php';

	if(isset($_POST['IdReserv']))
	{
	$reservationC= new reservationC();
	$reservationC->supprimerreservation($_POST["IdReserv"]);
	header('Location:reservation.php');
	}
?>
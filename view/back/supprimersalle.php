
<?php
include '../../controller/salleC.php';
$salleC= new salleC();
	$salleC->supprimersalle($_GET["IdSalle"]);
	header('Location:salle.php');
?>
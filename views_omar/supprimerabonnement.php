<?php
include '../../controller/abonnement.php';
$abonnementa=new abonnementA();
	$abonnementa->supprimerabonnement($_GET["ID_abon"]);
	header('Location:abonnement.php');
?>
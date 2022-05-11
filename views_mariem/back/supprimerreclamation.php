<?php
include '../../controller/reclamation.php';
$reclamationa=new reclamationA();
	$reclamationa->supprimerreclamation($_GET["id"]);
	header('Location:reclamation.php');
?>
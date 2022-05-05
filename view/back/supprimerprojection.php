<?php
include '../../controller/projectionC.php';
$projectionC= new projectionC();
	$projectionC->supprimerprojection($_GET["IdProj"]);
	header('Location:projection.php');
?>
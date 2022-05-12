<?php
include '../../controller/projectionC.php';

	if(isset($_POST['IdProj']))
	{
	$projectionC= new projectionC();
	$projectionC->supprimerprojection($_POST["IdProj"]);
	header('Location:projection.php');
	}
?>
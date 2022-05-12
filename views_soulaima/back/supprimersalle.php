
<?php
include '../../controller/salleC.php';

	if(isset($_POST['IdSalle']))
	{
	$salleC= new salleC();
	$salleC->supprimersalle($_POST["IdSalle"]);
	header('Location:salle.php');
	}
?>
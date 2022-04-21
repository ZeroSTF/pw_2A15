<?php
	include '../Controller/UserC.php';
	$UserC=new UserC();
	$UserC->supprimerUser($_GET["id"]);
	header('Location:afficherUser.php');
?>
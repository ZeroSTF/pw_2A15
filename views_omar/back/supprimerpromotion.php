<?php
include '../../controller/promotion.php';
$promotiona=new promotionA();
	$promotiona->supprimerpromotion($_GET["id"]);
	header('Location:promotion.php');
?>
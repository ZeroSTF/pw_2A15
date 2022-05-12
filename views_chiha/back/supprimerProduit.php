<?php
include '../../controller/Produit.php';
$Produitc= new ProduitC();
    $Produitc->supprimerProduit($_GET["idP"]);
    header('Location:Produit.php');
?>
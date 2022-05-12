<?php
include '../../controller/Categorie.php';
$Categoriec= new CategorieC();
    $Categoriec->supprimerCategorie($_GET["idC"]);
    header('Location:Categorie.php');
?>

<?php
include '../../controller/reponse.php';
$reponsea=new reponseA();
    $reponsea->supprimerreponse($_GET["id_Rep"]);
    header('Location:reponse.php');
?>
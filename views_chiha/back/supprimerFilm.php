<?php
include '../../controller/Film.php';
$Filmc= new FilmC();
    $Filmc->supprimerFilm($_GET["idf"]);
    header('Location:Film.php');
?>


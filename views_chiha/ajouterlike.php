<?php
    include_once '../controller/Film.php';

    $Filmc=new FilmC();
    echo $_POST['id_film'];


    if(isset($_POST['id_film'])){
  $liste=$Filmc->ajouterLike($_POST['id_film']); 
  header('Location:filmF.php');
    }

    ?>
<?php
    include_once '../controller/reponse.php';

    if(isset($_POST["stars"]) && isset($_POST["id_Rep"]))
    {

        $reponseA = new reponseA();
        
        $reponseA->stars($_POST["stars"],$_POST["id_Rep"]);
        header('Location:contact.php');

    }




?>
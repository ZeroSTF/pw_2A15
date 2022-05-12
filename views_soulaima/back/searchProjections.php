<?php require_once '../controller/salleC';
$salleC = new salleC(
    $salles = $salleC->affichersalle();
    if(isset($_POST['salle']) && isset($_POST['search'])  ){
        $list=$salleC->afficherprojection($_POST['salle']);
    }
    ?>
)
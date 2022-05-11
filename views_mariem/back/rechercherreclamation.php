<?php 
require_once'../controller/reponse.php';
$reponseC =new reponseC();
$reponseC = $reponseC->afficherreponse();
if (iset($_POST['genre']) && isset($_post['rechercher']))
{
    $list = $reponseC->afficherreclamation($_POST['reponse']);
}
?>
<?php include'header.php'; ?>
<div class="from-container">
    <from action="" method ="post">
        <div class="col_25">
            <label>rechercher:</label>
</div>
<div class="col-75">
    <select name="reponse" id="reponse">
        <?php
        foreach ($reponse as $reponse)
        {
            ?>
            <option 
            value="<?= $reponse['id_Rep']?>"
            <?php if (isset($POST['rechercher']) && $reponse['id_Rep'] = $POST['reponse']){?>
            selected 
        <?php}?>
        >
        <?= $reponse['nom'] ?>
            </option>
            <?php

        }
        ?>
        </select>
    </div>
    </div>
    <br>
    <div class="row">
        <input type="submit" value="rechercher" name="search">
    </div>
    </from>
    </div>
  <?php if (isset($_POST['rechercher'])){?>
    <section class="container">
        
        <div class="shop-items">
            <?php  
            foreach($list as $reclamation) {
                ?>
               <div class="shop-item">
                   <span class="shop-item-title"><?=$reclamation['etat'] ?></span>
            </div>
            <?php
            }
            ?>
            </div>
        </section>
        <?php}
        ?>

  }  
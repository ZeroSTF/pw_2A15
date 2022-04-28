<?php
    include_once '../../controller/reponse.php';

    $error = "";

    $reponse = null;

    // create an instance of the controller
    $reponseA = new reponseA();
    if (
        isset($_POST["id_Rep"]) &&    
        isset($_POST["contenu"]) &&
    isset($_POST["date_Rep"])  
    ) {
        if (
            !empty($_POST["id_Rep"]) && 
            !empty($_POST["contenu"]) && 
      !empty($_POST["date_Rep"]) 
        ) {           
            $reponse = new reponse(
                $_POST['id_Rep'],
                $_POST['contenu'], 
        $_POST['date_Rep']
            );
            $reponseA->modifierreponse($reponse, $_POST["id_Rep"]);
            header('Location:reponse.php');
        }
        else
            $error = "Missing information";
            //echo $_POST["titre"].'---'.$_POST['contenu'].'---'.$_POST["categorie"].'---'.$_POST["date"].'---'.$_POST["jaime"].'---'.$_POST["id"];

    }    
?>
<?php include'header.php'; ?>
<div id="error">
            <?php echo $error; ?>
        </div>
      
    <?php
      if (isset($_POST['id_Rep'])){
        $reponse = $reponseA->recupererreponse($_POST['id_Rep']);
        
    ?>
<div style="margin:0 auto;" class="col-md-6">
<div class="card-body">
                <form role="form" class="text-start" method="POST">
                <input style="display:none;" name="id_rep" class="form-control" value="<?php echo $reponse['id_rep']; ?>">
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">Contenu</label>
                    <input type="text" name="contenu" class="form-control" value="<?php echo $reponse['contenu']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                  <label class="form-label">Date_rep</label>
                    <input type="date" name="date_rep" class="form-control" value="<?php echo $reponse['date_rep']; ?>">
                  </div>
                  
                  

             

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Modifier</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Annuler</a>
                  </p>
                </form>
              </div>
              </div>
              <?php
    }
    ?>
              <?php include'footer.php'; ?>
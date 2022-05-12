<?php
    include_once '../../controller/abonnement.php';
  //require_once "C:/xampp/htdocs/PROJET_OMAR/config.php";
    $error = "";

    $abonnement = null;

    // create an instance of the controller
    $abonnementA = new abonnementA();
    if (
      isset($_POST["date_debutA"]) && 
        isset($_POST["date_finA"]) &&
		isset($_POST["type"]) &&		
        isset($_POST["libelle"]) &&
		isset($_POST["ID_abon"]) &&
    isset($_POST["id_client"])
        
    ) {
        if (
            !empty($_POST["date_debutA"]) && 
			!empty($_POST['date_finA']) &&
            !empty($_POST["type"]) && 
			!empty($_POST["libelle"]) && 
            !empty($_POST["ID_abon"])&&
            !empty($_POST["id_client"])
        ) {           
            $abonnement = new abonnement(
                $_POST['date_debutA'],
				$_POST['date_finA'],
                $_POST['type'], 
				$_POST['libelle'],
                $_POST['ID_abon'],
                $_POST['id_client']
            );
            $abonnementA->modifierabonnement($abonnement, $_POST["ID_abon"]);
            header('Location:abonnement.php');
        }
        else
            $error = "Missing information";
            //echo $_POST["titre"].'---'.$_POST['pourcentage'].'---'.$_POST["categorie"].'---'.$_POST["date_debut_debut"].'---'.$_POST["jaime"].'---'.$_POST["id"];

    }    
?>
<?php include'header.php'; ?>
<div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['ID_abon'])){
				$abonnement = $abonnementA->recupererabonnement($_POST['ID_abon']);
				
		?>
<div style="margin:0 auto;" class="col-md-6">
<div class="card-body">
                <form role="form" class="text-start" method="POST">
                <div class="input-group input-group-outline my-3 is-filled">
                <label class="form-label">date_debutA</label>
                    <input type="date" name="date_debutA" class="form-control" value="<?php echo $abonnement['date_debutA']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">date_finA</label>
                    <input type="date" name="date_finA" class="form-control" value="<?php echo $abonnement['date_finA']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">type</label>
                    <input type="text" name="type" class="form-control" value="<?php echo $abonnement['type']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">libelle</label>
                    <input type="text" name="libelle" class="form-control" value="<?php echo $abonnement['libelle']; ?>">
                  </div>
                  
                  
                  <input style="display:none;" name="ID_abon" class="form-control" value="<?php echo $abonnement['ID_abon']; ?>">
                  <input style="display:none;" name="id_client" class="form-control" value="<?php echo $abonnement['id_client']; ?>">
                  

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

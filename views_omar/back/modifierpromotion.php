<?php
    include_once '../../controller/promotion.php';
  //require_once "C:/xampp/htdocs/PROJET_OMAR/config.php";
    $error = "";

    $promotion = null;

    // create an instance of the controller
    $promotionA = new promotionA();
    if (
      isset($_POST["date_debut"]) && 
        isset($_POST["date_fin"]) &&
		isset($_POST["objet"]) &&		
        isset($_POST["pourcentage"]) &&
		isset($_POST["id"]) 
        
    ) {
        if (
            !empty($_POST["date_debut"]) && 
			!empty($_POST['date_fin']) &&
            !empty($_POST["objet"]) && 
			!empty($_POST["pourcentage"]) && 
            !empty($_POST["id"]) 
        ) {           
            $promotion = new promotion(
                $_POST['date_debut'],
				$_POST['date_fin'],
                $_POST['objet'], 
				$_POST['pourcentage'],
                $_POST['id']
            );
            $promotionA->modifierpromotion($promotion, $_POST["id"]);
            header('Location:promotion.php');
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
			if (isset($_POST['id'])){
				$promotion = $promotionA->recupererpromotion($_POST['id']);
				
		?>
<div style="margin:0 auto;" class="col-md-6">
<div class="card-body">
                <form role="form" class="text-start" method="POST">
                <div class="input-group input-group-outline my-3 is-filled">
                <label class="form-label">date_debut</label>
                    <input type="date" name="date_debut" class="form-control" value="<?php echo $promotion['date_debut']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">date_fin</label>
                    <input type="date" name="date_fin" class="form-control" value="<?php echo $promotion['date_fin']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">objet</label>
                    <input type="text" name="objet" class="form-control" value="<?php echo $promotion['objet']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">pourcentage</label>
                    <input type="number" name="pourcentage" class="form-control" value="<?php echo $promotion['pourcentage']; ?>">
                  </div>
                 
                  
                  
                  <input style="display:none;" name="id" class="form-control" value="<?php echo $promotion['id']; ?>">

                  

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

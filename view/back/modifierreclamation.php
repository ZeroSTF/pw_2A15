<?php
    include_once '../../controller/reclamation.php';

    $error = "";

    $reclamation = null;

    // create an instance of the controller
    $reclamationA = new reclamationA();
    if (
        isset($_POST["id"]) &&
		isset($_POST["sujet"]) &&		
        isset($_POST["contenu"]) &&
		isset($_POST["date"]) && 
        isset($_POST["etat"]) 
    ) {
        if (
            !empty($_POST["id"]) && 
			!empty($_POST['sujet']) &&
            !empty($_POST["contenu"]) && 
			!empty($_POST["date"]) && 
            !empty($_POST["etat"]) 
        ) {           
            $reclamation = new reclamation(
                $_POST['id'],
				$_POST['sujet'],
                $_POST['contenu'], 
				$_POST['date'],
                $_POST['etat']
            );
            $reclamationA->modifierreclamation($reclamation, $_POST["id"]);
            header('Location:reclamation.php');
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
			if (isset($_POST['id'])){
				$reclamation = $reclamationA->recupererreclamation($_POST['id']);
				
		?>
<div style="margin:0 auto;" class="col-md-6">
<div class="card-body">
                <form role="form" class="text-start" method="POST">
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">Sujet</label>
                    <input type="text" name="sujet" class="form-control" value="<?php echo $reclamation['sujet']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">Contenu</label>
                    <input type="text" name="contenu" class="form-control" value="<?php echo $reclamation['contenu']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                  <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control" value="<?php echo $reclamation['date']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">Etat</label>
                    <input type="text" name="etat" class="form-control" value="<?php echo $reclamation['etat']; ?>">
                  </div>
                  <input style="display:none;" name="id" class="form-control" value="<?php echo $reclamation['id']; ?>">

             

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

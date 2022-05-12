<?php
    include_once '../../Model/projection.php';
    include_once '../../Controller/projectionC.php';
    
    

    $error = "";

    // create projection
    $projection = null;

    // create an instance of the controller
    $projectionC= new projectionC();
   // var_dump($_POST["Salle"]);
   // var_dump($_POST["Date"]);
   // var_dump($_POST["Heure"]);
   // var_dump($_POST["Prix"]);
    if (
       
        isset($_POST["IdProj"]) &&		
        isset($_POST["Salle"]) &&
        isset($_POST["Date"]) &&
        isset($_POST["Heure"]) &&
        isset($_POST["Prix"]) 
    ) 
    {
        if (
            !empty($_POST["IdProj"]) &&	
            isset($_POST["Salle"]) &&
            isset($_POST["Date"]) &&
            isset($_POST["Heure"]) && 
            isset($_POST["Prix"]) 
        ) {
            $projection = new projection(
                $_POST["Idc"] 	,	
                $_POST["Id"] ,
                $_POST["Da"] ,
                $_POST["He"] ,
                $_POST["Pr"] 
            );
            $projectionC->modifierprojection($projection, $_POST["Idc"]);
        //    header('Location:projection.php');
        }
        else
            $error = "Missing information";
    }    
?>

<?php include'header.php'; ?>
<div id="error">
            <?php echo $error; ?>
        </div>
      
    <?php
      if (isset($_POST['IdProj'])){
        $projection = $projectionC->recupererprojection($_POST['IdProj']);
        
    ?>
<div style="margin:0 auto;" class="col-md-6">
<div class="card-body">
                <form role="form" class="text-start" method="POST">
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">Salle</label>
                    <input type="number" name="Salle" class="form-control" value="<?php echo $projection['Salle']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">Date</label>
                    <input type="date" name="contenu" class="form-control" value="<?php echo $projection['Date']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                  <label class="form-label">Heure</label>
                    <input type="time" name="date" class="form-control" value="<?php echo $projection['Heure']; ?>">
                  </div>
                  <div class="input-group input-group-outline my-3 is-filled">
                    <label class="form-label">Prix</label>
                    <input type="number" name="etat" class="form-control" value="<?php echo $projection['Prix']; ?>">
                  </div>
                  <input style="display:none;" name="IdProj" class="form-control" value="<?php echo $projection['IdProj']; ?>">

             

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
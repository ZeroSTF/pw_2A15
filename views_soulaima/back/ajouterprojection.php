<?php
    include_once '../../model/projection.php';
    include_once '../../controller/projectionC.php';
    
    $error = "";

    // create projection
    $projection= null;

    // create an instance of the controller
    $projectionC = new projectionC();
    if (
        isset($_POST["Salle"])&&
        isset($_POST["Date"])&&
        isset($_POST["Heure"])&&
        isset($_POST["Prix"])
    ) {
        if (
            !empty($_POST['Salle'])&&
            !empty($_POST['Date'])&&
            !empty($_POST['Heure'])&&
            !empty($_POST['Prix']) 
        ) {

            $projection = new projection(
                $_POST['Salle'],
                $_POST['Date'],
                $_POST['Heure'],
                $_POST['Prix']
            );
            $projectionC->ajouterprojection($projection);
            header('Location:projection.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<?php include'header.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
        <button><a href="projection.php">Retour à la liste des projections</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="Salle">Salle:
                        </label>
                    </td>
                    <td><input type="number" name="Salle" id="Salle" maxlength="20"></td>
                </tr>
                    <td>
                        <label for="Date">Date projection:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="Date" id="Date" >
                    </td>
                    
                    <tr>
                    <td>
                        <label for="Heure">Heure:
                        </label>
                    </td>
                    <td><input type="time" name="Heure" id="Heure"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Prix">Prix:
                        </label>
                    </td>
                    <td><input type="number" name="Prix" id="Prix"></td>
                </tr>
                
               
                
                
                   
                </tr>              
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Ajouter</button>
                  </div>
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="../pages/sign-up.html" class="text-primary text-gradient font-weight-bold">Annuler</a>
                  </p>
            </table>
        </form>
    </body>
</html>
<?php include'footer.php'; ?>
<?php
    include_once '../../model/salle.php';
    include_once '../../controller/salleC.php';
    
    $error = "";

    // create salle
    $salle= null;

    // create an instance of the controller
    $salleC = new salleC();
    if (
        isset($_POST["IdSalle"]) &&
        isset($_POST["Capacite"])
    ) {
        if (
            !empty($_POST['IdSalle']) && 
            !empty($_POST['Capacite']) 
        ) {
            $salle = new salle(
                $_POST['IdSalle'], 
                $_POST['Capacite']
            );
            $salleC->ajoutersalle($salle);
            header('Location:salle.php');
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
        <button><a href="affichersalle.php">Retour à la liste des salles</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form name="c" action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IdSalle">IdSalle
                        </label>
                    </td>
                    <td><input type="varchar" name="IdSalle" id="IdSalle" ></td>
                </tr>
				<tr>
                <td>
                        <label for="Capacite">Capacite:
                        </label>
                    </td>
                    <td><input type="number" name="Capacite" id="Capacite"></td>
                </tr>
                   
               
           
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer" onClick="return validateForm(event)" id="submit" > 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php include'footer.php'; ?>
<?php
    include_once '../../Model/salle.php';
    include_once '../../Controller/salleC.php';
    
    

    $error = "";

    // create salle
    $salle = null;

    // create an instance of the controller
    $salleC= new salleC();
    var_dump($_POST["Cap"]);
    if (
       
        isset($_POST["Id"]) &&		
        isset($_POST["Cap"]) 
    ) 
    {
        if (
            !empty($_POST["Id"]) &&	
            isset($_POST["Cap"]) 
        ) {
            $salle = new salle(
                $_POST["Id"] 	,	
                $_POST["Cap"] 
            );
            $salleC->modifiersalle($salle, $_POST["Id"]);
        //    header('Location:salle.php');
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
        <button><a href="salle.php">Retour à la liste des salles</a></button>
        <hr>
      
        <div id="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['IdSalle'])){
				$salle = $salleC->recuperersalle($_POST['IdSalle']);
				
		?>
      <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IdSalle">Id du salle:
                        </label>
                    </td>
                    <td><input type="varchar " name="Id" id="IdSalle" value="<?php echo $salle['IdSalle']; ?>" maxlength="30"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Capacite">Capacite de la salle:
                        </label>
                    </td>
                    <td><input type="number" name="Cap" id="Capacite" value="<?php echo $salle['Capacite']; ?>" maxlength="100"></td>
                </tr>        
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Modifier"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		<?php
		}
		?>
    </body>
</html>
<?php include'footer.php'; ?>
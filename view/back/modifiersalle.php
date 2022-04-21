<?php
    include_once '../../Model/salle.php';
    include_once '../../Controller/salleC.php';

    $error = "";

    // create salle
    $salle = null;

    // create an instance of the controller
    $salleC= new salleC();
    if (
       
        isset($_POST["IdSalle"]) &&		
        isset($_POST["Capacité"]) 
    ) 
    {
        if (
            !empty($_POST["IdSalle"]) &&	
            isset($_POST["Capacité"]) 
        ) {
            $salle = new salle(
                $_POST["Idsalle"] 	,	
                $_POST["Capacité"] 
            );
            $salleC->modifiersalle($salle, $_POST["IdSalle"]);
            header('Location:affichersalle.php');
        }
        else
            $error = "Missing information";
    }    
?>
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
                    <td><input type="varchar " name="IdSalle" id="IdSalle" value="<?php echo $salle['IdSalle']; ?>" maxlength="30"></td>
                </tr>
				<tr>
                    <td>
                        <label for="Capacité">Capacité de la salle:
                        </label>
                    </td>
                    <td><input type="number" name="Capacité" id="Capacité" value="<?php echo $salle['Capacité']; ?>" maxlength="20"></td>
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
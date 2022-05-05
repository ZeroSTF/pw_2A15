<?php
     include_once '../../model/Categorie.php';
    include_once '../../controller/Categorie.php';
  //require_once "C:/xampp/htdocs/web/config.php";
    $error = "";

    $Categorie = null;

    // create an instance of the controller
    $CategorieC = new CategorieC();
    if (
      
        isset($_POST["idC"]) &&
		
		    isset($_POST["nomC"]) 
        
    ) {
        if (
            !empty($_POST["idC"]) && 
			     
			
            !empty($_POST["nomC"]) 
        ) {           
            $Categorie = new Categorie(
                $_POST['idC'],
				
                $_POST['nomC']
            );
            $CategorieC->modifierCategorie($Categorie, $_POST["idC"]);
            header('Location:afficherCategorie.php');
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
        <button><a href="afficherCategorie.php">Retour à la liste des Categorie</a></button>
        <hr>
        
        <div idf="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idC'])){
				$Categorie = $CategorieC->recupererCategorie($_POST['idC']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idf">ID Categorie:
                        </label>
                    </td>
                    <td><input type="varchar" name="idC" idf="idC" value="<?php echo $Categorie['idC']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="nomC">Nom Categorie:
                        </label>
                    </td>
                    <td><input type="varchar" name="nomC" idC="nomC" value="<?php echo $Categorie['nomC']; ?>" maxlength="20"></td>
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

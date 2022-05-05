<?php
     include_once '../../model/Produit.php';
    include_once '../../controller/Produit.php';
  //require_once "C:/xampp/htdocs/web/config.php";
    $error = "";

    $Produit = null;

    // create an instance of the controller
    $ProduitC = new ProduitC();
    if (
      
        isset($_POST["prix"]) &&
		    isset($_POST["libellee"]) &&		
        isset($_POST["descriptions"]) &&
		    isset($_POST["idP"]) 
        
    ) {
        if (
            !empty($_POST["prix"]) && 
			      !empty($_POST["libellee"]) &&
            !empty($_POST["descriptions"]) && 
            !empty($_POST["idP"]) 
        ) {           
            $Produit = new Produit(
                $_POST['prix'],
				$_POST['libellee'],
                $_POST['descriptions'], 
                $_POST['idP']
            );
            $ProduitC->modifierProduit($Produit,$_POST["idP"]);
            header('Location:afficherProduit.php');
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
        <button><a href="afficherProduit.php">Retour à la liste des Produit</a></button>
        <hr>
        
        <div idP="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idP'])){
				$Produit = $ProduitC->recupererProduit($_POST['idP']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idP">idP:
                        </label>
                    </td>
                    <td><input type="number" name="idP" idP="idP" value="<?php echo $Produit['idP']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input type="number" name="prix" idP="prix" value="<?php echo $Produit['prix']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="libellee">libellee:
                        </label>
                    </td>
                    <td><input type="text" name="libellee" idP="libellee" value="<?php echo $Produit['libellee']; ?>" maxlength="20"></td>
                </tr>
                       
                <tr>
                    <td>
                        <label for="descriptions">descriptions:
                        </label>
                    </td>
                    <td><input type="text" name="descriptions" idP="descriptions" value="<?php echo $Produit['descriptions']; ?>" maxlength="20"></td>
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

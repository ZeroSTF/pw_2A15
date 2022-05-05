<?php
    include_once '../../model/Produit.php';
    include_once '../../controller/Produit.php';

    $error = "";

    // createProduit 
    $Produit  = null;

    // create an instance of the controller
    $ProduitC = new ProduitC();
   
    if (
        isset($_POST["idP"]) &&
        isset($_POST["prix"]) &&       
        isset($_POST["libellee"]) &&
        isset($_POST["descriptions"])
    ) {
        if (
          !empty($_POST['idP']) && 
            !empty($_POST['prix']) &&
            !empty($_POST['libellee']) &&     
            !empty($_POST['descriptions'])
        ) {
            $Produit  = new Produit (
                $_POST['idP'],
                $_POST['prix'],
                $_POST['libellee'], 
                $_POST['descriptions']
            );
            var_dump($Produit);
            $ProduitC->ajouterProduit ($Produit );
            header('Location:afficherProduit.php');
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
        <button><a href="afficherListereponse s.php">Retour à la liste des Produits</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
            <td>
                        <label for="idP">ID Produit:
                        </label>
                    </td>
                    <td><input type="number" name="idP" id="idP" maxlength="20"></td>
                    
                    <tr>
                    <td>
                        <label for="prix">prix:
                        </label>
                    </td>
                    <td><input type="number" name="prix" id="prix" maxlength="50"></td>
                    </tr>
                    
                    <tr>
                    <td>
                        <label for="libellee ">Libelleé :
                        </label>
                    </td>
                    <td><input type="text" name="libellee" id="libellee" maxlength="50"></td>
                </tr>
                
                <tr>
                    
                </tr>
                <tr>
                <td>
                        <label for="descriptions">Descriptions:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="descriptions" id="descriptions" >
                    </td>
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
<?php
    include_once '../../model/Categorie.php';
    include_once '../../controller/Categorie.php';

    $error = "";

    // createCategorie 
    $Categorie  = null;

    // create an instance of the controller
    $CategorieC = new CategorieC();
   
    if (
        isset($_POST["idC"]) &&
        
        isset($_POST["nomC"])
    ) {
        if (
          !empty($_POST['idC']) && 
                
            !empty($_POST['nomC'])
        ) {
            $Categorie  = new Categorie (
                $_POST['idC'],
                
                $_POST['nomC']
            );
      //var_dump($Categorie);
            $CategorieC->ajouterCategorie ($Categorie );
            header('Location:afficherCategorie.php');
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
        <button><a href="afficherListereponse s.php">Retour à la liste des Categorie</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
               
                    
                    
                    <tr>
                    <td>
                        <label for="idC ">ID Categorie :
                        </label>
                    </td>
                    <td><input type="text" name="idC " id="idC" ></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="nonC">Nom Categorie:
                        </label>
                    </td>
                    <td><input type="text" name="idC" id="idC" ></td>
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
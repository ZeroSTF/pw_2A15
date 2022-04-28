<?php
    include_once '../../controller/reponse.php';

    $error = "";

    // create promotion 
    $reponse  = null;

    // create an instance of the controller
    $reponseA = new reponseA();
    if (
        isset($_POST["date_Rep"])&&
        isset($_POST["contenu"]) &&        
       isset($_POST["id_Rep"])

    ) {
        if (
            !empty($_POST["date_Rep"]) && 
            !empty($_POST["contenu"]) &&
            !empty($_POST["id"])
        ) {
            $promotionA  = new promotionA (
                $_POST['date_Rep'],
                $_POST['contenu'],
                $_POST['id_Rep']
            );
            $reponseA->ajouterreponse ($reponse );
            header('Location:afficherListereponse s.php');
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
        <button><a href="afficherListereponse s.php">Retour à la liste des reponse s</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
               
                    <td>
                        <label for="date_Rep">Date reponse:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_REp" id="date_Rep" >
                    </td>
                    
                    <tr>
                    <td>
                        <label for="contenu ">contenu :
                        </label>
                    </td>
                    <td><input type="text" name="contenu " id="contenu" maxlength="50"></td>
                </tr>
                
                <tr>
                    <td>
                        <label for="id_Rep">id_Rep:
                        </label>
                    </td>
                    <td><input type="text" name="id_Rep" id="id_Rep" maxlength="20"></td>
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
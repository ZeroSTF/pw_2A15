<?php
    include_once '../../model/Film.php';
    include_once '../../controller/Film.php';

    $error = "";

    // createfilm 
    $Film  = null;

    // create an instance of the controller
    $FilmC = new FilmC();
   
    if (
        isset($_POST["idf"]) &&
        isset($_POST["titre"]) &&       
        isset($_POST["descriptions"]) &&
        isset($_POST["dateS"])
    ) {
        if (
          !empty($_POST['idf']) && 
            !empty($_POST['titre']) &&
            !empty($_POST['descriptions']) &&     
            !empty($_POST['dateS'])
        ) {
            $Film  = new Film (
                $_POST['idf'],
                $_POST['titre'],
                $_POST['descriptions'], 
                $_POST['dateS']
            );
            var_dump($Film);
            $FilmC->ajouterFilm ($Film );
            header('Location:afficherFilm.php');
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
        <button><a href="afficherListereponse s.php">Retour à la liste des Films</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
            <td>
                        <label for="idf">ID Film:
                        </label>
                    </td>
                    <td><input type="number" name="idf" id="idf" maxlength="20"></td>
                    
                    <tr>
                    <td>
                        <label for="titre">Titre:
                        </label>
                    </td>
                    <td><input type="varchar" name="titre" id="titre" maxlength="50"></td>
                    </tr>
                    
                    <tr>
                    <td>
                        <label for="descriptions ">Discriptions :
                        </label>
                    </td>
                    <td><input type="text" name="descriptions" id="descriptions" maxlength="50"></td>
                </tr>
                
                <tr>
                    
                </tr>
                <tr>
                <td>
                        <label for="dateS">Date Sortie:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dateS" id="dateS" >
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
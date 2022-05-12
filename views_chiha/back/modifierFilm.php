<?php
     include_once '../../model/Film.php';
    include_once '../../controller/Film.php';
  //require_once "C:/xampp/htdocs/web/config.php";
    $error = "";

    $Film = null;

    // create an instance of the controller
    $FilmC = new FilmC();
    if (
      
        isset($_POST["titre"]) &&
		    isset($_POST["descriptions"]) &&		
        isset($_POST["dateS"]) &&
		    isset($_POST["idf"]) 
        
    ) {
        if (
            !empty($_POST["titre"]) && 
			      !empty($_POST["descriptions"]) &&
            !empty($_POST["dateS"]) && 
            !empty($_POST["idf"]) 
        ) {           
            $Film = new Film(
                $_POST['titre'],
				        $_POST['descriptions'],
                $_POST['dateS'], 
                $_POST['idf']
            );
            $FilmC->modifierFilm($Film,$_POST["idf"]);
            header('Location:afficherFilm.php');
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
        <button><a href="afficherFilm.php">Retour à la liste des film</a></button>
        <hr>
        
        <div idf="error">
            <?php echo $error; ?>
        </div>
			
		<?php
			if (isset($_POST['idf'])){
				$Film = $FilmC->recupererFilm($_POST['idf']);
				
		?>
        
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idf">idf:
                        </label>
                    </td>
                    <td><input type="string" name="idf" idf="idf" value="<?php echo $Film['idf']; ?>" maxlength="20"></td>
                </tr>
				<tr>
                    <td>
                        <label for="titre">titre:
                        </label>
                    </td>
                    <td><input type="text" name="titre" idf="titre" value="<?php echo $Film['titre']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="descriptions">descriptions:
                        </label>
                    </td>
                    <td><input type="text" name="descriptions" idf="descriptions" value="<?php echo $Film['descriptions']; ?>" maxlength="20"></td>
                </tr>
                       
                <tr>
                    <td>
                        <label for="dateS">dateS:
                        </label>
                    </td>
                    <td><input type="date" name="dateS" idf="dateS" value="<?php echo $Film['dateS']; ?>" maxlength="20"></td>
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

<?php
    include_once '../Model/User.php';
    include_once '../Controller/UserC.php';

    $error = "";

    // create User
    $User = null;

    // create an instance of the controller
    $UserC = new UserC();
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
        isset($_POST["email"]) && 
        isset($_POST["password"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["password"])
        ) {
            $User = new User(
				$_POST['nom'],
                $_POST['prenom'], 
                $_POST['email'],
                $_POST['password']
            );
            $UserC->ajouterUser($User);
            header('Location:afficherUser.php');
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
        <button><a href="affichereUser.php">Retour à la liste des Users</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
				<tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">Prenom:
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Adresse mail:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" id="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="password">Mot de Passe:
                        </label>
                    </td>
                    <td>
                        <input type="password" name="password" id="password" >
                    </td>
                </tr>              
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
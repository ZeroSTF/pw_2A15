<?php
    include_once '../../controller/abonnement.php';

    $error = "";

    // create promotion 
    $abonnement  = null;

    // create an instance of the controller
    $abonnementA = new abonnementA();
    if (
        isset($_POST["date_debutA"])&&
		isset($_POST["date_finA"]) &&		
        isset($_POST["type"]) &&
		isset($_POST["libelle"]) && 
       
        
        isset($_POST["ID_abon"])&&
        isset($_POST["id_client"])

    ) {
        if (
            !empty($_POST["date_debutA"]) && 
			!empty($_POST['date_finA']) &&
            !empty($_POST["type"]) && 
			!empty($_POST["libelle"]) && 
           
            !empty($_POST["ID_abon"])&&
            !empty($_POST["id_client"])

        ) {
            $abonnement = new abonnement (
                $_POST['date_debutA '],
				$_POST['date_finA'],
                $_POST['type'], 
				$_POST['libelle'],
               
                $_POST['ID_abon'],
                $_POST['id_client']
            );
            $abonnementA->ajouterabonnement ($abonnement );
            header('Location:afficherListeabonnement s.php');
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
        
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form action="" method="POST">
            <table border="1" align="center">
               
                    <td>
                        <label for="date_debutA">Date debutA:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_debutA" id="date_debutA" >
                    </td>
                    <td>
                        <label for="date_finA">Date finA:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_finA" id="date_finA" >
                    </td>
                    <tr>
                    <td>
                        <label for="type ">type :
                        </label>
                    </td>
                    <td><input type="text" name="type " id="type" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="libelle ">libelle :
                        </label>
                    </td>
                    <td><input type="text" name="libelle" id="libelle" maxlength="20"></td>
                </tr>

                <tr>
                    <td>
                        <label for="ID_abon">ID_abon:
                        </label>
                    </td>
                    <td><input type="text" name="ID_abon" id="ID_abon" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="id_client">id_client:
                        </label>
                    </td>
                    <td><input type="text" name="id_client" id="id_client" maxlength="20"></td>
                </tr>
                
                   
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
<?php include'footer.php'; ?>
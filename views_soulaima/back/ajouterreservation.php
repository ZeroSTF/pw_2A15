<?php
    include_once '../../model/reservation.php';
    include_once '../../controller/reservationC.php';
    
    $error = "";

    // create reservation
    $reservation= null;

    // create an instance of the controller
    $reservationC = new reservationC();
    if (
        isset($_POST["IdReserv"]) &&
        isset($_POST["IdClient"]) &&
        isset($_POST["Projection"]) &&
        isset($_POST["DateR"])
    ) {
        if (
            !empty($_POST['IdReserv']) &&
            !empty($_POST['IdClient']) &&
            !empty($_POST['Projection']) && 
            !empty($_POST['DateR']) 
        ) {
            $reservation = new reservation(
               
                $_POST['IdReserv'], 
                $_POST['IdClient'], 
                $_POST['Projection'], 
                $_POST['DateR']
            );
            $reservationC->ajouterreservation($reservation);
            header('Location:reservation.php');
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
        <button><a href="reservation.php">Retour à la liste des reservations</a></button>
        <hr>
        
        <div id="error">
            <?php echo $error; ?>
        </div>
        
        <form name="c" action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="IdReserv">IdReserv
                        </label>
                    </td>
                    <td><input type="number" name="IdReserv" id="IdReserv" ></td>
                </tr>
                <tr>
                <td>
                        <label for="IdClient">IdClient
                        </label>
                    </td>
                    <td><input type="number" name="IdClient" id="IdClient" ></td>
                </tr>
                <tr>
                <td>
                        <label for="Projection">Projection
                        </label>
                    </td>
                    <td><input type="number" name="Projection" id="Projection" ></td>
                </tr>
               
				<tr>
                <td>
                        <label for="DateR">DateR:
                        </label>
                    </td>
                    <td><input type="date" name="DateR" id="DateR"></td>
                </tr>
                   
               
           
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer" onClick="return validateForm(event)" id="submit" > 
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
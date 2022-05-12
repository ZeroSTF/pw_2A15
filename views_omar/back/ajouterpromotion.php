<?php
    include_once '../../controller/promotion.php';
	 require_once '../../PHPMailer-5.2-stable/PHPMailerAutoload.php';
    $error = "";

    // create promotion 
    $prmotion  = null;
    
    
 
    // create an instance of the controller
    $promotionA = new promotionA();
    if (
        isset($_POST["date_debut"])&&
		isset($_POST["date_fin"]) &&		
        isset($_POST["objet"]) &&
		isset($_POST["pourcentage"]) && 
       
        
        isset($_POST["id"])

    ) {
       

        if (
            !empty($_POST["date_debut"]) && 
			!empty($_POST['date_fin']) &&
            !empty($_POST["objet"]) && 
			!empty($_POST["pourcentage"]) && 
           
            !empty($_POST["id"])
        ) {
            $promotion = new promotion ($_POST['date_debut'],$_POST['date_fin'],$_POST['objet'], $_POST['pourcentage'],null);
            $promotionA->ajouterpromotion($promotion);
            $mail = new PHPMailer;

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'cineprod12@gmail.com';                 // SMTP username
    $mail->Password = '20260377';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    
    $mail->setFrom('cineprod12@gmail.com', 'Promotion');
    $mail->addAddress("omar.abderrahmen@esprit.tn", 'Nouveau Promotion');     // Add a recipient
    
    $mail->Subject = 'Notification';
   
    $msg="Nouveau promtion De " .  $_POST['date_debut'] . " Au " .  $_POST['date_fin'] . " , " .  $_POST['objet'] .  $_POST['pourcentage'];
   
    $mail->Body    = "<h1>".$msg."<h1>";
    $mail->AltBody = 'il y a une promotion dans notre site web';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
 }
else
    $error = "Missing information";
           
    }
    



    /*$promotionA = new promotionA();
    if (
        isset($_POST["date_debut"])&&
        isset($_POST["date_fin"]) && 
        isset($_POST["objet"]) && 
        isset($_POST["pourcentage"]) &&          
       isset($_POST["id"])

    ) {
        if (
            !empty($_POST["date_debut"]) && 
            !empty($_POST["date_fin"]) &&
            !empty($_POST["objet"]) &&
            !empty($_POST["pourcentage"]) &&
            !empty($_POST["id"])
        ) {
            $promotionA  = new promotionA (
                $_POST['date_debut'],
                $_POST['date_fin'],
                $_POST['objet'],
                $_POST['pourcentage'],
                $_POST['id']
            );
            $promotionA->ajouterpromotion ($promotion );
            header('Location:afficherListepromotions.php');



} else {
    echo 'Message has been sent';
}





        }
        else
            $error = "Missing information";*/
    }

    
?>
<?php include 'header.php'; ?>
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
                        <label for="date_debut">Date debut:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_debut" id="date_debut" >
                    </td>
                    <td>
                        <label for="date_fin">Date fin:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_fin" id="date_fin" >
                    </td>
                    <tr>
                    <td>
                        <label for="objet ">objet :
                        </label>
                    </td>
                    <td><input type="text" name="objet" id="objet" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="pourcentage ">pourcentage :
                        </label>
                    </td>
                    <td><input type="text" name="pourcentage" id="pourcentage" maxlength="20"></td>
                </tr>

                <tr>
                    <td>
                        <label for="id">id:
                        </label>
                    </td>
                    <td><input type="text" name="id" id="id" maxlength="20"></td>
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
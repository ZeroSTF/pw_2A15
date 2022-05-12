<?php
    include_once '../../controller/reponse.php';
    require_once '../../PHPMailer-5.2-stable/PHPMailerAutoload.php';

    $error = "";

    // create promotion 
    $reponse  = null;

  


    $reponseA = new reponseA();
    if (
        isset($_POST["date_Rep"])&&
        isset($_POST["contenu"]) &&        
       isset($_POST["id_Rep"])

    ) {
        if (
            !empty($_POST["date_Rep"]) && 
            !empty($_POST["contenu"]) &&
            !empty($_POST["id_Rep"])
        ) {

              // create an instance of the controller


              $mail = new PHPMailer;

              $mail->isSMTP();                                      // Set mailer to use SMTP
              $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
              $mail->SMTPAuth = true;                               // Enable SMTP authentication
              $mail->Username = 'cineprod12@gmail.com';                 // SMTP username
              $mail->Password = '20260377';                           // SMTP password
              $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
              $mail->Port = 587;                                    // TCP port to connect to
              
              $mail->setFrom('cineprod12@gmail.com', 'Reponse');
              $mail->addAddress("nasreddine1234@gmail.com", 'Reponse reclamation');     // Add a recipient
              
              $mail->Subject = 'Notification';
              $msg="Date : " . $_POST['date_Rep'] . " Contenu : " . $_POST['contenu'] . "";
              $mail->Body    = '<h1>Reponse reclamation ' . $msg . '<h1>';
              $mail->AltBody = 'il y a une réponse';
              
              if(!$mail->send()) {
                  echo 'Message could not be sent.';
                  echo 'Mailer Error: ' . $mail->ErrorInfo;

                  
            $promotionA  = new promotionA (
                $_POST['date_Rep'],
                $_POST['contenu'],
                $_POST['id_Rep']
            );
            $reponseA->ajouterreponse ($reponse );
            header('Location:afficherListereponse s.php');



} else {
    echo 'Message has been sent';
}





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
                        <label for="date_Rep">Date reponse:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="date_Rep" id="date_Rep" >
                    </td>
                    
                    <tr>
                    <td>
                        <label for="contenu ">contenu :
                        </label>
                    </td>
                    <td><input type="text" name="contenu" id="contenu" maxlength="50"></td>
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
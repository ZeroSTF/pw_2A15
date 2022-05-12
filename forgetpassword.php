<?php
$to_email = $_POST['Email'];
$subject = "Your Flick account password";
$body = "Your Flick account password is:".$_POST['pwd'];
$headers = "";
 
if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
} else {
    echo "Email sending failed...";
}

	echo "<script>alert('Register successful');</script>";

?>
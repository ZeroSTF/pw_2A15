<?php 
include_once('C:\xampp\htdocs\projet\Model\User.php');
include_once('C:\xampp\htdocs\projet\Controller\UserC.php');

	$username=$_POST['Username'];
	$email=$_POST['Email'];
	$password=$_POST['Password'];
    $number = "";
    $error= "";
    $type = "U";
    if ($password){
        if(strlen($password) < 8){
           $error.= "Password too short!! <br>";
        }
        if(!preg_match("#[0-9]+#",$password)){
            
            $error .=  "Password must include at least one number!! <br>";
        }
        if (!preg_match("#[a-zA-Z]+#",$password)){
            $error .= "Password must include at least one letter!! <br>";
        }
    }
    if ($error !=""){
        echo "<script>alert('ERROR :  ".$error."');</script>";
    }
    else{
        $requete ="SELECT * FROM user WHERE email='$email' OR username='$username'";
            $config = config::getConnexion();
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                $counter=count($result);

if($counter>0)
{
	echo "<script>alert('Email or username already in use.');</script>";
} else{
    $Usert=new User(0,"str","str","str","b");
	$Usert->setUsername($username);
    $Usert->setEmail($email);
    $Usert->setpwd($password);
     $Usert->setType('U');
$Usertt= new UserC();
$Usertt->ajouterUser($Usert);

   // $msg=mysqli_query($con,"INSERT INTO users (id,username,email,password,type) VALUE('$number', '$username','$email','$enc_password','$type')");


	echo "<script>alert('Register successful');</script>";
}
    }
?>
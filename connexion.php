<?php session_start();
require_once('config.php');

//Code for Registration 
if(isset($_POST['signup']))
{
	$username=$_POST['nameR'];
	$email=$_POST['userR'];
	$password=$_POST['passR'];
    $enc_password=$password;
    $length = rand(4,11);
    $number = "";
for ($i=0; $i < $length; $i++){
    $new_rand = rand(0,9);
    $number = $number . $new_rand;

    }
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
$sql=mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
$row=mysqli_num_rows($sql);
if($row>0)
{
	echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
} else{
    $msg=mysqli_query($con,"INSERT INTO users (id,username,email,password,type) VALUE('$number', '$username','$email','$enc_password','$type')");

if($msg)
{
	echo "<script>alert('Register successfully');</script>";
}
}
    }
}

// Code for login 
if(isset($_POST['signinb']))
{
$password=$_POST['passS'];
$dec_password=$password;
$useremail=$_POST['userS'];

$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
if (($num['type']=="U")||($num['type']=="D")||($num['type']=="I")){
    
$extra="webb/index.html";
$_SESSION['login']=$_POST['userS'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['username'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
if ($num['type']=="A")
{
    $extra="admin/manage-users.php";
    $_SESSION['login']=$num['username'];
    $_SESSION['id']=$num['id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}

}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
//header("location:http://$host$uri/$extra");
exit();
}
}

//Code for Forgot Password
/*
if(isset($_POST['send']))
{
$femail=$_POST['femail'];

$row1=mysqli_query($con,"select email,password from users where email='$femail'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{
$email = $row2['email'];
$subject = "Information about your password";
$password=$row2['password'];
$message = "Your password is ".$password;
mail($email, $subject, $message, "From: $email");
echo  "<script>alert('Your Password has been sent Successfully');</script>";
}
else
{
echo "<script>alert('Email not register with us');</script>";	
}
}*/?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> SIGN IN</title>
        <link href="lr.css" rel="stylesheet" type="text/css" media="all" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"  />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeit/4.4.1/typeit.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/spectrum/1.8.0/spectrum.min.css"> 
    
   </head>
    <body id="main">
        <iframe id="videoMusic"  src="https://www.youtube.com/embed/r30D3SW4OVw?enablejsapi=1"  style="position: absolute; top: -9999px; left: -9999px; width:100px; height:100px;" ></iframe>
      
        <div id="containerSign">
            <div id="sideSign" onclick="openSign()">SIGN IN</div>
            <div id="sign">
            <!--------------------------------------------------------------------->
            <!--LOGIN FORM --> 

               <form action="#" id="mfs" method="post">
                <div class="inputView">      
                    <input name="userS" id="userS" type="text" required>
                    <span class="upIn"></span>
                    <span class="lbl"></span>
                    <label>Email</label>
                </div>

                <div class="inputView">      
                    <input name="passS" id="passS" type="password" required>
                    <span class="upIn"></span>
                    <span class="lbl"></span>
                    <label>Password</label>
                </div>
                <a href="forgetpassword/index.php">Forgot your password?</a>
                
                <a href="webb/index.html" target="_blank"> 
                <input  id="okS" name="signinb" type="submit" value="SIGN IN" onclick=""></a>
                
                </form>    
            <!--------------------------------------------------------------------->
            </div> 
             <div id="okSign">Please, register first...</div>
        </div>    
        
        
        
        
        <div id="containerReg">
            <div id="sideReg" onclick="openReg()">REGISTER</div>
            
            <div id="reg">


                 <!-- Resgister -->

                <div class="inputView">  
                <form action="" id="mfr"  method="post" enctype="multipart/form-data">    
                    <input  name="nameR" id="nameR" type="text" class="inputView" required/>
                    <label>Username</label>
                </div>
                
                <div class="inputView">      
                    <input name="userR" id="userR" type="email"  class="inputView" />
                    <label>Email</label>
                </div>

                <div class="inputView">      
                    <input  name="passR" id="passR" type="password"  class="input"required />  
                    <label>Password</label>
                </div>
                        
                    <input  name="signup" id="okR" type="submit" value="REGISTER">
                
                </form>    
            </div> 

            <!------------------------------------------------------------------------------------------------>
            
            <div id="okReg">Registration is successful!<br>Please sign in...</div>
        </div>
    
    
     
    <div id="final">
         <div id="mainBox">
        <div id="msgBox">
            <div id="t">
            <div id="text"></div>
            </div>
            <img class="logoMenu" id="msgLogo" src="http://chittagongit.com//images/memo-icon/memo-icon-15.jpg" alt="WELCOME"> 
        </div>
        <div id="musicBox">
            <div id="musicSubBox">
                <div class="songSrc" id="song1">&#10146; TRY</div>
                <div class="songSrc" id="song2">&#10146; NEW RULES (remix)</div>
                <div class="songSrc" id="song3">&#10146; MILION REASONS</div>
                
                <div class="songSrc" id="song4">&#10146; LAYLA</div>
                <div class="songSrc" id="song5">&#10146; YOU ARE SO BEAUTIFUL</div>
                <div class="songSrc" id="song6">&#10146; NOTHING ELSE MATTERS</div>
               
                <div class="songSrc" id="song7">&#10146; THE PHANTOM OF THE OPERA</div>
                <div class="songSrc" id="song8">&#10146; CARMEN HANABERA</div>
                 <div class="songSrc" id="song9">&#10146; BOLERO</div>
                 <br/>
<input id="vol-control" type="range" min="0" max="100" step="1" oninput="setVolume(this.value)" onchange="setVolume(this.value)">

            </div>
            <img class="logoMenu" id="musicLogo" src="http://chittagongit.com//images/music-note-icon-png/music-note-icon-png-11.jpg" alt="MUSIC">
            
        </div>
        <div id="gameBox">
            <div id="mainCardBox">
                <span id="btnBox">
                <span class="btn">
                <a onclick="newGame();">New Game</a>
                </span> 
                <span class="btn">
                    <span id="counter">0</span> Clicks</span>
                </span>
                <div id="cardBox"></div>
            </div>
            
            <img class="logoMenu" id="gameLogo" src="https://i.pinimg.com/originals/b6/b8/18/b6b8188e6c3abe43452045b46b736f2e.png" alt="GAME">
        </div>
       
        <div id="drawBox"><img class="logoMenu" id="drawLogo" src="https://cdn3.iconfinder.com/data/icons/outline-education-1/100/education-17-512.png" alt="DRAW">
        
            <div id="drawPage">
  
            <div id="content"><p style="text-align:center">Loading Canvas...</p></div>
            <div class="footer">    
            <div class="palette-box">
                
                <a id="new" class="navbtn"><img id="newImg" src="http://icons.iconarchive.com/icons/icons8/ios7/512/Household-Broom-icon.png" alt="NEW" ></a>
                <span id="colors" class="navbtn"><input type="text"  id="replacerClassName" /></span>
                <a id="eraser" class="navbtn"><img id="eraserImg" src="https://cdn4.iconfinder.com/data/icons/design-tools/128/Graphic_Design_Tools_eraser-29-512.png" alt="ERASER"></a>
                 
            </div>
     
            </div>
            </div> 
        </div>
        <img id="closeBtn" src= "http://chittagongit.com//images/close-x-icon/close-x-icon-14.jpg" alt="close" onclick="closeMenu()">
        </div>
        
   
    
    <img id="logout" src="https://www.feed-forward.net/logout-icon.png" alt="logout" onclick="logoutFinal()">
   </div>
    
    <div id="author">&#169; LukArToDo</div>
     
    <img id="btnMusic" src= "https://d3eum8lucccgeh.cloudfront.net/genres/6000/harto_bann_05.png" alt="play/pause">
    
    <div id="text"></div>
          
    <script src="lr.js"></script>
    </body>
</html>

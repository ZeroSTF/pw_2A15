<?php 
session_start();
include_once('C:\xampp\htdocs\projet\Model\User.php');
include_once('C:\xampp\htdocs\projet\Controller\UserC.php');
$pwd=$_POST['Password'];
$username=$_POST['Username'];
$sql="SELECT * FROM user WHERE username='$username' and password='$pwd'";
$db = config::getConnexion();
$query=$db->prepare($sql);
$query->execute();
$Usert=$query->fetch(PDO::FETCH_ASSOC);

if($Usert!=NULL)
{
if ($Usert['type']=="U"){
$extra="Views/webb/index.php";
$_SESSION['username']=$_POST['Username'];
$_SESSION['id']=$Usert['id'];
$_SESSION['password']=$Usert['password'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
if ($Usert['type']=="A")
{
    $extra="Views/admin/manage-users.php";
	$_SESSION['username']=$_POST['Username'];
	$_SESSION['id']=$Usert['id'];
	$_SESSION['password']=$Usert['password'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="Views/Front/";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
?>
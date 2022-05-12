<?php
    include_once '../controller/reclamation.php';
	session_start();
    $error = "";

    // create blog
    $reclamation = null;

    // create an instance of the controller
    $reclamationA = new reclamationA();
    if (
        isset($_POST["sujet"]) &&
		isset($_POST["contenu"]) &&
		isset($_POST["date"])&&
		isset($_POST["etat"])

    ) {
        if (
            !empty($_POST["sujet"]) && 
			!empty($_POST['contenu']) &&
			!empty($_POST['date']) &&
			!empty($_POST['etat'])
        ) {           
            $reclamation = new reclamation(
                null,
				$_POST['sujet'],
                $_POST['contenu'], 
				$_POST['date'],
				$_POST['etat'],
				$_SESSION['id']
            );
            $reclamationA->ajouterreclamation($reclamation);
                        //echo $_POST["titre"].'---'.$_POST['contenu'].'---'.$_POST["categorie"].'---'.$_POST["date"].'---'.$_POST["jaime"].'---'.$_POST["id"];

            header('Location:contact_rep.php');
        }
        else
            $error = "Missing information";
            //echo $_POST["titre"].'---'.$_POST['contenu'].'---'.$_POST["categorie"].'---'.$_POST["date"].'---'.$_POST["jaime"].'---'.$_POST["id"];
    }    
?>

<?php include'header.php'; ?>

<!-- contact -->
	<div class="contact-agile">
		
		<div class="faq">
			<h4 class="latest-text w3_latest_text">votre reclamation</h4>
			<div class="container">
				<div class="col-md-3 location-agileinfo">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					</div>
					<h3>Address</h3>
					<h4>rue 23 Ghazela,</h4>
					<h4>tunis,</h4>
					<h4>tunisia.</h4>
				</div>
				<div class="col-md-3 call-agileits">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
					</div>
					<h3>Call</h3>
					<h4>+21655244199</h4>
					<h4>+21620260377</h4>
					<h4>+201671541895</h4>
				</div>
				<div class="col-md-3 mail-wthree">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					<h3>Email</h3>
					<h4><a href="mailto:info@example.com">cineprod12@mail.com</a></h4>
					
				</div>
				<div class="col-md-3 social-w3l">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					</div>
					<h3>Social media</h3>
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span class="text">Facebook</span></a></li>
						<li class="twt"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span class="text">Twitter</span></a></li>
						<li class="ggp"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i><span class="text">Google+</span></a></li>	
					</ul>
				</div>
				<div class="clearfix"></div>
				<form action="" method="post">
					
					<textarea  name="sujet" placeholder="Votre sujet" required=""></textarea>
					<textarea  name="contenu" placeholder="Votre contenu" required=""></textarea>
					<input type="date" name="date" placeholder="date" required="">
					<textarea  name="etat" placeholder="Votre etat" required=""></textarea>
					<input type="submit" value="Envoyer votre reclamation">
				</form>
			</div>
		</div>
	</div>
		
<!-- //contact -->
<?php include'footer.php'; ?>

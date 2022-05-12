<?php
    include_once '../controller/abonnement.php';
	session_start();
    $error = "";

    // create blog
    $abonnement = null;

    // create an instance of the controller
    $abonnementA = new abonnementA();
    if (
		isset($_POST["date_debutA"]) &&
		isset($_POST["date_finA"]) &&
        isset($_POST["type"]) &&
		isset($_POST["libelle"]) 	
    ) {
        if (
			!empty($_POST["date_debutA"]) && 
			!empty($_POST["date_finA"]) && 
            !empty($_POST["type"]) && 
			!empty($_POST['libelle']) 
        ) {           
            $abonnement = new abonnement(
				$_POST['date_debutA'],
				$_POST['date_finA'],
				$_POST['type'],
                $_POST['libelle'], 
				null,
				$_SESSION['id']
            );
            $abonnementA->ajouterabonnement($abonnement);
                        //echo $_POST["titre"].'---'.$_POST['pourcentage'].'---'.$_POST["categorie"].'---'.$_POST["date"].'---'.$_POST["jaime"].'---'.$_POST["id"];

            header('Location:contact_abonnement.php');
        }
        else
            $error = "Missing information";
            //echo $_POST["titre"].'---'.$_POST['pourcentage'].'---'.$_POST["categorie"].'---'.$_POST["date"].'---'.$_POST["jaime"].'---'.$_POST["id"];
    }    
?>

<?php include'header.php'; ?>

<!-- contact -->
	<div class="contact-agile">
		
		<div class="faq">
			<h4 class="latest-text w3_latest_text">Abonnement</h4>
			<div class="container">
				<div class="col-md-3 location-agileinfo">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					</div>
					<h3>Address</h3>
					<h4>rue 23 ghazela,</h4>
					<h4>Tunis,</h4>
					<h4>Tunisia.</h4>
				</div>
				<div class="col-md-3 call-agileits">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
					</div>
					<h3>Call</h3>
					<h4>+21655244199</h4>
					<h4>+21620260377</h4>
					<h4>+21651592591</h4>
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
				<input type="date" name="date_debutA" placeholder="date_debutA" required="">
				<input type="date" name="date_finA" placeholder="date_finA" required="">
					<input type="text" name="type" placeholder="type" required="">
					<input type="text" name="libelle" placeholder="libelle" required="">
					<input type="submit" value="ajouter un abonnement">
				</form>
			</div>
		</div>
	</div>
		
<!-- //contact -->
<?php include'footer.php'; ?>

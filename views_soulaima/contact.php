<?php
    include_once '../controller/salleC.php';

    $error = "";

    
    $salle = null;

    // create an instance of the controller
    $salleC = new salleC();
    if (
        isset($_POST["Capacité"]) 
		
    ) {
        if (
            !empty($_POST["Capacité"]) 
        ) {           
            $salle = new salle(
                null,
				$_POST['Capacité'],
               
                'en attente'
            );
            $salleC->ajoutersalle($salle);
                        //echo $_POST["titre"].'---'.$_POST['contenu'].'---'.$_POST["categorie"].'---'.$_POST["date"].'---'.$_POST["jaime"].'---'.$_POST["id"];

            header('Location:contact.php');
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
			<h4 class="latest-text w3_latest_text">Contact Us</h4>
			<div class="container">
				<div class="col-md-3 location-agileinfo">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>
					</div>
					<h3>Address</h3>
					<h4>345 Setwant natrer,</h4>
					<h4>Washington,</h4>
					<h4>United States.</h4>
				</div>
				<div class="col-md-3 call-agileits">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>
					</div>
					<h3>Call</h3>
					<h4>+18044126235</h4>
					<h4>+14056489808</h4>
					<h4>+16789339049</h4>
				</div>
				<div class="col-md-3 mail-wthree">
					<div class="icon-w3">
						<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
					</div>
					<h3>Email</h3>
					<h4><a href="mailto:info@example.com">example1@mail.com</a></h4>
					<h4><a href="mailto:info@example.com">example2@mail.com</a></h4>
					<h4><a href="mailto:info@example.com">example3@mail.com</a></h4>
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
					<input type="int" name="Capacité" placeholder="Capacité" required="">
					
					<input type="submit" value="Envoyer votre salle">
				</form>
			</div>
		</div>
	</div>
		
<!-- //contact -->
<?php include'footer.php'; ?>

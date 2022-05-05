<?php
	include '../../controller/reservationC.php';
	$reservationC=new reservationC();
	$listedesreservations=$reservationC->afficherreservation(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterreservation.php">Ajouter une reservation</a></button>
		<center><h1>Liste des reservations</h1></center>
		<table border="1" align="center">
			<tr>
			<th>Idreservation</th>
			<th>Capacité</th>
			<th>Modifier</th>
			<th>Supprimer</th>
			</tr>
			<?php
				foreach($listedesreservations as $reservation){
			?>
			<tr>
			<td><?php echo $reservation['IdReserv']; ?></td>
            <td><?php echo $reservation['IdClient']; ?></td>
            <td><?php echo $reservation['IdProj']; ?></td>
            <td><?php echo $reservation['DateR']; ?></td>
				<td><?php echo $reservation['etat']; ?></td>
				
				<td>
					<form method="POST" action="modifierreservation.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $reservation['IdReserv']; ?> name="IdReserv">
					</form>
				</td>
				<td>
					<a href="supprimerreservation.php?id=<?php echo $reservation['IdReserv']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>

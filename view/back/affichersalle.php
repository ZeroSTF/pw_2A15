<?php
	include '../../controller/salleC.php';
	$salleC=new salleC();
	$liste=$salleC->affichersalle(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajoutersalle.php">Ajouter une salle</a></button>
		<center><h1>Liste des salles</h1></center>
		<table border="1" align="center">
			<tr>
			<th>IdSalle</th>
			<th>Capacité</th>
			<th>Modifier</th>
			<th>Supprimer</th>
			</tr>
			<?php
				foreach($liste as $salle){
			?>
			<tr>
			<td><?php echo $salle['IdSalle']; ?></td>
				<td><?php echo $salle['Capacité']; ?></td>
				
				<td>
					<form method="POST" action="modifiersalle.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $salle['IdSalle']; ?> name="IdSalle">
					</form>
				</td>
				<td>
					<a href="supprimersalle.php?id=<?php echo $salle['IdSalle']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>

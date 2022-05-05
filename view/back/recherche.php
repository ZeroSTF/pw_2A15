<?php
	include '../../controller/projectionC.php';
	$projectionC=new projectionC();
    if(isset($_POST['recherche'])){
	$listedesprojections=$projectionC->recherche($_POST['recherche']); }
    else {$listedesprojections=$projectionC->afficherprojection();
    }
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterprojection.php">Ajouter une projection</a></button>
		<center><h1>Liste des projections</h1></center>
		
		<form method="POST" action="recherche.php">
		<input style="margin-left:40%;" type="text" name="recherche">
		<button>Chercher</button>
		</form>
		<table border="1" align="center">
			<tr>
			<th>IdProj</th>
			<th>Salle</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Prix</th>
			<th>Modifier</th>
			<th>Supprimer</th>
			</tr>
			<?php
				foreach($listedesprojections as $projection){
			?>
			<tr>
			<td><?php echo $projection['IdProj']; ?></td>
				<td><?php echo $projection['Salle']; ?></td>
                <td><?php echo $projection['Date']; ?></td>
                <td><?php echo $projection['Heure']; ?></td>
                <td><?php echo $projection['Prix']; ?></td>
				
				<td>
					<form method="POST" action="modifierprojection.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $projection['IdProj']; ?> name="IdProj">
					</form>
				</td>
				<td>
					<a href="supprimerprojection.php?id=<?php echo $projection['IdProj']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>

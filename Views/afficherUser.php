<?php
	include '../Controller/UserC.php';
	$UserC=new UserC();
	$listeUsers=$UserC->afficherUser(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterUser.php">Ajouter un Utilisateur</a></button>
		<center><h1>Liste des Users</h1></center>
		<table border="1" align="center">
			<tr>
				<th>id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>Email</th>
				<th>password</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeUsers as $User){
			?>
			<tr>
				<td><?php echo $User['id']; ?></td>
				<td><?php echo $User['nom']; ?></td>
				<td><?php echo $User['prenom']; ?></td>
				<td><?php echo $User['email']; ?></td>
				<td><?php echo $User['password']; ?></td>
				<td>
					<form method="POST" action="modifierUser.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $User['id']; ?> name="id">
					</form>
				</td>
				<td>
					<a href="supprimerUser.php?id=<?php echo $User['id']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>

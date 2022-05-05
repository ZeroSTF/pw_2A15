<?PHP
include '../../Controller/Categorie.php';

$Categoriec= new CategorieC();
$liste= $Categoriec->afficherCategorie();

?>
<html>
  <head></head>
    <body>
      <button><a href="ajouterCategorie.php">Ajouter une Categorie</a></button>
      <center><h1>Liste des Categories</h1></center>
      <table border="1" align="center">
        <tr>
          <td>ID Categorie</td>
          <td>Nom Categorie</td>
        </tr>

      <?PHP
      foreach($liste as $Categorie){
      ?>
        <tr>
          <td><?PHP echo $Categorie['idC']; ?></td>
          <td><?PHP echo $Categorie['nomC']; ?></td>
          
          <td>
					<form method="POST" action="modifierCategorie.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?php echo $Categorie['idC']; ?> name="idC">
					</form>
				</td>
				<td>
					<a href="supprimerCategorie.php?id=<?php echo $Categorie['idC'];?>">Supprimer</a>
				</td>
			</tr>
        <?PHP
      }
      ?>
      </table>
  </body>
</html>
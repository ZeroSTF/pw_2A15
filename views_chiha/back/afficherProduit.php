<?PHP
include '../../Controller/Produit.php';

$Produitc= new ProduitC();
$liste= $Produitc->afficherProduit();

?>
<html>
  <head></head>
    <body>
      <button><a href="ajouterProduit.php">Ajouter une Produit</a></button>
      <center><h1>Liste des Produits</h1></center>
      <table border="1" align="center">
        <tr>
          <td>ID Produit</td>
          <td>prix</td>
          <td>libellee</td>
          <td>descriptions</td>
          <td>Modifier</td>
          <td>Supprimer</td>
        </tr>

      <?PHP
      foreach($liste as $Produit){
      ?>
        <tr>
          <td><?PHP echo $Produit['idP']; ?></td>
          <td><?PHP echo $Produit['prix']; ?></td>
          <td><?PHP echo $Produit['libellee']; ?></td>
          <td><?PHP echo $Produit['descriptions']; ?></td>
          <form method="POST" action="modifierProduit.php">
          <td>
						<input type="submit" name="Modifier" value="Modifier">
            <input type="hidden" value=<?php echo $Produit['idP']; ?> name="idP">
           
				</td>
        </form>
				<td>
					<a href="supprimerProduit.php?id=<?php echo $Produit['idP'];?>">Supprimer</a>
				</td>
			</tr>
        <?PHP
      }
      ?>
      </table>
  </body>
</html>
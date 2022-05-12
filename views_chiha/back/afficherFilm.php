<?PHP
include '../../Controller/Film.php';

$Filmc= new FilmC();
$liste= $Filmc->afficherFilm();

?>
<html>
  <head></head>
    <body>
      <button><a href="ajouterFilm.php">Ajouter une Film</a></button>
      <center><h1>Liste des Films</h1></center>
      <table border="1" align="center">
        <tr>
          <td>idFilm</td>
          <td>titre</td>
          <td>descriptions</td>
          <td>dateS</td>
          <td>modifier</td>
          <td>supprimer</td>
        </tr>

      <?PHP
      foreach($liste as $film){
      ?>
        <tr>
          <td><?PHP echo $film['idf']; ?></td>
          <td><?PHP echo $film['titre']; ?></td>
          <td><?PHP echo $film['descriptions']; ?></td>
          <td><?PHP echo $film['dateS']; ?></td>
          <form method="POST" action="modifierFilm.php">
          <td>
						<input type="submit" name="Modifier" value="Modifier">
            <input type="hidden" value=<?php echo $film['idf']; ?> name="idf">
           
				</td>
        </form>
				<td>
					<a href="supprimerFilm.php?id=<?php echo $film['idf'];?>">Supprimer</a>
				</td>
			</tr>
        <?PHP
      }
      ?>
      </table>
  </body>
</html>
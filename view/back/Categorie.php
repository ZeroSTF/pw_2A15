<?php include'header.php'; 

include '../../controller/Categorie.php';
$Categoriec=new CategorieC();
$liste=$Categoriec->afficherCategorie(); 
?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Categorie</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Categorie</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nom Categorie</th>
                      
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				foreach($liste as $categorie){
			        ?>
                    <tr>
                      <td class="">
                          <div class="">
                            <h6 style="margin-left: 14px;" class="mb-0 text-sm"><?php echo $categorie['idC']; ?></h6>
                        </div>
                      </td>
                      <td class="">
                      <h6 class="mb-0 text-sm"><?php echo $categorie['nomC']; ?></h6>
                      </td>
                      
                      
                     
                      <td class="align-middle">
                      <form method="POST" action="modifierCategorie.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $categorie['idC']; ?> name="idC">
					</form>
                      </td>
                      <td class="align-middle">
                        <a href="supprimerCategorie.php?idf=<?php echo $categorie['idC']; ?>" class="text-secondary font-weight-bold text-xs">
                          Supprimer
                        </a>
                      </td>
                      </td>
                      <td class="align-middle">
                        <a href="ajouterCategorie.php?id=<?php echo $categorie['idC']; ?>" class="text-secondary font-weight-bold text-xs">
                          Ajouter
                        </a>
                      </td>
                      //<td class="align-middle">
                        <a href="modifierCategorie.php?id=<?php echo $categorie['idC']; ?>" class="text-secondary font-weight-bold text-xs">
                          Modifier
                        </a>
                      </td>

                    </tr>
                    <?php
				    }
			        ?>
        
                  </tbody>
                 </table>
                 </div>
                 </div>
                </div>
                </div>
                </div>

      <?php include'footer.php'; ?>

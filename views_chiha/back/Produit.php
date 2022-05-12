
<?php include'header.php'; 

include '../../controller/Produit.php';
$Produitc=new ProduitC();
$liste=$Produitc->afficherProduit(); 
?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Produit</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Poduit</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prix</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Libellee</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descriptions</th>
                     
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				foreach($liste as $produit){
			        ?>
                    <tr>
                      <td class="">
                          <div class="">
                            <h6 style="margin-left: 14px;" class="mb-0 text-sm"><?php echo $produit['idP']; ?></h6>
                        </div>
                      </td>
                      <td class="">
                      <h6 class="mb-0 text-sm"><?php echo $produit['prix']; ?></h6>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $produit['libellee']; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $produit['descriptions']; ?></span>
                      </td>
                      
                     
                      <td class="align-middle">
                      <form method="POST" action="modifierProduit.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $produit['idP']; ?> name="idP">
					</form>
                      </td>
                      <td class="align-middle">
                        <a href="supprimerProduit.php?idP=<?php echo $produit['idP']; ?>" class="text-secondary font-weight-bold text-xs">
                          Supprimer
                        </a>
                      </td>
                      </td>
                      <td class="align-middle">
                        <a href="ajouterProduit.php?id=<?php echo $produit['idP']; ?>" class="text-secondary font-weight-bold text-xs">
                          Ajouter
                        </a>
                      </td>
                      <td class="align-middle">
                        <a href="modifierProduit.php?id=<?php echo $produit['idP']; ?>" class="text-secondary font-weight-bold text-xs">
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
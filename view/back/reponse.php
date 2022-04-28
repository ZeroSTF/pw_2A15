<?php include'header.php'; 

include '../../controller/reponse.php';
$reponsea=new reponseA();
$liste=$reponsea->afficherreponse(); 
?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">reponse</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date_Rep</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contenu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id_rep</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
        foreach($liste as $rec){
              ?>
                    <tr>
                      <td class="">
                          <div class="">
                            <h6 style="margin-left: 14px;" class="mb-0 text-sm"><?php echo $rec['date_Rep']; ?></h6>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['contenu']; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $rec['id_Rep']; ?></span>
                      </td>
                      <td class="align-middle">
					<form method="POST" action="ajouterreponse.php">
						<input type="submit" name="ajouter" value="ajouter">
						<input type="hidden" value=<?PHP echo $rec['id_Rep']; ?> name="id_Rep">
					</form>
				</td>
                      <td class="align-middle">
                      <form method="POST" action="modifierreponse.php">
            <input type="submit" name="Modifier" value="Modifier">
            <input type="hidden" value=<?PHP echo $rec['id_Rep']; ?> name="id_Rep">
          </form>
                      </td>
                      <td class="align-middle">
                        <a href="supprimerreponse.php?id=<?php echo $rec['id_Rep']; ?>" class="text-secondary font-weight-bold text-xs">
                          Supprimer
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
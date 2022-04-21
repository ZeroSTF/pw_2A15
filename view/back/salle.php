<?php include'header.php'; 

include '../../controller/salleC.php';
$salleC =new salleC();
$liste=$salleC->affichersalle(); 
?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">salle</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IdSalle</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Capacité</th>
          
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				foreach($liste as $salle){
			        ?>
                    <tr>
                    </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $salle['IdSalle']; ?></span>
                        </div>
                      </td>
                      
                      
                      <td class="align-middle text-center ">
                        <span class="badge badge-sm bg-gradient-success"><?php echo $salle['Capacité']; ?></span>
                      </td>
                     
                      <td class="align-middle">
                      <form method="POST" action="modifiersalle.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $salle['IdSalle']; ?> name="IdSalle">
					</form>
                      </td>
                      <td class="align-middle">
                      <a href="supprimersalle.php?IdSalle=<?php echo $salle['IdSalle']; ?>" class="text-secondary font-weight-bold text-xs">
                          Supprimer
                        </a>
                      </td>
                      </td>
                      <td class="align-middle">
                      <form method="POST" action="ajoutersalle.php">
						<input type="submit" name="Ajouter" value="Ajouter">
						<input type="hidden" value=<?PHP echo $salle['IdSalle']; ?> name="IdSalle">
					</form>
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
      <td class="">
                       
<?php include'header.php'; 

include '../../controller/projectionC.php';
$projectionC =new projectionC();
$listedesprojections=$projectionC->afficherprojection(); 
?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">projection</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IdProj</th>
                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salle</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Heure</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prix</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				foreach($listedesprojections as $projection){
			        ?>
                    <tr>
                    </td>
                    <table>

		


                
  </table>
                     
                     
                      <td class="align-middle">
                      <form method="POST" action="modifierprojection.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $projection['IdProj']; ?> name="IdProj">
					</form>
                      </td>
                      <td class="align-middle">
                      <a href="supprimerprojection.php?Idprojection=<?php echo $projection['IdProj']; ?>" class="text-secondary font-weight-bold text-xs">
                          Supprimer
                        </a>
                      </td>
                      </td>
                      <td class="align-middle">
                      <form method="POST" action="ajouterprojection.php">
						<input type="submit" name="Ajouter" value="Ajouter">
						<input type="hidden" value=<?PHP echo $projection['IdProj']; ?> name="IdProj">
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
                       
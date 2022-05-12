<?php include'header.php'; 

include '../../controller/abonnement.php';
$abonnementa=new abonnementA();
$liste=$abonnementa->afficherabonnement();




?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">abonnement</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date_debutA</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date_finA</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">type</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">libelle</th>
                      
                    
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID_abon</th>
                      
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				foreach($liste as $rec){
			        ?>
                    <tr>
                    
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $rec['date_debutA']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $rec['date_finA']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['type']; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['libelle']; ?></p>
                      </td>
                      
                     
                      <td class="">
                          <div class="">
                            <h6 style="margin-left: 14px;" class="mb-0 text-sm"><?php echo $rec['ID_abon']; ?></h6>
                        </div>
                      </td>
                      
                      <td class="align-middle">
					<form method="POST" action="modifierabonnement.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $rec['ID_abon']; ?> name="ID_abon">
					</form>
				</td>

            
                      <td class="align-middle">
                        <a href="supprimerabonnement.php?ID_abon=<?php echo $rec['ID_abon']; ?>" class="text-secondary font-weight-bold text-xs">
                          Supprimer
                        </a>
                      </td>
                    </tr>
                    <?php
				    }
			        ?>
              <tr>
              <td>
          </td><td>
          </td><td>
          </td>
          <td>
              
          </td>
  <td>
          </td>



              </tr>
                 
                 
               
                 
                  </tbody>
                </table>
                <br>              <br>
              <br>
<div style='margin-left:30%;'>
              <?php 

              echo "<img src='statistique.php' />";

              ?>
              <br>
              <table style='width:50%;margin-left:13%; '>
                <tr>
                  <td><h3 style='color:#9AEA66;'>Gold</h3></td>
                  <td><h3 style='color:#005EBC;'>Silver</h3></td>
                  <td><h3 style='color:#FEFA10;'>Bronze</h3></td>
          </tr>
          </table>
              
              
              <div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include'footer.php'; ?>

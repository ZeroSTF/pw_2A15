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
              <form method="POST" action="recherche.php">
		          <input style="margin-left:5%;" type="text" name="recherche">
		          <button>Chercher</button>
		          </form>
              <br>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>                      
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Salle</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Heure</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Prix</th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"><a href="ajouterprojection.php">Ajouter projection</a> </th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
				foreach($listedesprojections as $projection){
         
            ?>
                  <tr>
                  </td>


                    </td>
                    
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo $projection['Salle']; ?></span>
                      </div>
                    </td>

                    </td>
                    
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo $projection['Date']; ?></span>
                      </div>
                    </td>
                    
                    
                    <td class="align-middle text-center ">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo $projection['Heure']; ?></span>
                    </td>
                    <td class="align-middle text-center ">
                      <span class="text-secondary text-xs font-weight-bold"><?php echo $projection['Prix']; ?> dt</span>
                    </td>


                    <td class="align-middle">
                      <form method="POST" action="modifierprojection.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $projection['IdProj']; ?> name="IdProj">
					</form>
                      </td>
                      <td class="align-middle">
                      <form action="supprimerprojection.php" method="POST" >
						            <input type="hidden" value="<?php echo $projection['IdProj']; ?>" name="IdProj">
						            <button  class="btn btn-danger"><i class="fa fa-trash"></i></button>
				              </form>
                      </td>
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
      <td class="">
                       
                       
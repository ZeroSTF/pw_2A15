<?php
    include_once '../controller/projectionC.php';
    include_once '../controller/reservationC.php';
    include_once '../controller/salleC.php';
session_start();
    $error = "";
  $projectionC=new projectionC();
  $liste=$projectionC->afficherprojection(); 
  


  $IdClient=$_SESSION['id'];


 include'header.php';?>

<!-- contact -->
  <div class="contact-agile">
    
    <div class="faq">
      <h4 class="latest-text w3_latest_text">Projection</h4>
      <div class="container">
        
        
        <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
          
                <table class="table align-items-center mb-0" style="width:1000%">
                  <thead>
                    <tr>
                   
                   
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
        $reservationC =new reservationC();
        $salleC= new salleC();
        foreach($liste as $rec)
        {
          $soulaima=0;

           $salle=$salleC->recuperersalle($rec['Salle']);
           foreach($salle as $s)
           $soulaima=$s['Capacite'];
           $count=$reservationC->compteur($rec['Salle'],$rec['Heure'],$rec['Date']);
              
              foreach($count as $row)
                 
              ?>
                    <tr>
                    
                    
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['Salle']; ?></p>
                      </td> 
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['Date']; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['Heure']; ?></p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['Prix']; ?></p>
                      </td>
                      <td>Nombre de place <?php echo $row['compteur']; echo '/';echo $soulaima;?></td>
                      <td class="align-middle text-center">
                        <form action="reserver.php" method="POST">
                        
                        <input type="hidden" value="<?php echo $rec['IdProj']; ?>" name="IdProj">
                        <input type="hidden" value="<?php echo $IdClient;?>" name="IdClient">
                        <?php 
                        if($soulaima>$row['compteur'])
                        echo '<button class="button">Reserver</button>';
                        else 
                        echo '<a>Complet</a>'; 
                        ?>
                        </form>
                      </td>
                     
                    </tr>
                    <?php
            }
              ?>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
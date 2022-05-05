<?php
    include_once '../controller/projectionC.php';

    $error = "";
  $projectionC=new projectionC();
  $liste=$projectionC->afficherprojection(); 
    
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
        
        foreach($liste as $rec){
              ?>
                    <tr>
                    
                      
                      <td class="">
                          <div class="">
                            <h6 style="margin-left: 14px;" class="mb-0 text-sm"><?php echo $rec['IdProj']; ?></h6>
                        </div>
                      </td>
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
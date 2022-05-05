<?php
    include_once '../controller/salleC.php';

    $error = "";
  $salleC=new salleC();
  $liste=$salleC->affichersalle(); 
    
 include'header.php';?>

<!-- contact -->
  <div class="contact-agile">
    
    <div class="faq">
      <h4 class="latest-text w3_latest_text">les salles</h4>
      <div class="container">
        
        
        <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
          
                <table class="table align-items-center mb-0" style="width:1000%">
                  <thead>
                    <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Capacité</th>
                  
                  
                      
                      
                    
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">IdSalle</th>
                      
                      <th class="text-secondary opacity-7"></th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
        
        foreach($liste as $sal){
              ?>
                    <tr>
                    
                      
                     
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $sal['Capacité']; ?></p>
                      </td>
                      
                      
                     
                      <td class="">
                          <div class="">
                            <h6 style="margin-left: 14px;" class="mb-0 text-sm"><?php echo $sal['IdSalle']; ?></h6>
                        </div>
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
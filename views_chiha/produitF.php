<?php
    include_once '../controller/Produit.php';

    $error = "";
  $Produitc=new ProduitC();
  $liste=$Produitc->afficherProduit(); 
    
 include'header.php';?>


  <div class="contact-agile">
    
    <div class="faq">
      <h4 class="latest-text w3_latest_text">les Produits</h4>
      <div class="container">
        
        
        <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
          
                <table class="table align-items-center mb-0" style="width:1000%">
                  <thead>
                    <tr>
                    
                  
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID Produit</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">prix</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">libellee</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descriptions</th>
                      
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
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['idP']; ?></p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['prix']; ?></p>
                      </td>

                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['libellee']; ?></p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $rec['descriptions']; ?></span>
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
 
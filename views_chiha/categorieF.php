<?php
    include_once '../controller/Categorie.php';

    $error = "";
  $Categoriec=new CategorieC();
  $liste=$Categoriec->afficherCategorie(); 
    
 include'header.php';?>

<!-- contact -->
  <div class="contact-agile">
    
    <div class="faq">
      <h4 class="latest-text w3_latest_text">les Categories</h4>
      <div class="container">
        
        
        <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
          
                <table class="table align-items-center mb-0" style="width:1000%">
                  <thead>
                    <tr>
                    
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID Categorie</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nom Categorie</th>
                      
                      
                    
                      
                      
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
                            <h6 style="margin-left: 14px;" class="mb-0 text-sm"><?php echo $rec['idC']; ?></h6>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['nomC']; ?></p>
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
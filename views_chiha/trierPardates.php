<?php
    include_once '../controller/Film.php';

    $error = "";
  $Filmc=new FilmC();
  $liste=$Filmc->trierPardates(); 
    
  
 include'header.php';?>

<!-- contact -->
  <div class="contact-agile">
    
    <div class="faq">
      <h4 class="latest-text w3_latest_text">les Films</h4>
      <div class="container">
        
        <form action="recherche.php" method="POST">
        <input type="text" name="recherche" placeholder="Rechercher">
        <button><img src="images/search.png" style="width:40px;"></button>
        <br>
        <h2 style="margin-left:25px;">Trier </h2><div style="margin-left:100px;"><a href="trierPardates.php">Par date </a>
        <br>
        <a href="trierPartitre.php"> Par titre</a></div>
        <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
          
                <table class="table align-items-center mb-0" style="width:1000%">
                  <thead>
                    <tr>
                    
                  
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ID Film</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Titre</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descriptions</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Sortie</th>
                      
                      <th class="text-secondary opacity-7">Nombre de j'aime</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
        
        foreach($liste as $rec){
              ?>
                    <tr>
                    
                      
                     
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['idf']; ?></p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['titre']; ?></p>
                      </td>

                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['descriptions']; ?></p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $rec['dateS']; ?></span>
                      </td>
                      <td class="align-middle text-center">
                      
                        <form method="POST" action="ajouterlike.php"  >
                        <a><?php 
                                $nbrlike=$Filmc->afficherNbrlike($rec['idf']);
                                foreach($nbrlike as $row)
                                 echo $row['nbr'];;
                        ?> </a>
                            <input type="hidden" value="<?php echo $rec['idf']; ?>" name="id_film">

                            <button ><img src="images/jaime.png" style="width:20px;">  </button>
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
 
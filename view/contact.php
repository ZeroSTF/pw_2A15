<?php
    include_once '../controller/reponse.php';

    $error = "";
	$reponsea=new reponseA();
	$liste=$reponsea->afficherreponse(); 
    
 include'header.php';?>

<!-- contact -->
	<div class="contact-agile">
		
		<div class="faq">
			<h4 class="latest-text w3_latest_text">les reponses</h4>
			<div class="container">
				
				
				<div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
				  
                <table class="table align-items-center mb-0" style="width:1000%">
                  <thead>
                    <tr>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date_Rep</th>
                  
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Contenu</th>
                      
                      
                    
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">id_Rep</th>
                      
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
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $rec['Date_Rep']; ?></span>
                      </td>
                     
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0"><?php echo $rec['Contenu']; ?></p>
                      </td>
                      
                      
                     
                      <td class="">
                          <div class="">
                            <h6 style="margin-left: 14px;" class="mb-0 text-sm"><?php echo $rec['id_Rep']; ?></h6>
                        </div>
                      </td>
                      
                      <td >
                      <form action="add_rate.php" method="POST">
                        <input type="hidden" value="<?php echo $rec['id_Rep'];?>" name="id_Rep" >
                        <?php if($rec['stars']==1)
                              echo "<img style='width:20px;' src='images/stars.png'>";
                              if($rec['stars']==2)
                              {echo "<img style='width:20px;' src='images/stars.png'>";echo "<img style='width:20px;' src='images/stars.png'>";}
                              if($rec['stars']==3)
                              {echo "<img style='width:20px;' src='images/stars.png'>";echo "<img style='width:20px;' src='images/stars.png'>";echo "<img style='width:20px;' src='images/stars.png'>";}
                              if($rec['stars']==4)
                              {echo "<img style='width:20px;' src='images/stars.png'>";echo "<img style='width:20px;' src='images/stars.png'>";echo "<img style='width:20px;' src='images/stars.png'>";echo "<img style='width:20px;' src='images/stars.png'>";}



                        ?>
                        <input type="number" min='0' max='4' name="stars"><a>Stars</a>
                        
        </div>
          <button>Rating</button>

                      </form>
                      <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

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
                 
	
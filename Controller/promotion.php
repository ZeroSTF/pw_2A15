<?php
	include  $_SERVER['DOCUMENT_ROOT'].'/projet_integration/config.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/projet_integration/model/promotion.php';
	class promotionA {
		function afficherpromotion(){
			$sql="SELECT * FROM promotion";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerpromotion($id){
			$sql="DELETE FROM promotion WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterpromotion($promotion){
			$sql="INSERT INTO promotion (date_debut, date_fin, objet, pourcentage) 
			VALUES (:date_debut,:date_fin, :objet,:pourcentage)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
                $date_debut = $promotion->getdate_debut();
               // $date_debut=date_debut("Y-m-d",strtotime($date_debut));
				$date_fin = $promotion->getdate_fin();
              //  $date_fin=date_fin("Y-m-d",strtotime($date_fin));
				$query->execute([
					'date_debut' => $date_debut,
					'date_fin' => $date_fin,
					
					'objet' => $promotion->getobjet(),
					'pourcentage'=>$promotion->getpourcentage()
					/*'pourcentage' => $promotion->getpourcentage()*/
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
                die;
			}		
            
		}
		function recupererpromotion($id){
			$sql="SELECT * from promotion where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$promotion=$query->fetch();
				return $promotion;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierpromotion($promotion, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE promotion SET 
						date_debut= :date_debut, 
						date_fin= :date_fin, 
						objet= :objet, 
						pourcentage= :pourcentage

					WHERE id= :id'
				);
				$query->execute([
					'date_debut' => $promotion->getdate_debut(),
					'date_fin' => $promotion->getdate_fin(),
					'objet' => $promotion->getobjet(),
					'pourcentage' => $promotion->getpourcentage(),
					
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
	



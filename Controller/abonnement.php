<?php
	include  $_SERVER['DOCUMENT_ROOT'].'/projet_integration/config.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/projet_integration/model/abonnement.php';
	class abonnementA {
		function afficherabonnement(){
			$sql="SELECT * FROM abonnement";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}


		function gettype1(){
			$sql="SELECT count(*) as total,type FROM abonnement where type='Bronze'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function gettype2(){
			$sql="SELECT count(*) as total,type FROM abonnement where type='Silver'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function gettype3(){
			$sql="SELECT count(*) as total,type FROM abonnement where type='Gold'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function supprimerabonnement($ID_abon){
			$sql="DELETE FROM abonnement WHERE ID_abon=:ID_abon";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':ID_abon', $ID_abon);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouterabonnement($abonnement){
			$sql="INSERT INTO abonnement (date_debutA, date_finA, type, libelle,id_client) 
			VALUES (:date_debutA,:date_finA, :type,:libelle,:id_client)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
              $date_debutA=$abonnement->getdate_debutA();
			 $date_debutA = date("Y-m-d",strtotime($date_debutA));
			 //$date_finA=$abonnement->getdate_finA();
			// $date_finA = date("Y-m-d",strtotime($date_finA));
				$query->execute([
					'date_debutA' => $date_debutA,
					'date_finA' => $abonnement->getdate_finA(),
					
					'type' => $abonnement->gettype(),
					'libelle' => $abonnement->getlibelle(),
					'id_client'=>$abonnement->getid_client()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
                die;
			}		
            
		}
		function recupererabonnement($ID_abon){
			$sql="SELECT * from abonnement where ID_abon=$ID_abon";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$abonnement=$query->fetch();
				return $abonnement;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierabonnement($abonnement, $ID_abon){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE abonnement SET 
						date_debutA= :date_debutA, 
						date_finA= :date_finA, 
						type= :type, 
						libelle= :libelle,
						id_client=:id_client

					WHERE ID_abon= :ID_abon'
				);
				$query->execute([
					'date_debutA' => $abonnement->getdate_debutA(),
					'date_finA' => $abonnement->getdate_finA(),
					'type' => $abonnement->gettype(),
					'libelle' => $abonnement->getlibelle(),
					
					'ID_abon' => $ID_abon,
					'id_client'=>$abonnement->getid_client()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
	
?>
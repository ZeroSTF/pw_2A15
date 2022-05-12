<?php
	include  $_SERVER['DOCUMENT_ROOT'].'/projet_integration/config.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/projet_integration/model/reclamation.php';
	class reclamationA {
		function afficherreclamation(){
			$sql="SELECT * FROM reclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}



		
		function trierreclamation(){
			$sql="SELECT * FROM reclamation ORDER BY date DESC";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

		function supprimerreclamation($id){
			$sql="DELETE FROM reclamation WHERE id=:id";
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
		function ajouterreclamation($reclamation){
			$sql="INSERT INTO reclamation (sujet, contenu, date, etat,id_client) 
			VALUES (:sujet,:contenu, :date,:etat,:id_client)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
                $date = $reclamation->getdate();
                $date=date("Y-m-d",strtotime($date));
				$query->execute([
					'sujet' => $reclamation->getsujet(),
					'contenu' => $reclamation->getcontenu(),
					'date' => $date,
					'etat' => $reclamation->getetat(),
					'id_client'=> $reclamation->getid_client()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
                die;
			}		
            
		}
		function recupererreclamation($id){
			$sql="SELECT * from reclamation where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierreclamation($reclamation, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE reclamation SET 
						date= :date, 
						sujet= :sujet, 
						contenu= :contenu, 
						etat= :etat,
						id_client=:id_client
					WHERE id= :id'
				);
				$query->execute([
					'sujet' => $reclamation->getsujet(),
					'contenu' => $reclamation->getcontenu(),
					'etat' => $reclamation->getetat(),
					'date' => $reclamation->getdate(),
					'id' => $id,
					'id_cient'=>$reclamation->getid_client()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}

		}
		function rechercherreclamation($sujet)
		{
			$sql="SELECT *FROM reclamation where sujet";
			$db = config::getConnexion() ;
			try {
				$liste= $db->query($sql);
				return $liste ;

			}
			catch (Exception $e)
			{ die ('erreur:'.$e->getMessage());}
		}

	}
?>
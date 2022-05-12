<?PHP
include_once  $_SERVER['DOCUMENT_ROOT'].'/projet_integration/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/projet_integration/model/salle.php';
	class salleC {
		
		function ajoutersalle($salle){
			
			
			$sql="INSERT INTO `salle`(`IdSalle`, `Capacite`) VALUES (:ID, :CAP)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				var_dump($salle);
			
				$query->execute([
					'ID' => $salle->getIdSalle(),
					'CAP' => $salle->getCapacite()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		
		
		function affichersalle(){
			
			$sql="SELECT * FROM salle";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		
		function supprimersalle($IdSalle){
			$sql="DELETE FROM salle WHERE IdSalle= :IdSalle";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IdSalle',$IdSalle);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function recuperersalle($IdSalle){
			
			$sql="SELECT * FROM salle where IdSalle='$IdSalle'";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		function modifiersalle($salle, $IdSalle){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE `salle` SET `IdSalle`=:Id,`Capacite`=:Cap WHERE `IdSalle`=:Id'
				);
				var_dump($salle);
				$query->execute([
					'Id' => $salle->getIdSalle(),
					'Cap' => $salle->getCapacite()
					

					//'ID' => $salle->getIdSalle(),
					//'CAP' => $salle->getCapacite()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
	}

?>
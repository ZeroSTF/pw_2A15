<?PHP
include  $_SERVER['DOCUMENT_ROOT'].'/projet/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/projet/model/salle.php';
	class salleC {
		
		function ajoutersalle($salle){
			
			
			$sql="INSERT INTO `salle`(`IdSalle`, `Capacité`) VALUES (:ID, :CAP)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				var_dump($salle);
			
				$query->execute([
					'ID' => $salle->getIdSalle(),
					'CAP' => $salle->getCapacité()
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
			$sql="SELECT * from salle where IdSalle= :IdSalle";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':IdSalle',$IdSalle);
				$query->execute();
				$salle=$query->fetch();
				return $salle;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifiersalle($salle, $IdSalle){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE `salle` SET `IdSalle`=:Id,`Capacité`=:Cap WHERE `IdSalle`=:Id'
				);
				var_dump($salle);
				$query->execute([
					'Id' => $salle->getIdSalle(),
					'Cap' => $salle->getCapacité()
					

					//'ID' => $salle->getIdSalle(),
					//'CAP' => $salle->getCapacité()
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
	}

?>
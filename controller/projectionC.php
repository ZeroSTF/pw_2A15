<?PHP
include  $_SERVER['DOCUMENT_ROOT'].'/projet/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/projet/model/projection.php';
	class projectionC {
		
		function ajouterprojection($projection){
			
			
			$sql="INSERT INTO `projection`(`IdProj`, `Salle`,`Date`,`Heure`,`Prix`) VALUES (:IDC, :ID,:DA,:HE,:PR)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				var_dump($projection);
			
				$query->execute([
					'IDC' => $projection->getIdProj(),
					'ID' => $projection->getSalle(),
					'DA' => $projection->getDate(),
					'HE' => $projection->getHeure(),
					'PR' => $projection->getPrix()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		
		
		function afficherprojection(){
			
			$sql="SELECT * FROM projection";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function recherche($chaine){
			
			$sql="SELECT * FROM projection where Salle like '%$chaine%'  OR Date like '%$chaine%' OR Heure like '%$chaine%' OR Prix like '%$chaine%' ;";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		
		function supprimerprojection($IdProj){
			$sql="DELETE FROM projection WHERE IdProj= :IdProj";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IdProj',$IdProj);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function recupererprojection($IdProj){
			$sql="SELECT * from projection where IdProj= :IdProj";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':IdProj',$IdProj);
				$query->execute();
				$projection=$query->fetch();
				return $projection;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		public function afficherProjections($IdSalle){
		try {
			$pdo =getConnexion();
			$query = $pdo->prepare(
				'SELECT * FROM projection where salle =:id'

			);
			$query->execute([
				'id'=>$IdSalle 
			]);
			return $query->fetchAll();

		} catch (PDOException $e){
			$e->getMessage();
		}
	}



		function modifierprojection($projection, $IdProj){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE `projection` SET `IdProj`=:Idc,`Salle`=:ID,`Date`=:Da,`Heure`=:He,`Prix`=:Pr WHERE `IdProj`=:Idc'
				);
				var_dump($projection);
				$query->execute([
					'Idc' => $projection->getIdProj(),
					'Id' => $projection->getSalle(),
					'Da' => $projection->getDate(),
					'He' => $projection->getHeure(),
					'Pr' => $projection->getPrix()


					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
	}

?>
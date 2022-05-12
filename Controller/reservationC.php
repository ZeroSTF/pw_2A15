<?PHP
include_once  $_SERVER['DOCUMENT_ROOT'].'/projet_integration/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/projet_integration/model/reservation.php';
	class reservationC {
		
		function ajouterreservation($reservation){
			$sql="INSERT INTO `reservation` (`IdReserv`, `IdClient`, `Projection`, `DateR`) VALUES (NULL,:IDC,:IDP,:DR)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				var_dump($reservation);
			
				$query->execute([					
					':IDC' => $reservation->getIdClient(),
					':IDP' => $reservation->getProjection(),
					':DR' =>  $reservation->getDateR()					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		
		
		function afficherreservation(){
			
			$sql="SELECT * FROM reservation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		
		function compteur($salle,$heure,$date){
			
			$sql="SELECT COUNT(*)as compteur FROM reservation,projection WHERE projection.Salle=$salle AND projection.Heure='$heure' AND projection.Date='$date' AND projection.IdProj=reservation.Projection;";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}


		function supprimerreservation($IdReserv){
			$sql="DELETE FROM reservation WHERE IdReserv= :IdReserv";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':IdReserv',$IdReserv);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function recupererreservation($IdReserv){
			$sql="SELECT * from reservation where IdReserv= :IdReserv";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->bindValue(':IdReserv',$IdReserv);
				$query->execute();
				$reservation=$query->fetch();
				return $reservation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		/*public function afficherreservations($IdReserv){
		try {
			$pdo =getConnexion();
			$query = $pdo->prepare(
				'SELECT * FROM reservation where IdReserv =:id'

			);
			$query->execute([
				'id'=>$IdReserv
			]);
			return $query->fetchAll();

		} catch (PDOException $e){
			$e->getMessage()
		}
	}*/



	/*	function modifierreservation($reservation, $IdReserv){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE `reservation` SET `IdReserv`=:Idr,`IdClient`=:Idc,`Projection`=:Idp,`DateR`=:Dat WHERE `IdReserv`=:Idr'
				);
				var_dump($reservation);
				$query->execute([
					'Idr' => $reservation->getIdReserv(),
					'Idc' => $reservation->getIdClient(),
					'Idp' => $reservation->getProjection(),
					'Dat' => $reservation->getDateR(),
					//'Eta' => $reservation->getetat()


					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}*/
	
}


?>
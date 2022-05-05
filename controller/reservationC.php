<?PHP
include  $_SERVER['DOCUMENT_ROOT'].'/projet/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/projet/model/reservation.php';
	class reservationC {
		
		function ajouterreservation($reservation){
			
			
			$sql="INSERT INTO `reservation`(`IdReserv`, `IdClient`,`IdProjt`,`DateR`,`etat`) VALUES (:IDC, :ID,:DA,:HE,:PR)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				var_dump($reservation);
			
				$query->execute([
					'IDR' => $reservation->getIdReserv(),
					'IDC' => $reservation->getIdClient(),
					'IDP' => $reservation->getIdProj(),
					'DAT' => $reservation->getDateR(),
					'ETA' => $reservation->getetat()
					
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
		public function afficherreservations($IdReserv){
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
	}



		function modifierreservation($reservation, $IdReserv){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE `reservation` SET `IdReserv`=:Idr,`IdClient`=:Idc,`IdProj`=:Idp,`DateR`=:Dat,`etat`=:Eta WHERE `IdReserv`=:Idr'
				);
				var_dump($reservation);
				$query->execute([
					'Idr' => $reservation->getIdReserv(),
					'Idc' => $reservation->getIdClient(),
					'Idp' => $reservation->getIdProj(),
					'Dat' => $reservation->getDateR(),
					'Eta' => $reservation->getetat()


					
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
	
}


?>
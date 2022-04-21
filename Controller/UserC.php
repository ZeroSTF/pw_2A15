<?php
	include_once 'C:\xampp\htdocs\projet\config.php';
	include_once 'C:\xampp\htdocs\projet\Model\User.php';
	class UserC {
		function afficherUser(){
			$sql="SELECT * FROM user";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function supprimerUser($id){
			$sql="DELETE FROM User WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur: '. $e->getMessage());
			}
		}
		function ajouterUser($User){
			$sql="INSERT INTO User (username,Email,password,type) 
			VALUES (:username,:Email,:pwd,:type)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'username' => $User->getUsername(),
					'Email' => $User->getEmail(),
					'pwd' => $User->getpwd(),
					'type' => $User->getType()
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupererUser($id){
			$sql="SELECT * from User where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$User=$query->fetch();
				return $User;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifierUser($User){
			$db = config::getConnexion();
			try {
				$query = $db->prepare(
					'UPDATE User SET 
						username=:username, 
						email=:email, 
						password=:pwd,
						type=:type
					WHERE id= :id'
				);
				$query->execute([
					'id' => $User->getid(),
					'username' => $User->getUsername(),
					'email' => $User->getEmail(),
					'pwd' => $User->getpwd(),
					'type'=> $User->getType()

				]);
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}

	}
?>
<?php
    include  $_SERVER['DOCUMENT_ROOT'].'/projet_integration/config.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/projet_integration/model/reponse.php';
    class reponseA {
        function afficherreponse1($id_user){
            $sql="SELECT * FROM reponse where idRec in (select ID from reclamation where id_client=".$id_user.")";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMessage());
            }
        }
        function afficherreponse(){
            $sql="SELECT * FROM reponse";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMessage());
            }
        }
        function supprimerreponse($id_REP){
            $sql="DELETE FROM reponse WHERE id_Rep=:id_Rep";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':id_Rep', $id_REP);
            try{
                $req->execute();
            }
            catch(Exception $e){
                die('Erreur:'. $e->getMessage());
            }
        }
        function ajouterreponse($reponse){
            $sql="INSERT INTO reponse (contenu, date_Rep) 
            VALUES (:contenu, :date_Rep )";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
                $date_Rep = $reponse->getdate_Rep();
                $date_Rep=date("Y-m-d",strtotime($date_Rep));
                $query->execute([
                    'contenu' => $reponse->getcontenu(),
                    'date_Rep' => $date_Rep,
                    
                ]);         
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
                die;
            }       
            
        }
        function recupererreponse($id_Rep){
            $sql="SELECT * from reponse where id_Rep=$id_Rep";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();

                $reponse=$query->fetch();
                return $reponse;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        
        function modifierreponse($reponse, $id_Rep){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE reponse SET 
                        date_Rep= :date_Rep, 
                        contenu= :contenu
                    WHERE id_Rep= :id_Rep'
                );
                $query->execute([
                    'contenu' => $reponse->getcontenu(),
                    'date_Rep' => $reponse->getdate_Rep(),
                    'id_Rep' => $id_Rep
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        function stars($stars, $id_Rep){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                    'UPDATE reponse SET  
                        stars= :stars
                    WHERE id_Rep= :id_Rep'
                );
                $query->execute([
                    'stars' => $stars,
                    'id_Rep' => $id_Rep
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

        public function afficherreclamation($id_Rep)
        {
            try 
            {
                $pdo = config::getConnexion() ;
                $query = $pdo ->prepare(
                    'SELECT * FROM reclamation where reponse = :id'

                );
                $query->execute([
                    'id'=>$id_Rep
                ]);
                return $query->fetchAll();
            }
            catch (PDOException $e){
                $e->getMessage();
            }
        }

    }
?>
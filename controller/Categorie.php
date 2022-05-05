<?PHP
include  $_SERVER['DOCUMENT_ROOT'].'/web/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/web/model/Categorie.php';
    class CategorieC {
        
        function ajouterCategorie($Categorie){
            
            
            
            $sql="INSERT INTO Categorie (idC,nomC) VALUES (:idC,:nomC)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
                var_dump($Categorie);
            
                $query->execute([
                    'idC' => $Categorie->getidC(),
                    'nomC' => $Categorie->getnomC()
                    
                ]);         
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }           
        }
        
        
        
        function afficherCategorie(){
            
            $sql="SELECT * FROM Categorie";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
        }
        
        function supprimerCategorie($idC){
            $sql="DELETE FROM Categorie WHERE idC= :idC";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':idC',$idC);
            try{
                $req->execute();
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function recupererCategorie($idC){
            $sql="SELECT * from Categorie where idC= :idC";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->bindValue(':idC',$idC);
                $query->execute();
                $Categorie=$query->fetch();
                return $Categorie;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function modifierCategorie($Categorie, $idC){
            try {
                $db = config::getConnexion();
                $query = $db->prepare('UPDATE `Categorie` SET `idC`=:idC,`nomC`=:nomC WHERE`idC`=:idC');
                var_dump($Categorie);
                $query->execute([
                    'idC' => $Categorie->getidC(),
                    'nomC' => $Categorie->getnomC()
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }

    

?>
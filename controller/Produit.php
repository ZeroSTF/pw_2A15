<?PHP
include  $_SERVER['DOCUMENT_ROOT'].'/web/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/web/model/Produit.php';
    class ProduitC {
        
        function ajouterProduit($Produit){
            
            
            
            $sql="INSERT INTO Produit (idP,prix,libellee,descriptions) VALUES (:idP,:prix,:libellee,:descriptions)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
                var_dump($Produit);
            
                $query->execute([
                    'idP' => $Produit->getidP(),
                    'prix' => $Produit->getprix(),
                    'libellee' => $Produit->getlibellee(),
                    'descriptions' => $Produit->getdescriptions(),
                
                ]);         
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }           
        }
        
        
        
        function afficherProduit(){
            
            $sql="SELECT * FROM Produit";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
        }
        
        function supprimerProduit($idP){
            $sql="DELETE FROM Produit WHERE idP= :idP";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':idP',$idP);
            try{
                $req->execute();
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function recupererProduit($idP){
            $sql="SELECT * from Produit where idP= :idP";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->bindValue(':idP',$idP);
                $query->execute();
                $Produit=$query->fetch();
                return $Produit;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function modifierProduit($Produit, $idP){
            try {
                $db = config::getConnexion();
                $query = $db->prepare('UPDATE `Produit` SET `idP`=:idP,`prix`=:prix,`libellee`=:libellee,`descriptions`=:descriptions WHERE`idP`=:idP');
                var_dump($Produit);
                $query->execute([
                    'idP' => $Produit->getidP(),
                    'prix' => $Produit->getprix(),
                    'libellee' => $Produit->getlibellee(),
                    'descriptions' => $Produit->getdescriptions(),
                   
                    

                   
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }

?>
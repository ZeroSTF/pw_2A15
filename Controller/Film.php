<?PHP
include  $_SERVER['DOCUMENT_ROOT'].'/projet_integration/config.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/projet_integration/model/Film.php';
    class FilmC {
        
        function ajouterFilm($Film){
            
            
            
            $sql="INSERT INTO film (idf,titre,descriptions,dateS,categorie) VALUES (:idf,:titre,:descriptions,:dateS)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
                var_dump($Film);
            
                $query->execute([
                    'idf' => $Film->getidf(),
                    'titre' => $Film->gettitre(),
                    'descriptions' => $Film->getdescriptions(),
                    'dateS' => $Film->getdateS(),
                
                ]);         
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }           
        }
        
        function ajouterLike($idf){
            
            
            
            $sql="INSERT INTO `likes` (`id`, `id_film`) VALUES (NULL,:idf);";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);
                var_dump($Film);
            
                $query->execute([
                    'idf' => $idf
                
                ]);         
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }           
        }

        function afficherNbrlike($idf){
            
            $sql="SELECT count(*)as nbr FROM likes where id_film=$idf";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
        }
        
        function afficherFilm(){
            
            $sql="SELECT * FROM Film";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
        }
        function trierPardates(){
            
            $sql="SELECT * FROM Film ORDER BY dates desc ;";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
        }
        function trierPartitre(){
            
            $sql="SELECT * FROM Film ORDER BY titre;";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
        }

        function rechercher($recherche){
            
            $sql="SELECT * FROM Film where titre like '%$recherche%' OR dateS like '%$recherche%' OR descriptions like '%$recherche%'";
            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }   
        }
        
        function supprimerFilm($idf){
            $sql="DELETE FROM Film WHERE idf= :idf";
            $db = config::getConnexion();
            $req=$db->prepare($sql);
            $req->bindValue(':idf',$idf);
            try{
                $req->execute();
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function recupererFilm($idf){
            $sql="SELECT * from Film where idf= :idf";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->bindValue(':idf',$idf);
                $query->execute();
                $Film=$query->fetch();
                return $Film;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function modifierFilm($Film, $idf){
            try {
                $db = config::getConnexion();
                $query = $db->prepare('UPDATE `film` SET `idf`=:idf,`titre`=:titre,`descriptions`=:descriptions,`dateS`=:dateS WHERE`idf`=:idf');
                var_dump($Film);
                $query->execute([
                    'idf' => $Film->getidf(),
                    'titre' => $Film->gettitre(),
                    'descriptions' => $Film->getdescriptions(),
                    'dateS' => $Film->getdateS(),
                   
                    

                   
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }

?>
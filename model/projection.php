<?php
	class projection{
        private $IdProj=null;
		private $Salle=null;
		private $Date=null;
		private $Heure=null;
        private $Prix=null;
        
		
		//private $password=null;
		function __construct($IdProj,$Salle,$Date,$Heure, $Prix){
            $this->IdProj=$IdProj;
            $this->Salle=$Salle;
            $this->Date=$Date;
            $this->Heure=$Heure;
            $this->Prix=$Prix;
			
			
		}
		function getIdProj(){
			return $this->IdProj;
		}
        function getSalle(){
			return $this->Salle;
		}
        function getDate(){
			return $this->Date;
		}
        function getHeure(){
			return $this->Heure;
		}
        function getPrix(){
			return $this->Prix;
		}
      
        function setIdProj(){
			return $this->IdProj;
		}
		function setSalle(){
			return $this->Salle;
		}
		function setDate(){
			return $this->Date;
		}
        function setHeure(){
			return $this->Heure;
		}
		function setPrix(){
			return $this->Prix;
		}
        
	}


?>
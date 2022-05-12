<?php
	class salle{
		private $IdSalle=null;
		private $Capacite=null;
		
		
		//private $password=null;
		function __construct($IdSalle, $Capacite){
			$this->IdSalle=$IdSalle;
			$this->Capacite=$Capacite;
			
		}
		function getIdSalle(){
			return $this->IdSalle;
		}
        function getCapacite(){
			return $this->Capacite;
		}
       
		function setIdSalle(){
			return $this->IdSalle;
		}
		function setCapacite(){
			return $this->Capacite;
		}
       
		
	}


?>
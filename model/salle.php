<?php
	class salle{
		private $IdSalle=null;
		private $Capacité=null;
		
		
		//private $password=null;
		function __construct($IdSalle, $Capacité){
			$this->IdSalle=$IdSalle;
			$this->Capacité=$Capacité;
			
		}
		function getIdSalle(){
			return $this->IdSalle;
		}
        function getCapacité(){
			return $this->Capacité;
		}
       
       
		
	}


?>
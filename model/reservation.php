<?php
	class reservation{
        private $IdReserv=null;
		private $IdClient=null;
        private $Projection=null;
		private $DateR=null;
        private $etat=null;
        
		
		//private $password=null;
		function __construct($IdReserv,$IdClient, $Projection,$DateR, $etat){
            $this->IdReserv=$IdReserv;
            $this->IdClient=$IdClient;
            $this->Projection=$Projection;
            $this->DateR=$DateR;
            $this->etat=$etat;
			
			
		}
		function getIdReserv(){
			return $this->IdReserv;
		}
        
        function getIdClient(){
			return $this->IdClient;
		}
        function getProjection(){
			return $this->Projection;
		}
        function getDateR(){
			return $this->DateR;
		}
        function getetat(){
			return $this->etat;
		}
      
        function setIdReserv(){
			return $this->IdReserv;
		}
		function setIdClient(){
			return $this->IdClient;
		}
        function setProjection(){
			return $this->Projection;
		}
        function setDateR(){
			return $this->DateR;
		}
		function setetat(){
			return $this->etat;
		}
        
	}


?>
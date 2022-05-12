<?php
	class reservation{
        private $IdReserv=null;
		private $IdClient=null;
        private $Projection=null;
		private $DateR=null;
       // private $etat=null;
        
		
		//private $password=null;
		function __construct($IdClient, $Projection,$DateR,$IdReserv){
            $this->IdReserv=$IdReserv;
            $this->IdClient=$IdClient;
            $this->Projection=$Projection;
            $this->DateR=$DateR;
          //  $this->etat=$etat;
			
			
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
	}
?>
<?php
	class abonnement
	{
		
		
		private $date_debutA=null;
		private $date_finA=null;
		private $type=null;
		private $libelle=null;
		private $ID_abon=null;
		private $id_client=null;
		
		//private $password=null;
		function __construct($date_debutA, $date_finA, $type, $libelle,$ID_abon,$id_client){
			
			$this->date_debutA=$date_debutA;
			$this->date_finA=$date_finA;
			$this->type=$type;
			$this->libelle=$libelle;
			$this->ID_abon=$ID_abon;
			$this->id_client=$id_client;
		}
		
        
       
       function getdate_debutA() {
			return $this->date_debutA;
		}
        function getdate_finA(){
			return $this->date_finA;
		}
		function gettype(){
			return $this->type;
		}
		function getlibelle(){
			return $this->libelle;
		}
		function getID_abon(){
			return $this->ID_abon;
		}
		function getid_client(){
			return $this->id_client;
		}
		
	}


?>
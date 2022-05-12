<?php
	class promotion
	{
		
		
		private $date_debut=null;
		private $date_fin=null;
		private $objet=null;
		private $pourcentage=null;
		private $id=null;
		
		//private $password=null;
		function __construct($date_debut, $date_fin, $objet, $pourcentage,$id){
			
			$this->date_debut=$date_debut;
			$this->date_fin=$date_fin;
			$this->objet=$objet;
			$this->pourcentage=$pourcentage;
			$this->id=$id;
		}
		function getid(){
			return $this->id;
		}
        function getobjet(){
			return $this->objet;
		}
        function getpourcentage(){
			return $this->pourcentage;
		}
        function getdate_debut(){
			return $this->date_debut;
		}
        function getdate_fin(){
			return $this->date_fin;
		}
       
		
	}


?>
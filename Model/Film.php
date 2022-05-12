<?php
	class Film {
		private $idf=null;
		private $titre=null;
		private $descriptions=null;
		private $dateS=null;
	
		
	
		
	
		function __construct($idf, $titre, $descriptions, $dateS,$poster){
			$this->idf=$idf;
			$this->titre=$titre;
			$this->descriptions=$descriptions;
			$this->dateS=$dateS;
			$this->poster=$poster;
		
			
		}
		function getidf(){
			return $this->idf;
		}
        function gettitre(){
			return $this->titre;
		}
        function getdescriptions(){
			return $this->descriptions;
		}
        function getdateS(){
			return $this->dateS;
		
		}
		function getcategorie(){
			return $this->categorie;
		
		}
		function setidf(int $idf){
			$this->idf=$idf;
		}
		function settitre(string $titre){
			$this->titre=$titre;
		}
		function setdescriptions(string $descriptions){
			$this->descriptions=$descriptions;
		}
		

	    }


?>
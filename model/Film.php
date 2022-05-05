<?php
	class Film {
		private $idf=null;
		private $titre=null;
		private $descriptions=null;
		private $dateS=null;
	
		
	
		
	
		function __construct($idf, $titre, $descriptions, $dateS){
			$this->idf=$idf;
			$this->titre=$titre;
			$this->descriptions=$descriptions;
			$this->dateS=$dateS;
		
			
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
			$this->id=$id;
		}
		function settitre(string $titre){
			$this->titre=$titre;
		}
		function setdescriptions(string $descriptions){
			$this->descriptions=$descriptions;
		}
		function setdateS(date $dateS){
			$this->dateS=$dateS;
		}
		

	    }


?>
<?php
	class Produit {
		private $idP=null;
		private $prix=null;
		private $libellee=null;
		private $descriptions=null;
	
		
	
		
	
		function __construct($idP, $prix, $libellee, $descriptions){
			$this->idP=$idP;
			$this->prix=$prix;
			$this->libellee=$libellee;
			$this->descriptions=$descriptions;
		
			
		}
		function getidP(){
			return $this->idP;
		}
        function getprix(){
			return $this->prix;
		}
        function getlibellee(){
			return $this->libellee;
		}
        function getdescriptions(){
			return $this->descriptions;
		
		}
		
		function setidP(int $idP){
			$this->id=$id;
		}
		function setprix(int $prix){
			$this->prix=$prix;
		}
		function setlibellee(text $libellee){
			$this->libellee=$libellee;
		}
		function setdescriptions(text $descriptions){
			$this->descriptions=$descriptions;
		}
		

	    }


?>
<?php
	class reclamation{
		private $id=null;
		private $sujet=null;
		private $contenu=null;
		private $date=null;
		private $etat=null;
		
		//private $password=null;
		function __construct($id, $sujet, $contenu, $date, $etat){
			$this->id=$id;
			$this->sujet=$sujet;
			$this->contenu=$contenu;
			$this->date=$date;
			$this->etat=$etat;
		}
		function getid(){
			return $this->id;
		}
        function getsujet(){
			return $this->sujet;
		}
        function getcontenu(){
			return $this->contenu;
		}
        function getdate(){
			return $this->date;
		}
        function getetat(){
			return $this->etat;
		}
       
		
	}


?>
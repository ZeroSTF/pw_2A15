<?php
	class reponse{
		
		private $date_Rep=null;
		private $contenu=null;
		private $id_Rep=null;
		
		
		//private $password=null;
		function __construct($date_Rep,  $contenu,$id_Rep ){
			$this->date_Rep=$date_Rep;
			$this->contenu=$contenu;
			$this->id_Rep=$id_Rep;
			
		}
		
        function getdate_Rep(){
			return $this->date_Rep;
		}
        function getcontenu(){
			return $this->contenu;
		}
		function getid_Rep(){
			return $this->id_Rep;
		}
      
		
	}


?>
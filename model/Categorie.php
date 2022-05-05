<?php
	class Categorie {
		private $idC=null;
		private $nomC=null;
		
	
		
		function __construct($idC, $nomC){
			$this->idC=$idC;
			$this->nomC=$nomC;
			
			
		}
		function getidC()
        {
			return $this->idC;
		}
        function getnomC()
        {
			return $this->nomC;
		}
    
	    }

?>
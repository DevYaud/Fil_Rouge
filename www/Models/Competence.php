<?php
	class Competence
	{
		private String $Nom;
		private float $Note_niveau;
	
		private function __construct($_Nom,$_Note_niveau){
			$this->Nom = $_Nom;
			$this->Note_niveau = $_Note_niveau;
		}
	}		
?>
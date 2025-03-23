<?php

class Personnel
{
	var string $nom;
	var string $prenom;
	var $date_naissance;
	var float $salaire;
	var bool $est_directeur;
	var String $SIRET;

	public function __construct($n,$p,$d,$s,$ed,$siret){
		$this->nom = $n;
		$this->prenom = $p;
		$this->date_naissance = $d;
		$this->salaire = $s;
		$this->est_directeur = $ed;
		$this->SIRET = $siret;
	}
	
}
?>
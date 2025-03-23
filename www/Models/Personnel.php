<?php

class Personnel
{
    var int $id_personnel;
	var string $nom;
	var string $prenom;
	var $date_naissance;
	var float $salaire;
	var bool $est_directeur;
	var String $SIRET;
    var int $Id_Etablissement;

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
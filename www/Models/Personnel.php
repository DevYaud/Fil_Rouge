<?php

class Personnel
{
    private ?int $id_personnel;
	private string $nom;
	private string $prenom;
	private $date_naissance;
	private float $salaire;
	private bool $est_directeur;
	private String $SIRET;
    private int $Id_Etablissement;

	public function __construct($n,$p,$d,$s,$ed,$siret){
		$this->nom = $n;
		$this->prenom = $p;
		$this->date_naissance = $d;
		$this->salaire = $s;
		$this->est_directeur = $ed;
		$this->SIRET = $siret;
	}
	
}
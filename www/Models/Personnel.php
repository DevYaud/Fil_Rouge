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
    //get and set :
    public function getEstDirecteur(): bool {return $this->est_directeur;}
    public function getIdPersonnel(): ?int {return $this->id_personnel;}
    public function getNom(): string {return $this->nom;}
    public function getPrenom(): string {return $this->prenom;}
    public function getDateNaissance(): string {return $this->date_naissance;}
    public function getSalaire(): float {return $this->salaire;}
    public function getId_Etablissement(): ?int {return $this->Id_Etablissement;}
    //---
    public function setPrenom(string $prenom): void{$this->prenom = $prenom;}
    public function setNom(string $nom): void{$this->nom = $nom;}
    public function setDateNaissance($date_naissance): void {$this->date_naissance = $date_naissance;}
    public function setSalaire(float $salaire): void {$this->salaire = $salaire;}
    public function setSIRET(string $SIRET): void {$this->SIRET = $SIRET;}
}
<?php

class Enfant
{
	private ?int $Id_enfant;
	private string $nom;
	private string $date_naissance;
	private int $groupe;
    private string $situation_handicap;
    private string $type_regime;

	public function __construct($nom, $date, $g, $tr, $sh)
	{
		$this->nom = $nom;
		$this->date_naissance = $date;
		$this->groupe = $g;
		$this->type_regime = $tr;
		$this->situation_handicap = $sh;
	}
    //Fonction get et set :
    public function getId_enfant(): int {return $this->Id_enfant;}
    public function getNom(): string {return $this->nom;}
    public function getDateNaissance(): string {return $this->date_naissance;}
    public function getGroupe(): int {return $this->groupe;}
    public function getSituationHandicap(): string {return $this->situation_handicap;}
    public function getTypeRegime(): string {return $this->type_regime;}

    /**@param int|null $Id_enfant */
    public function setIdEnfant(?int $Id_enfant): void {$this->Id_enfant = $Id_enfant;}
    public function setNom(string $nom): void {$this->nom = $nom;}
    public function setDateNaissance(string $date): void {$this->date_naissance = $date;}
    public function setGroupe(int $groupe): void {$this->groupe = $groupe;}
    public function setSituationHandicap(string $situation_handicap): void {$this->situation_handicap = $situation_handicap;}
    public function setTypeRegime(string $type_regime): void {$this->type_regime = $type_regime;}
}


	


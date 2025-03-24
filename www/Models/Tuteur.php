<?php

class tuteur
{
    private ?int $id_tuteur;
	private string $nom;
	private string $email;
	private string $telephone;
	private string $adresse;
	private ?string $IBAN;

	//Constructeur : 
	public function __construct($n,$email,$tel,$ad,$IB){
		$this->nom = $n;
		$this->email = $email;
		$this->telephone = $tel;
		$this->adresse = $ad;
		$this->IBAN = $IB;
	}
    public function getIdTuteur(): ?int { return $this->id_tuteur;}
    public function getNom(): string { return $this->nom; }
    public function getEmail(): string { return $this->email; }
    public function getTelephone(): string { return $this->telephone; }
    public function getAdresse(): string { return $this->adresse; }
    public function getIBAN(): string { return $this->IBAN; }
    //---
    public function setIdTuteur(?int $id_tuteur): void { $this->id_tuteur = $id_tuteur; }
    public function setNom(string $nom): void { $this->nom = $nom; }
    public function setEmail(string $email): void { $this->email = $email; }
    public function setTelephone(string $telephone): void { $this->telephone = $telephone;}
    public function setAdresse(string $adresse): void { $this->adresse = $adresse; }
    public function setIBAN(string $IBAN): void { $this->IBAN = $IBAN;}

}


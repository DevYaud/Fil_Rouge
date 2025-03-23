<?php

class tuteur
{
    private int $id_tuteur;
	private string $nom;
	private string $email;
	private string $telephone;
	private string $adresse;
	private string $IBAN;

	//Constructeur : 
	public function __construct($n,$email,$tel,$ad,$IB){
		$this->nom = $n;
		$this->email = $email;
		$this->telephone = $tel;
		$this->adresse = $ad;
		$this->IBAN = $IB;
	}
}


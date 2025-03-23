<?php

class tuteur
{
	var string $nom;
	var string $email;
	var string $telephone;
	var string $adresse;
	var string $IBAN;

	//Constructeur : 
	public function __construct($n,$email,$tel,$ad,$IB){
		$this->nom = $n;
		$this->email = $email;
		$this->telephone = $tel;
		$this->adresse = $ad;
		$this->IBAN = $IB;
	}
}


?>
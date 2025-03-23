<?php

class Enfant
{
	var int $Id_enfant;
	var string $nom;
	var $date_naissance;
	var int $groupe;
    var string $situation_handicap;
    var string $type_regime;

	public function __construct($nom, $date, $g, $tr, $sh)
	{
		$this->nom = $nom;
		$this->date_naissance = $date;
		$this->groupe = $g;
		$this->type_regime = $tr;
		$this->situation_handicap = $sh;
	}
}


	


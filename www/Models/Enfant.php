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
}


	


<?php
    class Repas
	{
        var int $id_repas;
		var string $nom;
		var string $entree;
		var string $plat;
		var string $dessert;
		var DateTime $date;
		var $ID_inscription;
	
		function __construct($_nom,$_entree,$_plat,$_dessert,$_date){
			$this->nom = $_nom;
			$this->entree = $_entree;
			$this->plat = $_plat;
			$this->dessert = $_dessert;
			$this-> date= $_date;
		}
	}

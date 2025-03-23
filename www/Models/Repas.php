<?php
    class Repas
	{
        private ?int $id_repas;
		private string $nom;
		private string $entree;
		private string $plat;
		private string $dessert;
		private DateTime $date;
		private $ID_inscription;
	
		function __construct($_nom,$_entree,$_plat,$_dessert,$_date){
			$this->nom = $_nom;
			$this->entree = $_entree;
			$this->plat = $_plat;
			$this->dessert = $_dessert;
			$this-> date= $_date;
		}
	}

<?php

	class Inscription
	{
        var int $id_inscription;
		var string $date_inscription;
		var bool $presence;
        var int $id_enfant;

		private function __construct($_date_inscription,$_presence){
			$this->date_inscription = $_date_inscription;
			$this->presence = $_presence;
		}
	}	


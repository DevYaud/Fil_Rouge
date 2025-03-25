<?php

	class Inscription
	{
        private int $id_inscription;
		private string $date_inscription;
		private ?bool $presence;
        private int $id_enfant;

		private function __construct($_date_inscription,$_presence){
			$this->date_inscription = $_date_inscription;
			$this->presence = $_presence;
		}
	}	


<?php

	class Inscription
	{
		var $date_inscription;
		var bool $presence;

		private function __construct($_date_inscription,$_presence){
			$this->date_inscription = $_date_inscription;
			$this->presence = $_presence;
		}
	}	

?>
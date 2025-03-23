<?php 
    class Facture
    {
        private ?int $Id_facture;
        private DateTime $date;
        private float $montant;
        private DateTime $echeance;
        private $ID_inscription;
    
        private function __construct($_date,$_montant,$_echeance){
            $this-> date = $_date;
            $this->montant = $_montant;
            $this->echeance = $_echeance;
        }
    }
?>
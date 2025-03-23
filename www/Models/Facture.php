<?php 
    class Facture
    {
        var $Id_facture;
        var DateTime $date;
        var float $montant;
        var DateTime $echeance;
        var $ID_inscription;
    
        private function __construct($_date,$_montant,$_echeance){
            $this-> date = $_date;
            $this->montant = $_montant;
            $this->echeance = $_echeance;
        }
    }
?>
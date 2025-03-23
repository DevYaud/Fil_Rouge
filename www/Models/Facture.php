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

        public function getId_facture(): ?int { return $this->Id_facture;}
        public function getDate(): DateTime { return $this->date; }
        public function getMontant(): float { return $this->montant; }
        public function getEcheance(): DateTime { return $this->echeance; }
        public function getID_inscription(): int { return $this->ID_inscription; }
        //---
        public function setId_facture(?int $Id_facture): void { $this-> Id_facture = $Id_facture; }
        public function setDate(DateTime $date): void { $this->date = $date;}
        public function setMontant(float $montant): void { $this->montant = $montant;}
        public function setEcheance(DateTime $echeance) : void { $this-> echeance = $echeance;}
        public function setID_inscription(int $ID_inscription): void { $this-> ID_inscription = $ID_inscription;}


    }
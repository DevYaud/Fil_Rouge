<?php
    class Etablissement
    {
        private string $SIRET;
        private string $nom;
        private string $adresse;
    
        function __construct($_SIRET,$_nom,$_adresse){
            $this->SIRET = $_SIRET;
            $this->nom = $_nom;
            $this->adresse = $_adresse;
        }
        //Get and set :
        public function getSIRET() :string {return $this->SIRET;}
        public function getNOM() :string {return $this->nom;}
        public function getADRESSE() :string {return $this->adresse;}
        //---
        public function setSIRET(string $SIRET): void {$this->SIRET = $SIRET;}
        public function setNOM(string $nom): void {$this->nom = $nom;}
        public function setADRESSE(string $adresse): void {$this->adresse = $adresse;}
    }
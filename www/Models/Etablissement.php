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
    }
?>
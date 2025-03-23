<?php
    class Etablissement
    {
        var string $SIRET;
        var string $nom;
        var string $adresse;
    
        function __construct($_SIRET,$_nom,$_adresse){
            $this->SIRET = $_SIRET;
            $this->nom = $_nom;
            $this->adresse = $_adresse;
        }
    }
?>
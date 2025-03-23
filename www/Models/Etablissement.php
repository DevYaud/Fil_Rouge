<?php
    class Etablissement
    {
        var $SIRET;
        var $nom;
        var $adresse;
    
        function __construct($_SIRET,$_nom,$_adresse){
            $this->SIRET = $_SIRET;
            $this->nom = $_nom;
            $this->adresse = $_adresse;
        }
    }
?>
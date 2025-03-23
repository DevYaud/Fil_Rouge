<?php 
    class Utilisateur
    {
        var int $Id_utilisateur;
        var string $mail;
        var string $mot_de_passe;
        var int $Id_connexion;
    
        function _construct($_mail,$_mot_de_passe){
            $this->mail = $_mail;
            $this->mot_de_passe = $_mot_de_passe;
        }
    }

<?php 
    class Utilisateur
    {
        private ?int $Id_utilisateur;
        private string $mail;
        private string $mot_de_passe;
        private ?int $Id_connexion;
    
        function _construct($_mail,$_mot_de_passe){
            $this->mail = $_mail;
            $this->mot_de_passe = $_mot_de_passe;
        }
    }

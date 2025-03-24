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
        //Get and Set :
        public function getId_utilisateur() { return $this->Id_utilisateur; }
        public function getMail() { return $this->mail; }
        public function getMot_de_passe() { return $this->mot_de_passe; }
        public function getId_connexion() { return $this->Id_connexion; }
        //---
        public function setId_utilisateur($Id_utilisateur) :void { $this->Id_utilisateur = $Id_utilisateur; }
        public function setMail($mail) :void { $this->mail = $mail; }

    }

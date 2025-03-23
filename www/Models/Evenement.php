<?php 
    class Evenement
    {
        private ?int $Id_Event;
        private string $commentaire;
        private DateTime $debut;
        private DateTime $fin;
        private int $Id_activite;
        private int $Id_personnel;
        private int $Id_inscription;
    
        function __construct($_commentaire,$_debut,$_fin){
            $this->commentaire = $_commentaire;
            $this->debut = $_debut;
            $this->fin = $_fin;
        }

        public function getId_Event() : ?int {return $this->Id_Event;}
        public function getCommentaire() : string {return $this->commentaire;}
        public function getDebut() : DateTime {return $this->debut;}
        public function getFin() : DateTime {return $this->fin;}
        public function getId_activite() : int {return $this->Id_activite;}
        public function getId_personnel() : int {return $this->Id_inscription;}
        public function getId_inscription() : int {return $this->Id_inscription;}
        //---
        public function setId_Event(int $id_Event) : void {$this->Id_Event = $id_Event;}
        public function setCommentaire(string $commentaire) : void {$this->commentaire = $commentaire;}
        public function setDebut(DateTime $debut) : void {$this->debut = $debut;}
        public function setFin(DateTime $fin) : void {$this->fin = $fin;}

    }    

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
    }    
?>
<?php 
    class Evenement
    {
        var int $Id_Event;
        var string $commentaire;
        var DateTime $debut;
        var DateTime $fin;
        var int $Id_activite;
        var int $Id_personnel;
        var int $Id_inscription;
    
        function __construct($_commentaire,$_debut,$_fin){
            $this->commentaire = $_commentaire;
            $this->debut = $_debut;
            $this->fin = $_fin;
        }
    }    
?>
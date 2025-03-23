<?php 
    class Rapport
    {
        private int $id_Rapport;
        private string $Commentaire;
        private string $info_Comportement;
        private DateTime $date;
        private int $id_Enfant;

        function __construct($_Commentaire,$_info_Comportement,$_date,$_Id_enfant){
            $this->Commentaire = $_Commentaire;
            $this->info_Comportement = $_info_Comportement;
            $this->date = $_date;
        }
    }
    

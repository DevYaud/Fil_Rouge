<?php 
    class Rapport
    {
        var int $id_Rapport;
        var string $Commentaire;
        var string $info_Comportement;
        var DateTime $date;
        var int $id_Enfant;

        function __construct($_Commentaire,$_info_Comportement,$_date,$_Id_enfant){
            $this->Commentaire = $_Commentaire;
            $this->info_Comportement = $_info_Comportement;
            $this->date = $_date;
        }
    }
    

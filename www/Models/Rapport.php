<?php 
    class Rapport
    {
        private int $id_Rapport;
        private string $Commentaire;
        private ?string $info_Comportement;
        private DateTime $date;
        private int $id_Enfant;

        function __construct($_Commentaire,$_info_Comportement,$_date,$_Id_enfant){
            $this->Commentaire = $_Commentaire;
            $this->info_Comportement = $_info_Comportement;
            $this->date = $_date;
        }

        function getId_Rapport(){ return $this->id_Rapport; }
        function getCommentaire(){ return $this->Commentaire; }
        function getInfo_Comportement(){ return $this->info_Comportement; }
        function getDate(){ return $this->date; }
        function getId_Enfant(){ return $this->id_Enfant; }
        //---
        function setId_Rapport($id_Rapport):void { $this->id_Rapport = $id_Rapport; }
        function setCommentaire($_commentaire):void { $this->Commentaire = $_commentaire; }
        public function setInfoComportement(?string $info_Comportement): void {$this->info_Comportement = $info_Comportement;}
    }
    

<?php 
    class Reunion
    {
        private ?int $Id_reunion;
        private DateTime $date;
        private int $Id_personnel;
        private int $Id_tuteur;
    
        function __construct($_date){
            $this-> date= $_date;
        }
        //Get and set :
        public function getId_reunion(){ return $this->Id_reunion; }
        public function getDate(){ return $this->date; }
        public function getId_personnel(){ return $this->Id_personnel; }
        public function getId_tuteur(){ return $this->Id_tuteur; }
        //--
        public function setDate(DateTime $date) :void {$this->date = $date;}
    }

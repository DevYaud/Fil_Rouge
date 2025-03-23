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
    }

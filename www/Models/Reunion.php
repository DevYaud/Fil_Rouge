<?php 
    class Reunion
    {
        var int $Id_reunion;
        var DateTime $date;
        var int $Id_personnel;
        var int $Id_tuteur;
    
        function __construct($_date){
            $this-> date= $_date;
        }
    }

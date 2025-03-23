<?php
class Activite
{
    var int $Id_activite;
    var string $nom;
    var string $description;
    var int $groupe;
    var int $nb_max;
    var int $Id_Specialite;
    var int $Id_thematique;
    
    //Constructeur : 
    function __construct($_nom,$_description,$_groupe,$_nb_max){
        $this->nom = $_nom;
        $this->description = $_description;
        $this->groupe = $_groupe;
        $this->nb_max = $_nb_max;
    }
}

<?php
class Activite
{
    private int $Id_activite;
    private string $nom;
    private string $description;
    private int $groupe;
    private int $nb_max;
    private int $Id_Specialite;
    private int $Id_thematique;
    
    //Constructeur : 
    function __construct($_nom,$_description,$_groupe,$_nb_max){
        $this->nom = $_nom;
        $this->description = $_description;
        $this->groupe = $_groupe;
        $this->nb_max = $_nb_max;
    }
}

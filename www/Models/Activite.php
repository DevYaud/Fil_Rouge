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
    public function getId_activite() { return $this->Id_activite;}
    public function getNom(): string {return $this->nom;}
    public function getGroupe() { return $this->groupe;}
    public function getNb_max() { return $this->nb_max;}
    public function getDescription() { return $this->description;}
    public function getId_specialite() { return $this->Id_Specialite;}
    public function getId_thematique() { return $this->Id_thematique;}
    //---
    public function setNom(string $nom) { $this->nom = $nom;}
    public function setDescription($description) { $this->description = $description;}
    public function setGroupe($groupe) { $this->groupe = $groupe;}
    public function setNb_max($nb_max) { $this->nb_max = $nb_max;}

}

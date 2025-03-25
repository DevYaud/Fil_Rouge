<?php

class Specialite
{ //Lionel : drôle de classe, un seul attribut ? 
    private string $nom;
    
    //Constructeur : 
    function __construct($_nom){
        $this->nom = $_nom;
    }
    //Get and set :
    public function getNom(){return $this->nom;}
    public function setNom($nom) : void {$this->nom = $nom;}
}

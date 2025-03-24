<?php
class Repas
{
    private ?int $id_repas;
    private string $nom;
    private string $entree;
    private string $plat;
    private string $dessert;
    private ?DateTime $date;
    private ?int $ID_inscription;

    function __construct($_nom,$_entree,$_plat,$_dessert,$_date){
        $this->nom = $_nom;
        $this->entree = $_entree;
        $this->plat = $_plat;
        $this->dessert = $_dessert;
        $this-> date= $_date;
    }
    //Get and set :
    public function getIdRepas() {return $this->id_repas;}
    public function getNom() {return $this->nom;}
    public function getEntree() {return $this->entree;}
    public function getPlat() {return $this->plat;}
    public function getDessert() {return $this->dessert;}
    public function getDate() {return $this->date;}
    public function getID_inscription() {return $this->ID_inscription;}
    //---
    public function setIdRepas(int $id_repas) :void {$this->id_repas = $id_repas;}
    public function setNom(string $nom) :void  {$this->nom = $nom;}
    public function setEntree(string $entree) :void  {$this->entree = $entree;}
    public function setPlat(string $plat) :void  {$this->plat = $plat;}
    public function setDessert(string $dessert) :void  {$this->dessert = $dessert;}
    public function setDate(DateTime $date) :void  {$this->date = $date;}
    public function setID_inscription(int $ID_inscription) :void {$this->ID_inscription = $ID_inscription;}
}

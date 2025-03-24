<?php 

class Satisfaction
{
    private ?int $Id_satisfaction;
    private string $sujet;
    private  $note;
    private $SIRET;

    function __construct($_sujet,$_note){
        $this->sujet = $_sujet;
        $this->note = $_note;
    }
    public function getId_satisfaction(){ return $this->Id_satisfaction; }
    public function getSujet(){ return $this->sujet; }
    public function getNote(){ return $this->note; }
    public function getSIRET(){ return $this->SIRET; }
    public function setSujet(string $sujet) :void { $this->sujet = $sujet; }
    public function setNote(string $note) : void { $this->note = $note; }

}

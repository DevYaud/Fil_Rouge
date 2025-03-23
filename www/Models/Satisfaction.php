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
}

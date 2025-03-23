<?php 

class Satisfaction
{
    var $Id_satisfaction;
    var $sujet;
    var $note;
    var $SIRET;

    function __construct($_sujet,$_note){
        $this->sujet = $_sujet;
        $this->note = $_note;
    }
}

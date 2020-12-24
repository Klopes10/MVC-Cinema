<?php

namespace Model\Entity;

use App\AbstractEntity;

class Realisateur extends AbstractEntity {

    private $id;
    private $nomreal;
    private $prenomreal;
    private $datenaireal;
    private $sexereal;
    private $filmographie;

    //Constructeur

    public function __construct ($data) {
        parent::hydrate($data,$this);
    }

    //getter & setter

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getNomreal(){
        return $this->nomreal;
    }
    public function setNomreal($nomreal){
        $this->nomreal = $nomreal;
        return $this;
    }
    
    public function getPrenomreal() {
        return $this->prenomreal;
    }
    public function setPrenomreal($prenomreal) {
        $this->prenomreal= $prenomreal;
        return $this;
    }

    public function getDatenaireal(){
        return $this->datenaireal->format("d-m-Y");
    }
    public function setDatenaireal($datenaireal){
        $this->datenaireal = new \DateTime($datenaireal) ;
        return $this;
    }

    public function getSexereal() {
        return $this->sexereal;
    }
    public function setSexereal($sexereal) {
        $this->sexereal = $sexereal;
        return $this;
    }

    public function getFilmographie(){
        return $this->filmographie;
    }

    public function setFilmographie($filmographie){
        $this->filmographie = $filmographie;
        return $this;
    }
    

    public function  __toString(){
        return $this->prenomreal." ".$this->nomreal;
    }
}
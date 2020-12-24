<?php

namespace Model\Entity;

use App\AbstractEntity;

class Acteur extends AbstractEntity {

    private $id;
    private $prenomacteur;
    private $nomacteur;
    private $sexeacteur;
    private $datenaiacteur;
    private $role;
    private $filmographie;


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


    public function getNomacteur(){
        return $this->nomacteur;
    }
    public function setNomacteur($nomacteur){
        $this->nomacteur = $nomacteur;
        return $this;
    }
    
    public function getPrenomacteur() {
        return $this->prenomacteur;
    }
    public function setPrenomacteur($prenomacteur) {
        $this->prenomacteur= $prenomacteur;
        return $this;
    }

    public function getDatenaiacteur(){
        return $this->datenaiacteur->format("d-m-Y");
    }
    public function setDatenaiacteur($datenaiacteur){
        $this->datenaiacteur = new \DateTime($datenaiacteur) ;
        return $this;
    }

    public function getSexeacteur() {
        return $this->sexeacteur;
    }
    public function setSexeacteur($sexeacteur) {
        $this->sexeacteur = $sexeacteur;
        return $this;
    }
    
    public function getRole() {
        return $this->role;
    }
    public function setRole($role) {
        $this->role = $role;
        return $this;
    }

    /*public function getFilmographie(){
        return $this->filmographie;
    }

    public function setFilmographie($filmographie){
        $this->filmographie = $filmographie;
        return $this;
    }*/

     // Methode
    /*public function getAge() {
        $dateajd = new Datetime ();
        $date = new Datetime ($this->_date); // Convertir une date en chaine de caract
        $interval = $date->diff ($dateajd) ;
        return $interval->format("%y ans");
    }*/
    
    public function  __toString(){
        return $this->prenomacteur." ".$this->nomacteur;
    }

 

}
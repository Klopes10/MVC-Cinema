<?php

namespace Model\Entity;

use App\AbstractEntity;

class Casting extends AbstractEntity {

    // Propriétés
    private $acteur;
    private $role;
    private $film;

    // Constructeur
    public function __construct ($data) {
        parent::hydrate($data,$this);
    
    }

    // Accesseurs / Mutateurs
    public function getActeur(){
        return $this->acteur;
    }
    public function setActeur($acteur){
        $this->acteur= $acteur;
        return $this;
    }  
    public function getRole(){
        return $this->role;
    }
    public function setRole($role){
        $this->role = $role;
        return $this;
    }  
  
    public function getFilm(){
        return $this->film;
    }
    public function setFilm($film){
        $this->film = $film;
        return $this;
    }  

    public function __toString(){
        return $this->acteur->getPrenomacteur()." ".$this->acteur->getNomacteur() ;
    }


}
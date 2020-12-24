<?php

namespace Model\Entity;

use App\AbstractEntity;

class Genre extends AbstractEntity  {
    
    // Propriétés
    private $id;
    private $libelle;

    //Constructeur
    public function __construct ($data) {
        parent::hydrate($data,$this);
    }
    
    // Accesseurs / Mutateurs
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function getLibelle(){
        return $this->libelle;
    }

    public function setLibelle($libelle){
        $this->libelle = $libelle;
        return $this;
    }

    /*public function addFilm(Film $film){
        $this->films[] = $film;
    }

    public function getAllFilms(){
        $result = "<div class='mainInfos'><h2>Films du genre : $this</h2><ul>";
        if(count($this->films) > 0){
            foreach($this->films as $film){
                $result .= "<li>".$film->getTitre()." (".$film->getAnnee().")</li>";
            }
        } else {
            $result .= "<li class='warning'>Aucun film recensé pour le moment</li>";
        }
        $result .= "</ul></div>";
        return $result;
    }*/

    public function  __toString(){
        return $this->libelle;
    }
}
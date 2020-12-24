<?php 

namespace Model\Entity;

use App\AbstractEntity;

class Role extends AbstractEntity {
    
    // Propriétés
    private $nomrole;
    private $id;

    // Constructeur.

    public function __construct ($data) {
        parent::hydrate($data,$this);
    }
    
    // Accesseurs / Mutateurs
    public function getNomRole(){
        return $this->nomrole;
    }

    public function setNomRole($nomrole){
        $this->nomrole = $nomrole;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    

    /*public function addCasting(Casting $casting){
        if (!in_array($casting, $this->castings)) $this->castings[] = $casting;
    }

    public function getActeursFilms(){
        $result = "<div class='mainInfos'><h2>Acteurs ayant incarné le rôle : $this</h2><ul>";
        foreach($this->castings as $element){
            $result .= "<li>".$element->getActeur()." (".$element->getFilm()." - ".$element->getFilm()->getAnnee().")</li>";
        }
        $result .= "</ul></div>";
        return $result;
    }*/

    public function __toString(){
        return $this->nomrole;
    }
}
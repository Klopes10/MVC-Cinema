<?php 

namespace Model\Entity;

use App\AbstractEntity;

class Film extends AbstractEntity  {

    private $id;
    private $titre;
    private $anneesortie;
    private $duree;
    private $synopsis;
    private $note;
    private $affiche;
    private $realisateur;

    //Constructeur

    public function __construct ($data) {
        parent::hydrate($data,$this);
    }

    // getter et setter

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }


    public function getTitre(){
        return $this->titre;
    }
    public function setTitre($titre){
        $this->titre = $titre;
        return $this;
    }

    public function getAnneeSortie(){
        return $this->anneesortie;
    }
    public function setAnneeSortie($anneesortie){
        $this->anneesortie = $anneesortie;
        return $this;
    }

    public function getDuree(){
        return $this->duree;
    }
    public function setDuree($duree){
        $this->duree = $duree;
        return $this;
    }

    public function getSynopsis(){
        return $this->synopsis;
    }
    public function setSynopsis($synopsis){
        $this->synopsis = $synopsis;
        return $this;
    }
    public function getNote(){
        return $this->note;
    }
    public function setNote($note){
        $this->note = $note;
        return $this;
    }    
    
    public function getAffiche(){
        return $this->affiche;
    }
    public function setAffiche($affiche){
        $this->affiche = $affiche;
        return $this;
    }

    public function getRealisateur(){
        return $this->realisateur;
    }
    public function setRealisateur($realisateur){
        $this->realisateur = $realisateur;
        return $this;
    }


    
    public function  __toString(){
        return $this->titre."<br/>";
    }

}
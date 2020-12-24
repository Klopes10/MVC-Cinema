<?php

namespace Model\Entity;

use App\AbstractEntity;

class Appartient extends AbstractEntity
{

    // Propriétés
    private $genre;
    private $film;
    

    // Constructeur
    public function __construct($data)
    {
        parent::hydrate($data, $this);
    }

    // Accesseurs / Mutateurs
    public function getGenre()
    {
        return $this->genre;
    }
    public function setGenre($genre)
    {
        $this->genre= $genre;
        return $this;
    }
    public function getFilm()
    {
        return $this->film;
    }
    public function setFilm($film)
    {
        $this->film = $film;
        return $this;
    }

    public function __toString()
    {
        return $this->genre->getLibelle();
    }
}
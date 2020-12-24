<?php

namespace Model\Manager;

use App\AbstractManager;

class AppartientManager extends AbstractManager
{
    private static $className = "Model\Entity\Appartient";
    
    public function __construct()
    {
        self::connect();        //pour aller se co à la BDD
    }

    public function findAll(){          //permet de recup toutes les acteurs
        //requête à exécuter et comment il doit renvoyer les infos
        $sql = "SELECT * 
                FROM appartient";

        return self::getResults(
            self::select($sql, null, true),
            self::$className
        );
    }

    public function findOneById($id){  //recup un salarié par ID 
        $sql = "SELECT * 
                FROM appartient a
                WHERE a.film_id = :id";    //:id => requete préparé

                return self::getOneOrNullResult(                // renvoie qu'un seul objet
                    self::select($sql, ["id"=> $id], false),
                    self::$className
                );

    
    }

    public function findFilmsByGenre($id){
        $sql = "SELECT a.film_id
                FROM appartient a
                WHERE a.genre_id= :id";

                return self::getResults(
                    self::select($sql, ["id"=> $id], true),
                    self::$className //est ce que me renvoie la méthode
                );
    }

    public function addGenresByFilm($id){          // donner des genres à un film
        $sql = "INSERT INTO appartient (film_id, genre_id)
                VALUES (:film_id, :genre_id )";

    }
    


}
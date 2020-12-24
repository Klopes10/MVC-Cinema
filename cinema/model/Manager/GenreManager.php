<?php

namespace Model\Manager;

use App\AbstractManager;

class GenreManager extends AbstractManager{

    private static $className = "Model\Entity\Genre";

    public function __construct()
    {
        self::connect();        //pour aller se co à la BDD
    }

    public function findAll(){          //permet de recup toutes les film
        //requête à exécuter et comment il doit renvoyer les infos
        $sql = "SELECT *
                FROM genre";

        return self::getResults(
            self::select($sql, null, true),
            self::$className
        );
    }

    public function findOneById($id){  //recup un salarié par ID 
        $sql = "SELECT *
                FROM genre
                WHERE id = :id";    //:id => requete préparé

                return self::getOneOrNullResult(                // renvoie qu'un seul objet
                    self::select($sql, ["id"=> $id], false),
                    self::$className
                );
    
    }

    public function findGenreByFilms($id){
        $sql = "SELECT *
                FROM appartient
                WHERE film_id = :id"
                ;  //  :id plus safe que $id
                
                return self::getResults(
                    self::select($sql, ["id"=> $id], true),
                    "Model\Entity\Appartient"       //est ce que me renvoie la méthode
                );
    }

    public function addGenre($libelle){
        $sql ="INSERT INTO genre (libelle)
                VALUES (:libelle)";
        return self::create($sql,["libelle"=> $libelle]);
    }

    public function deleteGenre($id){
        $sql ="DELETE FROM appartient
                WHERE genre_id = :id";
        self::delete($sql,["id" =>$id]);
        $sql ="DELETE FROM genre
                WHERE id = :id";
        self::delete($sql,["id"=> $id]);
    }

    public function editGenre($id, $libelle) {

        $sql = "UPDATE genre
                SET libelle = :libelle
                WHERE id = :id";

        return self::update($sql,["id" => $id,
                            "libelle"=> $libelle]);
                                    
    }
}
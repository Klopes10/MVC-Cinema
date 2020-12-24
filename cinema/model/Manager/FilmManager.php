<?php

namespace Model\Manager;

use App\AbstractManager;

class FilmManager extends AbstractManager{

    private static $className = "Model\Entity\Film";

    public function __construct()
    {
        self::connect();        //pour aller se co à la BDD
    }

    public function findAll(){          //permet de recup toutes les film
        //requête à exécuter et comment il doit renvoyer les infos
        $sql = "SELECT *
                FROM film";

        return self::getResults(
            self::select($sql, null, true),
            self::$className
        );
    }

    public function findOneById($id){  //recup un salarié par ID 
        $sql = "SELECT * 
                FROM film
                WHERE id = :id
                ";    //:id => requete préparé

                return self::getOneOrNullResult(                // renvoie qu'un seul objet
                    self::select($sql, ["id"=> $id], false),
                    self::$className
                );
    
    }

    public function findFilmsByReal($id){
        $sql = "SELECT *
                FROM film f, realisateur r
                WHERE r.id = f.realisateur_id
                AND r.id = :id"
                ;  //  :id plus safe que $id
                
                return self::getResults(
                    self::select($sql, ["id"=> $id], true),
                    self::$className       //est ce que me renvoie la méthode
                );
    }

    public function findFilmsByGenre($id){
        $sql = "SELECT *
                FROM appartient a , genre g , film f
                WHERE a.genre_id= g.id
                AND a.film_id = f.id
                AND  a.genre_id= :id";

                return self::getResults(
                    self::select($sql, ["id"=> $id], true),
                    self::$className  //est ce que me renvoie la méthode
                );
    }

    public function addFilm($titre, $anneesortie, $duree, $synopsis, $note, $affiche, $realisateurs){

        $sql = "INSERT INTO film (titre, anneesortie, duree, synopsis, note, affiche, realisateur_id  )
                VALUES (:titre, :anneesortie, :duree, :synopsis, :note, :affiche, :realisateur_id )";
                return self::create($sql,["titre" => $titre,
                    "anneesortie"=> $anneesortie,
                    "duree"=> $duree,
                    "synopsis"=> $synopsis,
                    "note" => $note,
                    "affiche" => $affiche,
                    "realisateur_id" => $realisateurs,
                   
                   ]);
    }

    public function deleteFilm($id){
        $sql = "DELETE FROM casting
                WHERE film_id = :id";
        self::delete($sql,["id" =>$id]);
        $sql ="DELETE FROM film
                WHERE id = :id";
        self::delete($sql,["id"=> $id]);
    }

    public function editFilm($id, $titre, $anneesortie, $duree, $synopsis, $note, $affiche , $realisateurs) {
        $sql = "UPDATE film
        SET  titre = :titre , anneesortie = :anneesortie , duree = :duree , synopsis = :synopsis, note = :note, affiche = :affiche , realisateur_id = :realisateur_id
        WHERE id = :id";

        return self::update($sql, ["id" => $id,                   
                                    "titre"=> $titre,
                                    "anneesortie"=> $anneesortie,
                                    "duree"=>$duree,
                                    "synopsis" => $synopsis,
                                    "note" => $note,
                                    "affiche"=> $affiche,
                                    "realisateur_id"=> $realisateurs,
                                    ]);
    }
}
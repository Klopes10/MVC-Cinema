<?php

namespace Model\Manager;

use App\AbstractManager;

class CastingManager extends AbstractManager{

    private static $className = "Model\Entity\Casting";

    public function __construct()
    {
        self::connect();        //pour aller se co à la BDD
    }

    public function findAll(){          //permet de recup toutes les acteurs
        //requête à exécuter et comment il doit renvoyer les infos
        $sql = "SELECT * 
                FROM casting";

        return self::getResults(
            self::select($sql, null, true),
            self::$className
        );
    }

    public function findOneById($id){  //recup un salarié par ID 
        $sql = "SELECT * 
                FROM casting
                WHERE id = :id";    //:id => requete préparé

                return self::getOneOrNullResult(                // renvoie qu'un seul objet
                    self::select($sql, ["id"=> $id], false),
                    self::$className
                );

    
    }

    public function findCastingByFilms($id){
        $sql = "SELECT *
                FROM film f, casting c, acteur a
                WHERE c.film_id = f.id
                AND c.acteur_id = a.id
                AND f.id = :id"
                ;  //  :id plus safe que $id
                
                return self::getResults(
                    self::select($sql, ["id"=> $id], true),
                    self::$className       //est ce que me renvoie la méthode
                );
    }

    public function addCasting($films, $roles, $acteurs){

        $sql = "INSERT INTO casting (film_id, acteur_id, role_id)
                VALUES (:film_id, :acteur_id, :role_id )";
                return self::create($sql,["film_id" => $films,
                    "role_id" => $roles,
                    "acteur_id" => $acteurs,
                    
                   
                   ]);
    }
    
}
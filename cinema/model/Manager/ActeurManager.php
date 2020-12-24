<?php

namespace Model\Manager;

use App\AbstractManager;

class ActeurManager extends AbstractManager{

    private static $className = "Model\Entity\Acteur";

    public function __construct()
    {
        self::connect();        //pour aller se co à la BDD
    }

    public function findAll(){          //permet de recup toutes les acteurs
        //requête à exécuter et comment il doit renvoyer les infos
        $sql = "SELECT * 
                FROM acteur";

        return self::getResults(
            self::select($sql, null, true),
            self::$className
        );
    }

    public function findOneById($id){  //recup un salarié par ID 
        $sql = "SELECT * 
                FROM acteur
                WHERE id = :id";    //:id => requete préparé

                return self::getOneOrNullResult(                // renvoie qu'un seul objet
                    self::select($sql, ["id"=> $id], false),
                    self::$className
                );

    
    }
    public function findActeursbyRole($id){
        $sql = "SELECT c.film_id, c.acteur_id
                FROM casting c 
                WHERE  c.role_id = :id"
                ;  //  :id plus safe que $id
                
                return self::getResults(
                    self::select($sql, ["id"=> $id], true),
                    "Model\Entity\Casting"     //est ce que me renvoie la méthode
                );
    }

    public function addActeur($nomacteur, $prenomacteur,$sexeacteur, $datenaiacteur){

        $sql = "INSERT INTO acteur (nomacteur, prenomacteur, sexeacteur, datenaiacteur)
                VALUES (:nomacteur, :prenomacteur, :sexeacteur, :datenaiacteur)";
        return self::create($sql,["nomacteur" => $nomacteur,
                                "prenomacteur"=> $prenomacteur,
                                "sexeacteur"=> $sexeacteur,
                                "datenaiacteur"=> $datenaiacteur ]);
    }

    public function deleteActeur($id){
        $sql = "DELETE FROM casting
                WHERE acteur_id = :id";
        self::delete($sql,["id" =>$id]);
        $sql ="DELETE FROM acteur
                WHERE id = :id";
        self::delete($sql,["id"=> $id]);
    }

    public function editActeur($id, $nomacteur, $prenomacteur, $sexeacteur, $datenaiacteur) {
        $sql = "UPDATE acteur
        SET nomacteur = :nomacteur, prenomacteur =:prenomacteur , sexeacteur = :sexeacteur , datenaiacteur = :datenaiacteur
        WHERE id = :id";

        return self::update($sql, ["id" => $id,
                                    "nomacteur"=> $nomacteur,
                                    "prenomacteur"=>$prenomacteur,
                                    "sexeacteur"=> $sexeacteur,
                                    "datenaiacteur"=>$datenaiacteur]);
    }
}

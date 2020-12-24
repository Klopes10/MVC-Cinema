<?php

namespace Model\Manager;

use App\AbstractManager;

class RealisateurManager extends AbstractManager{

    private static $className = "Model\Entity\Realisateur";

    public function __construct()
    {
        self::connect();        //pour aller se co à la BDD
    }

    public function findAll(){          //permet de recup toutes les acteurs
        //requête à exécuter et comment il doit renvoyer les infos
        $sql = "SELECT *
                FROM realisateur";

        return self::getResults(
            self::select($sql, null, true),
            self::$className
        );
    }

    public function findOneById($id){  //recup un salarié par ID 
        $sql = "SELECT * 
                FROM realisateur
                WHERE id = :id";    //:id => requete préparé

                return self::getOneOrNullResult(                // renvoie qu'un seul objet
                    self::select($sql, ["id"=> $id], false),
                    self::$className
                );
    
    }

    public function addReal($nomreal,$prenomreal, $sexereal, $datenaireal){
        $sql ="INSERT INTO realisateur (nomreal, prenomreal, sexereal, datenaireal)
                VALUES (:nomreal, :prenomreal, :sexereal, :datenaireal)";
        return self::create($sql,["nomreal"=> $nomreal,
                                    "prenomreal"=> $prenomreal,
                                    "sexereal" =>$sexereal,
                                    "datenaireal"=> $datenaireal]);
    }

    public function deleteRealisateur($id){

        $sql ="DELETE FROM realisateur
                WHERE id = :id";
        self::delete($sql,["id"=> $id]);
    }

    public function editRealisateur($id, $nomreal, $prenomreal, $sexereal, $datenaireal) {
        $sql = "UPDATE realisateur
        SET nomreal = :nomreal, prenomreal =:prenomreal , sexereal = :sexereal , datenaireal = :datenaireal
        WHERE id = :id";

        return self::update($sql, ["id" => $id,
                                    "nomreal"=> $nomreal,
                                    "prenomreal"=>$prenomreal,
                                    "sexereal"=> $sexereal,
                                    "datenaireal"=>$datenaireal]);
    }
    
}
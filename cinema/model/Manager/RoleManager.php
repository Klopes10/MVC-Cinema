<?php

namespace Model\Manager;

use App\AbstractManager;

class RoleManager extends AbstractManager{

    private static $className = "Model\Entity\Role";

    public function __construct()
    {
        self::connect();        //pour aller se co à la BDD
    }

    public function findAll(){          //permet de recup toutes les acteurs
        //requête à exécuter et comment il doit renvoyer les infos
        $sql = "SELECT *
                FROM role";

        return self::getResults(
            self::select($sql, null, true),
            self::$className
        );
    }

    public function findOneById($id){  //recup un salarié par ID 
        $sql = "SELECT * 
                FROM role
                WHERE id = :id";    //:id => requete préparé

                return self::getOneOrNullResult(                // renvoie qu'un seul objet
                    self::select($sql, ["id"=> $id], false),
                    self::$className
                );
    
    }

    public function findRoleByActeur($id){
        $sql = "SELECT c.film_id, c.role_id
                FROM casting c 
                WHERE c.acteur_id = :id"
                ;  //  :id plus safe que $id
                
                return self::getResults(
                    self::select($sql, ["id"=> $id], true),
                    "Model\Entity\Casting" //est ce que me renvoie la méthode
                );
    }

    public function addRole($nomRole){
        $sql ="INSERT INTO role (nomrole)
                VALUES (:nomrole)";
        return self::create($sql,["nomrole"=> $nomRole]);
    }

    public function deleteRole($id){
        $sql = "DELETE FROM casting
                WHERE role_id = :id";
        self::delete($sql,["id" =>$id]);
        $sql ="DELETE FROM role
                WHERE id = :id";
        self::delete($sql,["id"=> $id]);
    }

    public function editRole($id, $nomrole) {

        $sql = "UPDATE role
                SET nomrole= :nomrole
                WHERE id = :id";

        return self::update($sql, ["id" => $id,"nomrole"=> $nomrole]);
                                    
    }
    
}
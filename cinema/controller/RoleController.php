<?php

namespace Controller;

use Model\Manager\RoleManager;
use Model\Manager\ActeurManager;
use Model\Manager\FilmManager;
use App\Session;
use App\Router;
use Model\Manager\CastingManager;

class RoleController
{
    public function allRoles()
    {
        $manRole= new RoleManager();
        $roles = $manRole->findAll();
        return [
            "view" => "role.php",
            "data"=> [
                "roles" => $roles
            ],
            "titrePage"=> "Liste des roles"

        ];
    }

    public function detailRoles($id)
    {
        $manActeur = new ActeurManager();
        $manRole = new RoleManager();
        $acteur = $manActeur->findOneById($id);
        $roles = $manRole->findRoleByActeur($id);

        return [
            "view" => "detailRoles.php",
            "data" => [
                "acteur" => $acteur,
                "roles" => $roles
            ],
            "titrePage" => "Détail roles"
        ];
    }

    public function detailAllActeursByRoles($id)
    {
        $manRole = new RoleManager();
        $manActeur = new ActeurManager();
        $roles = $manRole->findOneById($id);
        $castings = $manActeur->findActeursByRole($id);
    

        return [
            "view" => "detailAllActeursByRoles.php",
            "data" => [
                "castings" => $castings,
                "roles" => $roles
            ],
            "titrePage" => "Détail roles"
        ];
    }

    public function newRole()
    {
        return[
            "view" => "newRole.php",
            
            "titrePage" => "Ajouter un Role"
        ];
    }
    public function addRole()
    {
        if (!empty($_POST)) {
            $nomRole = filter_input(INPUT_POST, "nomrole", FILTER_SANITIZE_STRING);

            if ($nomRole) {
                $manRole= new RoleManager();
                $manRole->addRole($nomRole);

                Session::addFlash("success", "Nouveau Role ajouté avec succès!");
                Router::redirectTo("Role", "allRoles");
            } else {
                Session::addFlash("error", "Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }
    }

    public function newCasting()
    {
        $manFilm = new FilmManager();
        $films = $manFilm->findAll();

        $manActeur = new ActeurManager();
        $acteurs = $manActeur->findAll();

        $manRole = new RoleManager();
        $roles = $manRole->findAll();

        return[
            "view" => "newCasting.php",
            "data"=>[
                "films"=> $films,
                "roles"=> $roles,
                "acteurs" => $acteurs],
            
            "titrePage" => "Ajouter un casting"
        ];
    }

    public function addCasting(){
        if(!empty($_POST)){

            $films = filter_input(INPUT_POST,"films", FILTER_SANITIZE_NUMBER_INT);          
            $roles = filter_input(INPUT_POST,"roles",FILTER_SANITIZE_NUMBER_INT);
            $acteurs = filter_input(INPUT_POST,"acteurs",FILTER_SANITIZE_NUMBER_INT);
            

            if($roles && $films && $acteurs){
                $manCasting= new CastingManager();
                $manCasting->addCasting($films, $roles, $acteurs);
                
                
                Session::addFlash("success","Nouveau casting ajouté avec succès!");
                Router::redirectTo("role","allRoles");

            }
            else{
                Session::addFlash("error","Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }
    }

    public function deleteRole($id){
        
        $manRole = new RoleManager();
        $manRole->deleteRole($id);
        Session::addFlash("success", "Role supprimé avec succès!");
        Router::redirectTo("role","allRoles");

    }

    public function editRole($id){

        $manRole = new RoleManager();
        $roles = $manRole->findOneById($id);

        return[
            "view" => "editRole.php",
            "data" => ["roles" => $roles],
            "titrePage" => "Editer un role"
        ];

    }

    public function editRoleOk($id) {
        if(!empty($_POST)){

            $roles = filter_input(INPUT_POST,"nomrole", FILTER_SANITIZE_STRING);

            if($roles){
                $manRole= new RoleManager();
                $manRole->editRole($id, $roles);

                Session::addFlash("success","Role édité avec succès!");
                Router::redirectTo("role","allRoles");

            }
            else{
                Session::addFlash("error","Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }


    }
}
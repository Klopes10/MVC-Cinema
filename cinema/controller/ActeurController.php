<?php

namespace Controller;

use Model\Manager\ActeurManager;
use Model\Manager\RoleManager;
use App\Session;
use App\Router;

class ActeurController {

    public function allActeurs(){

        $manActeur= new ActeurManager();
        $acteurs = $manActeur->findAll();
        return [
            "view" => "acteur.php",
            "data"=> [
                "acteurs" => $acteurs
            ],
            "titrePage"=> "Liste des acteurs"

        ];

    }

    public function detailActeurs($id){
        $manActeur = new ActeurManager();
        $manRole = new RoleManager();
        $acteur = $manActeur->findOneById($id);
        $castings = $manRole->findRoleByActeur($id);
        

        return [
            "view" => "detailActeurs.php",
            "data" => [
                "acteur" => $acteur,
                "castings" => $castings
            ],
            "titrePage" => "Détail roles"
        ];



    }

    public function newActeur(){

        return[
            "view" => "newActeur.php",
            "titrePage" => "Ajouter un acteur"
        ];
    }
    public function addActeur(){
        if(!empty($_POST)){

            $nomacteur = filter_input(INPUT_POST,"nomacteur", FILTER_SANITIZE_STRING);
            $prenomacteur = filter_input(INPUT_POST,"prenomacteur", FILTER_SANITIZE_STRING);
            $sexeacteur= filter_input(INPUT_POST,"sexeacteur", FILTER_SANITIZE_STRING);
            $datenaiacteur = filter_input(INPUT_POST,"datenaiacteur", FILTER_SANITIZE_STRING);

            if($nomacteur && $prenomacteur && $sexeacteur && $datenaiacteur){
                $manActeur= new ActeurManager();
                $manActeur->addActeur($nomacteur, $prenomacteur, $sexeacteur, $datenaiacteur);

                Session::addFlash("success","Nouvel acteur ajouté avec succès!");
                Router::redirectTo("acteur","allActeurs");

            }
            else{
                Session::addFlash("error","Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }
    }

    public function deleteActeur($id){
        
        $manActeur = new ActeurManager();
        $manActeur->deleteActeur($id);
        Session::addFlash("success", "Acteur supprimé avec succès!");
        Router::redirectTo("acteur","allActeurs");

    }

    public function editActeur($id){

        $manActeur = new ActeurManager();
        $acteur = $manActeur->findOneById($id);

        return[
            "view" => "editacteur.php",
            "data" => ["acteur" => $acteur],
            "titrePage" => "Editer un acteur"
        ];

    }

    public function editActeurOk($id) {
        if(!empty($_POST)){

            $nomacteur = filter_input(INPUT_POST,"nomacteur", FILTER_SANITIZE_STRING);
            $prenomacteur = filter_input(INPUT_POST,"prenomacteur", FILTER_SANITIZE_STRING);
            $sexeacteur= filter_input(INPUT_POST,"sexeacteur", FILTER_SANITIZE_STRING);
            $datenaiacteur = filter_input(INPUT_POST,"datenaiacteur", FILTER_SANITIZE_STRING);
            

            if($nomacteur && $prenomacteur && $sexeacteur && $datenaiacteur){
                $manacteur= new acteurManager();
                $manacteur->editacteur($id, $nomacteur, $prenomacteur, $sexeacteur, $datenaiacteur);

                
                Session::addFlash("success","acteur édité avec succès!");
                Router::redirectTo("acteur","allacteurs");

            }
            else{
                Session::addFlash("error","Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }


    }

}
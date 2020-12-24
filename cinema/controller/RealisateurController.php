<?php

namespace Controller;

use Model\Manager\RealisateurManager;
use Model\Manager\FilmManager;
use App\Session;
use App\Router;


class RealisateurController
{
    public function allRealisateurs()
    {
        $manRealisateur= new RealisateurManager();
        $realisateurs = $manRealisateur->findAll();
        return [
            "view" => "realisateur.php",
            "data"=> [
                "realisateurs" => $realisateurs
            ],
            "titrePage"=> "Liste des realisateurs"

        ];
    }

    public function detailRealisateurs($id)
    {
        $manRealisateur = new RealisateurManager();
        $manFilm = new FilmManager();
        $realisateur = $manRealisateur->findOneById($id);
        $films = $manFilm->findFilmsByReal($id);
        

        return [
            "view" => "detailRealisateurs.php",
            "data" => [
                "realisateur" => $realisateur,
                "films" => $films
            ],
            "titrePage" => "Détail films"
        ];
    }

    public function newRealisateur(){

        return[
            "view" => "newRealisateur.php",
            "titrePage" => "Ajouter un Realisateur"
        ];
    }
    public function addReal(){
        if(!empty($_POST)){

            $nomreal = filter_input(INPUT_POST,"nomreal", FILTER_SANITIZE_STRING);
            $prenomreal = filter_input(INPUT_POST,"prenomreal", FILTER_SANITIZE_STRING);
            $sexereal= filter_input(INPUT_POST,"sexereal", FILTER_SANITIZE_STRING);
            $datenaireal = filter_input(INPUT_POST,"datenaireal", FILTER_SANITIZE_STRING);

            if($nomreal && $prenomreal && $sexereal && $datenaireal){
                $manReal= new RealisateurManager();
                $manReal->addReal($nomreal, $prenomreal, $sexereal, $datenaireal);

                Session::addFlash("success","Nouveau Realisateur ajouté avec succès!");
                Router::redirectTo("Realisateur","allRealisateurs");

            }
            else{
                Session::addFlash("error","Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }
    }

    public function deleteRealisateur($id){
        
        $manRealisateur = new RealisateurManager();
        $manRealisateur->deleteRealisateur($id);
        Session::addFlash("success", "Realisateur supprimé avec succès!");
        Router::redirectTo("realisateur","allRealisateurs");

    }

    public function editRealisateur($id){

        $manRealisateur = new RealisateurManager();
        $realisateur = $manRealisateur->findOneById($id);

        return[
            "view" => "editRealisateur.php",
            "data" => ["realisateur" => $realisateur],
            "titrePage" => "Editer un Realisateur"
        ];

    }

    public function editRealisateurOk($id) {
        if(!empty($_POST)){

            $nomreal = filter_input(INPUT_POST,"nomreal", FILTER_SANITIZE_STRING);
            $prenomreal = filter_input(INPUT_POST,"prenomreal", FILTER_SANITIZE_STRING);
            $sexereal= filter_input(INPUT_POST,"sexereal", FILTER_SANITIZE_STRING);
            $datenaireal = filter_input(INPUT_POST,"datenaireal", FILTER_SANITIZE_STRING);
            

            if($nomreal && $prenomreal && $sexereal && $datenaireal){
                $manRealisateur= new RealisateurManager();
                $manRealisateur->editRealisateur($id, $nomreal, $prenomreal, $sexereal, $datenaireal);

                
                Session::addFlash("success","Realisateur édité avec succès!");
                Router::redirectTo("Realisateur","allRealisateurs");

            }
            else{
                Session::addFlash("error","Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }


    }
}
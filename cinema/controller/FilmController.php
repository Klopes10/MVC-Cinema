<?php

namespace Controller;

use Model\Manager\FilmManager;
use Model\Manager\CastingManager;
use Model\Manager\AppartientManager;

use App\Session;
use App\Router;

use Model\Manager\GenreManager;
use Model\Manager\RealisateurManager;

class FilmController {

    public function allFilms(){

        $manFilm= new FilmManager();
        $films = $manFilm->findAll();
        return [
            "view" => "film.php",
            "data"=> [
                "films" => $films
            ],
            "titrePage"=> "Liste des films"

        ];

    }

    public function detailFilms($id){
        $manFilm = new FilmManager();
        $manCasting = new CastingManager();
        $manGenre = new GenreManager();

        $film = $manFilm->findOneById($id);
        $castings = $manCasting->findCastingByFilms($id);
        $genres = $manGenre->findGenreByFilms($id);
        
        
        

        return [
            "view" => "detailFilm.php",
            "data" => [
                "film" => $film,
                "castings" => $castings,
                "genres" => $genres,   
                            
            ],
            "titrePage" => "Détail film"
        ];

    }

    public function newFilm(){
        $manRealisateur = new RealisateurManager();
        $realisateurs = $manRealisateur->findAll();
        
        $manGenre = new GenreManager();
        $genres = $manGenre->findAll();
    

        //$manAppartient = new AppartientManager();
        //$genres = $manAppartient->findAll();

        return[
            "view" => "newFilm.php",
            "data"=>[
                "realisateurs"=> $realisateurs,
                "genres"=> $genres],
            
            "titrePage" => "Ajouter un film"
        ];
    }
    public function addFilm(){
        if(!empty($_POST)){

            $titre = filter_input(INPUT_POST,"titre", FILTER_SANITIZE_STRING);
            $anneesortie = filter_input(INPUT_POST,"anneesortie",FILTER_SANITIZE_STRING);
            $duree = filter_input(INPUT_POST,"duree", FILTER_SANITIZE_STRING);
            $synopsis = filter_input(INPUT_POST,"synopsis", FILTER_SANITIZE_STRING);
            $note = filter_input(INPUT_POST,"note", FILTER_SANITIZE_STRING);
            $affiche = filter_input(INPUT_POST,"affiche", FILTER_SANITIZE_STRING);
            $realisateurs = filter_input(INPUT_POST,"realisateurs",FILTER_SANITIZE_NUMBER_INT);
            //$genres = filter_input(INPUT_POST,"genres",FILTER_SANITIZE_NUMBER_INT);
           
            

            if($titre && $anneesortie && $duree && $synopsis && $note && $affiche && $realisateurs){
                $manFilm= new FilmManager();
                $manFilm->addFilm($titre, $anneesortie, $duree, $synopsis, $note, $affiche, $realisateurs);
           
                Session::addFlash("success","Nouveau film ajouté avec succès!");
                Router::redirectTo("film","allFilms");

            }
            else{
                Session::addFlash("error","Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }
    }

    public function deleteFilm($id){
        
        $manFilm = new FilmManager();
        $manFilm->deleteFilm($id);
        Session::addFlash("success", "Film supprimé avec succès!");
        Router::redirectTo("film","allFilms");

    }

    public function editFilm($id){

        $manFilm = new FilmManager();
        $film = $manFilm->findOneById($id);

        //$manGenre = new GenreManager();
        //$genres = $manGenre->findAll();

        $manRealisateur = new RealisateurManager();
        $realisateurs = $manRealisateur->findAll();

        return[
            "view" => "editFilm.php",
            "data" => ["film" => $film,
                //"genres"=> $genres,                       
                "realisateurs"=> $realisateurs],
            "titrePage" => "Editer un film"
        ];

    }

    public function editFilmOk($id) {
        if(!empty($_POST)){
            
        
            $titre = filter_input(INPUT_POST,"titre", FILTER_SANITIZE_STRING);
            $anneesortie = filter_input(INPUT_POST,"anneesortie",FILTER_SANITIZE_STRING);
            $duree = filter_input(INPUT_POST,"duree", FILTER_SANITIZE_STRING);
            $synopsis = filter_input(INPUT_POST,"synopsis", FILTER_SANITIZE_STRING);
            $note = filter_input(INPUT_POST,"note", FILTER_SANITIZE_STRING);
            $affiche = filter_input(INPUT_POST,"affiche", FILTER_SANITIZE_STRING);
            $realisateurs = filter_input(INPUT_POST,"realisateurs",FILTER_SANITIZE_STRING);
            
            

            if ($titre && $anneesortie && $duree && $synopsis && $note && $affiche && $realisateurs){
                $manFilm= new FilmManager();
                $manFilm->editFilm($id, $titre, $anneesortie, $duree, $synopsis, $note, $affiche, $realisateurs);
                
                Session::addFlash("success","Film édité avec succès!");
                Router::redirectTo("film","allFilms");

            }
            else{
                Session::addFlash("error","Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }
        


    }



}
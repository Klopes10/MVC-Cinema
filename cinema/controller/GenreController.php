<?php

namespace Controller;

use Model\Manager\GenreManager;
use Model\Manager\FilmManager;
use App\Session;
use App\Router;

class GenreController {

    public function allGenres(){

        $mangenre= new GenreManager();
        $genres = $mangenre->findAll();
        return [
            "view" => "genre.php",
            "data"=> [
                "genres" => $genres
            ],
            "titrePage"=> "Liste des genres"

        ];

    }

    public function detailGenre($id)
    {
        $manGenre = new GenreManager();
        $manFilm = new FilmManager();
        $genres = $manGenre->findOneById($id);
        $films = $manFilm->findFilmsByGenre($id);
        

        return [
            "view" => "detailGenre.php",
            "data" => [
                "genres" => $genres,
                "films" => $films
            ],
            "titrePage" => "Détail genres"
        ];
    }

    public function newGenre(){

        return[
            "view" => "newGenre.php",
            "titrePage" => "Ajouter un genre"
        ];
    }
    public function addGenre(){
        if(!empty($_POST)){

            $libelle = filter_input(INPUT_POST,"libelle", FILTER_SANITIZE_STRING);

            if($libelle){
                $manGenre= new GenreManager();
                $manGenre->addGenre($libelle);

                Session::addFlash("success","Nouveau genre ajouté avec succès!");
                Router::redirectTo("genre","allGenres");

            }
            else{
                Session::addFlash("error","Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }
    }

    public function deleteGenre($id){
        
        $manGenre = new GenreManager();
        $manGenre->deleteGenre($id);
        Session::addFlash("success", "Genre supprimé avec succès!");
        Router::redirectTo("genre","allGenres");

    }

    public function editGenre($id){

        $manGenre = new GenreManager();
        $genre = $manGenre->findOneById($id);

        return[
            "view" => "editGenre.php",
            "data" => ["genre" => $genre],
            "titrePage" => "Editer un genre"
        ];

    }

    public function editGenreOk($id) {
        if(!empty($_POST)){

            $libelle = filter_input(INPUT_POST,"libelle", FILTER_SANITIZE_STRING);

            if($libelle){
                $manGenre= new GenreManager();
                $manGenre->editGenre($id, $libelle);

                
                Session::addFlash("success","Genre édité avec succès!");
                Router::redirectTo("genre","allGenres");

            }
            else{
                Session::addFlash("error","Un problème est survenu, veuillez réessayer.");
            }

            Router::redirectTo("home");
        }


    }
}
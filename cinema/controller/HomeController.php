<?php

namespace Controller;

use App\Session;

class HomeController{

    public function index(){

        Session::addFlash("success","Bievenue sur la page d'accueil!");

        return[
            "view" => "home.php",
            "data"=> [],
            "titrePage"=> "Accueil"

        ];
    }
}
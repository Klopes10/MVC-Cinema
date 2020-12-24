<?php

namespace Controller;

use Model\Manager\CastingManager;


class CastingController {

    public function allCastings(){

        $manCasting= new CastingManager();
        $castings= $manCasting->findAll();
        return [
            "view" => "casting.php",
            "data"=> [
                "castings" => $castings
            ],
            "titrePage"=> "Liste des films"

        ];

    }

}
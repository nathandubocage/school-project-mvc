<?php

namespace controllers;

use controllers\base\WebController;
use models\DBActors;
use utils\Template;

class ActorsWeb extends WebController
{
    private DBActors $actorsModel;

    function __construct()
    {
        $this->actorsModel = new DBActors();
    }

    function actors(): string
    {
        $actorsAll = $this->actorsModel->getActors();
        $actorsFiltered = [];

        foreach ($actorsAll as $actor) {
            if (isset($actorsFiltered[$actor['name']])) {
                array_push($actorsFiltered[$actor['name']], $actor);
            } else {
                $actorsFiltered[$actor['name']] = [];
                array_push($actorsFiltered[$actor['name']], $actor);
            }
        }

        return Template::render("views/actors/actors.php", ["actorsAll" => $actorsFiltered]);
    }
}

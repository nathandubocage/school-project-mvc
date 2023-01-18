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

        foreach ($actorsAll as $gallery) {
            if (isset($actorsFiltered[$gallery['title']])) {
                array_push($actorsFiltered[$gallery['title']], $gallery);
            } else {
                $actorsFiltered[$gallery['title']] = [];
                array_push($actorsFiltered[$gallery['title']], $gallery);
            }
        }
        
        return Template::render("views/global/actors.php", ["actorsAll" => $actorsFiltered]);
    }
}
<?php

namespace controllers;

use controllers\base\WebController;
use models\DBActors;
use models\DBMovies;
use utils\SessionHelpers;
use utils\Template;

class ActorsWeb extends WebController
{
    private DBActors $actorsModel;
    private DBMovies $moviesModel;

    private bool $isAdmin;
    private bool $isLogin;
    private $userId;

    function __construct()
    {
        $this->actorsModel = new DBActors();
        $this->moviesModel = new DBMovies();

        $this->isAdmin = SessionHelpers::isAdmin();
        $this->isLogin = SessionHelpers::isLogin();
        $this->userId = SessionHelpers::getUserId();
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

    function add($add, $name, $character, $picture)
    {
        if (!$this->isAdmin) header('location: ../');

        if ($add) {
            $formData = $_POST;
            $movieSelected = [];

            foreach ($formData as $key => $data) {
                if ($key == "name" || $key == "character" || $key == "picture" || $key == "add") {
                } else {
                    $movieSelected[$key] = $data;
                }
            }

            $name = htmlspecialchars($name);
            $character = htmlspecialchars($character);
            $picture = htmlspecialchars($picture);
            $actorId = $this->actorsModel->add($name, $character, $picture);

            if (count($movieSelected) > 0) {
                $this->moviesModel->addActorInMovie($movieSelected, $actorId);
                header('Location: ../actors/');
            } else {
                echo "Il faut sélectionner un film !";
            }
        } else {
            $movies = $this->moviesModel->getAll();
            return Template::render("views/actors/add.php", ["movies" => $movies]);
        }
    }

    function edit($id, $edit, $name, $character, $picture)
    {
        if (!$this->isAdmin) header('location: ../');

        if ($edit) {
            $name = htmlspecialchars($name);
            $character = htmlspecialchars($character);
            $picture = htmlspecialchars($picture);

            $formData = $_POST;
            $movieSelected = [];

            foreach ($formData as $key => $data) {
                if ($key == "name" || $key == "character" || $key == "picture" || $key == "edit") {
                } else {
                    $movieSelected[$key] = $data;
                }
            }

            $this->actorsModel->edit($id, $name, $character, $picture);

            if (count($movieSelected) > 0) {
                $this->moviesModel->resetActorInMovie($id);
                $this->moviesModel->addActorInMovie($movieSelected, $id);
                header('Location: ../actors/');
            } else {
                echo "Il faut sélectionner un film !";
            }

            header('Location: ../');
        } else {
            $currentActor = $this->actorsModel->getOne($id);
            $movies = $this->moviesModel->getAll();
            $movies_actors = $this->moviesModel->getMoviesPlayedByOneActor($id);

            $moviesTest = [];

            foreach ($movies_actors as $mv) {
                $moviesTest[$mv['movie_id']] = "checked";
            }

            return Template::render("views/actors/edit.php", ["currentActor" => $currentActor, "movies" => $movies, 'movies_actors' => $moviesTest]);
        }
    }

    function delete($id)
    {
        if ($this->isAdmin) header('location: ../');

        $this->actorsModel->delete($id);
        header("Location: ..");
    }
}

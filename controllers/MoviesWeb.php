<?php

namespace controllers;

use controllers\base\WebController;
use models\DBActors;
use models\DBMovies;
use models\DBGallery;
use models\DBComments;

use utils\Template;

class MoviesWeb extends WebController
{
    private DBMovies $movieModel;
    private DBGallery $galleryModel;
    private DBComments $commentsModel;
    private DBActors $actorsModel;

    function __construct()
    {
        $this->movieModel = new DBMovies();
        $this->galleryModel = new DBGallery();
        $this->commentsModel = new DBComments();
        $this->actorsModel = new DBActors();
    }

    function movies(): string
    {
        $movies = $this->movieModel->getAll();
        return Template::render("views/movies/list.php", ['movies' => $movies]);
    }

    function movie(string $id)
    {
        $movie = $this->movieModel->getOne($id);
        $gallery = $this->galleryModel->getGalleryByMovieId($id);
        $comments = $this->commentsModel->getCommentsByMovieId($id);
        $actors = $this->actorsModel->getActorsByMovieId($id);

        return Template::render("views/movies/single.php", ["movie" => $movie, "gallery" => $gallery, "comments" => $comments, "actors" => $actors]);
    }

    function add($add, $title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary) {
        if (isset($add)) {
            $title = htmlspecialchars($title);
            $released_at = htmlspecialchars($released_at);
            $film_poster = htmlspecialchars($film_poster);
            $synopsis = htmlspecialchars($synopsis);
            $banner = htmlspecialchars($banner);
            $trailer = htmlspecialchars($trailer);
            $summary = htmlspecialchars($summary);

            if ($released_at == "") {
                echo "Impossible d'ajouter sans une date valide";
            } else {
                $this->movieModel->add($title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary);
                header('location: ../');
            }
        }

        return Template::render("views/movies/add.php");
    }

    function delete($id) {
        $this->movieModel->delete($id);
        header('location: ../');
    }

    function edit($id, $edit, $title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary) {
        if ($edit) {
            $this->movieModel->edit($title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary);
            header("location: ../");
        } else {
            $currentMovie = $this->movieModel->getOne($id);
            return Template::render("views/movies/edit.php", ["currentMovie" => $currentMovie]);
        }
    }
}

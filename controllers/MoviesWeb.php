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
}

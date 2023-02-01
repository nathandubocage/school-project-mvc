<?php

namespace controllers;

use controllers\base\WebController;
use models\DBActors;
use models\DBMovies;
use models\DBGallery;
use models\DBComments;
use utils\SessionHelpers;
use utils\Template;

class MoviesWeb extends WebController
{
    private DBMovies $movieModel;
    private DBGallery $galleryModel;
    private DBComments $commentsModel;
    private DBActors $actorsModel;

    private bool $isAdmin;
    private bool $isLogin;
    private $userId;

    function __construct()
    {
        $this->movieModel = new DBMovies();
        $this->galleryModel = new DBGallery();
        $this->commentsModel = new DBComments();
        $this->actorsModel = new DBActors();

        $this->isAdmin = SessionHelpers::isAdmin();
        $this->isLogin = SessionHelpers::isLogin();
        $this->userId = SessionHelpers::getUserId();
    }

    function movies(): string
    {
        $movies = $this->movieModel->getAll();

        return Template::render("views/movies/list.php", [
            'movies' => $movies,
            'is_admin' => $this->isAdmin
        ]);
    }

    function movie(string $id)
    {
        $movie = $this->movieModel->getOne($id);

        if ($movie == null) {
            header('location: ../../../../');
            exit;
        }

        $gallery = $this->galleryModel->getGalleryByMovieId($id);
        $comments = $this->commentsModel->getCommentsByMovieId($id);
        $actors = $this->actorsModel->getActorsByMovieId($id);

        return Template::render("views/movies/single.php", [
            "movie" => $movie,
            "gallery" => $gallery,
            "comments" => $comments,
            "actors" => $actors,
            "is_login" => $this->isLogin,
            "user_id" => $this->userId
        ]);
    }

    function add($add_button, $title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary, $picture_1, $picture_2, $picture_3)
    {
        if (!$this->isAdmin) header('location: ../../../../');

        $error = "";

        if (isset($add_button)) {
            $title = htmlspecialchars($title);
            $released_at = htmlspecialchars($released_at);
            $film_poster = htmlspecialchars($film_poster);
            $synopsis = htmlspecialchars($synopsis);
            $banner = htmlspecialchars($banner);
            $trailer = htmlspecialchars($trailer);
            $summary = htmlspecialchars($summary);

            $picture_1 = htmlspecialchars($picture_1);
            $picture_2 = htmlspecialchars($picture_2);
            $picture_3 = htmlspecialchars($picture_3);

            if ($released_at == "") {
                $error = "Il est impossible d'ajouter un film sans date valide";
            } else {
                $movieId = $this->movieModel->add($title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary);

                if ($picture_1 != "" || $picture_2 != "" || $picture_3 != "") {
                    $pictures = [];

                    if ($picture_1 != "") {
                        array_push($pictures, $picture_1);
                    }

                    if ($picture_2 != "") {
                        array_push($pictures, $picture_2);
                    }

                    if ($picture_3 != "") {
                        array_push($pictures, $picture_3);
                    }

                    $this->galleryModel->addPicturesInMovie($movieId, $pictures);
                }

                header('location: ../');
            }
        }

        return Template::render("views/movies/add.php", ["error" => $error]);
    }

    function delete($id)
    {
        if (!$this->isAdmin) {
            header('location: ../../../../');
        } else {
            $this->commentsModel->deleteCommentsByMovieId($id);
            $this->galleryModel->deletePicturesByMovieId($id);
            $this->movieModel->delete($id);
            header('location: ../');
        }
    }

    function edit($id, $edit, $title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary, $gallery_1, $gallery_2, $gallery_3, $gallery_1_id, $gallery_2_id, $gallery_3_id)
    {
        if (!$this->isAdmin) header('location: ../../../../');

        if ($edit) {
            $this->movieModel->edit($id, $title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary);
            $picturesToEdit = [];
            $picturesToAdd = [];

            if ($gallery_1_id != "") {
                $picturesToEdit[$gallery_1_id] = $gallery_1;
            } else if ($gallery_1_id == "" && $gallery_1 != "") {
                array_push($picturesToAdd, $gallery_1);
            }

            if ($gallery_2_id != "") {
                $picturesToEdit[$gallery_2_id] = $gallery_2;
            } else if ($gallery_2_id == "" && $gallery_2 != "") {
                array_push($picturesToAdd, $gallery_2);
            }

            if ($gallery_3_id != "") {
                $picturesToEdit[$gallery_3_id] = $gallery_3;
            } else if ($gallery_3_id == "" && $gallery_3 != "") {
                array_push($picturesToAdd, $gallery_3);
            }

            $this->galleryModel->editPicturesInMovie($picturesToEdit);
            $this->galleryModel->addPicturesInMovie($id, $picturesToAdd);

            header("location: ../");
        } else {
            $currentMovie = $this->movieModel->getOne($id);
            $currentGallery = $this->galleryModel->getGalleryByMovieId($id);
            return Template::render("views/movies/edit.php", ["currentMovie" => $currentMovie, "currentGallery" => $currentGallery]);
        }
    }
}

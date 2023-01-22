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

    function add($add, $title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary, $gallery_1, $gallery_2, $gallery_3)
    {
        if (isset($add)) {
            $title = htmlspecialchars($title);
            $released_at = htmlspecialchars($released_at);
            $film_poster = htmlspecialchars($film_poster);
            $synopsis = htmlspecialchars($synopsis);
            $banner = htmlspecialchars($banner);
            $trailer = htmlspecialchars($trailer);
            $summary = htmlspecialchars($summary);

            $gallery_1 = htmlspecialchars($gallery_1);
            $gallery_2 = htmlspecialchars($gallery_2);
            $gallery_3 = htmlspecialchars($gallery_3);

            if ($released_at == "") {
                echo "Impossible d'ajouter sans une date valide";
            } else {
                $movieId = $this->movieModel->add($title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary);

                if ($gallery_1 != "" || $gallery_2 != "" || $gallery_3 != "") {
                    $pictures = [];

                    if ($gallery_1 != "") {
                        array_push($pictures, $gallery_1);
                    }

                    if ($gallery_2 != "") {
                        array_push($pictures, $gallery_2);
                    }

                    if ($gallery_3 != "") {
                        array_push($pictures, $gallery_3);
                    }

                    $this->galleryModel->addPicturesInMovie($movieId, $pictures);
                }

                header('location: ../');
            }
        }

        return Template::render("views/movies/add.php");
    }

    function delete($id)
    {
        $this->movieModel->delete($id);
        $this->galleryModel->deletePicturesInMovie($id);
        header('location: ../');
    }

    function edit($id, $edit, $title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary, $gallery_1, $gallery_2, $gallery_3, $gallery_1_id, $gallery_2_id, $gallery_3_id)
    {
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

    function edit_comment($edit, $id, $comment_id, $content)
    {
        if ($edit) {
            $content = htmlspecialchars($content);

            if ($content != "") {
                $this->commentsModel->update($comment_id, $content);
                header("location: ../");
            }
        }

        $currentComment = $this->commentsModel->getOne($comment_id);
        return Template::render("views/comments/edit.php", ["currentComment" => $currentComment]);
    }

    function delete_comment($comment_id)
    {
        $this->commentsModel->deleteOne($comment_id);
        header('location: ../');
    }
}

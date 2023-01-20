<?php

namespace models;

use models\base\SQL;
use PDO;

class DBGallery extends SQL
{
    public function __construct()
    {
        parent::__construct('gallery');
    }

    function getGallery()
    {
        $stmt = $this->getPdo()->prepare(
            "SELECT gallery.picture, movies.id, movies.title 
            FROM gallery 
            INNER JOIN movies 
            ON gallery.movie_id = movies.id"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getGalleryByMovieId(string $movieId)
    {
        $stmt = $this->getPdo()->prepare("SELECT * FROM gallery WHERE movie_id = ?");
        $stmt->execute([$movieId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function addPicturesInMovie(string $movieId, array $pictures) 
    {
        foreach ($pictures as $picture) {
            $stmt = $this->getPdo()->prepare("INSERT INTO gallery (movie_id, picture) VALUES (?, ?)");
            $stmt->execute([$movieId, $picture]);
            $stmt->fetch();
        }
    }

    function editPicturesInMovie(array $picturesToEdit) 
    {
        foreach ($picturesToEdit as $id => $pictureToEdit) {
            $stmt = $this->getPdo()->prepare("UPDATE gallery SET picture = ? WHERE id = ?");
            $stmt->execute([$pictureToEdit, $id]);
            $stmt->fetch();
        }
    }

    function deletePicturesInMovie(string $id) {
        $stmt = $this->getPdo()->prepare("DELETE FROM gallery WHERE movie_id = ?");
        $stmt->execute([$id]);
        $stmt->fetchAll();
    }
}

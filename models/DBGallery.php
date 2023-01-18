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
        $stmt = $this->getPdo()->prepare("SELECT gallery.picture, movies.id, movies.title 
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

}

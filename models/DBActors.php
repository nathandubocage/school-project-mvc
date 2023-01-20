<?php
namespace models;

use models\base\SQL;
use PDO;

class DBActors extends SQL
{
    public function __construct()
    {
        parent::__construct('actors');
    }

    function getActors()
    {
        $stmt = $this->getPdo()->prepare("SELECT actors.id AS actor_id, actors.name, actors.character, actors.picture, movies.id, movies.title 
            FROM actors
            INNER JOIN movies_actors 
            ON movies_actors.actor_id = actors.id 
            INNER JOIN movies 
            ON movies_actors.movie_id = movies.id"
        );
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getActorsByMovieId(string $movieId)
    {
        $stmt = $this->getPdo()->prepare("SELECT actors.name, actors.character, actors.picture 
            FROM actors 
            INNER JOIN movies_actors 
            ON movies_actors.actor_id = actors.id 
            INNER JOIN movies 
            ON movies_actors.movie_id = movies.id 
            WHERE movies.id = ?"
        );
        $stmt->execute([$movieId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
<?php
namespace models;

use models\base\SQL;

class DBMovies extends SQL
{
    public function __construct()
    {
        parent::__construct('movies');
    }

    public function add($title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary)
    {
        $stmt = $this->getPdo()->prepare("INSERT INTO movies (title, released_at, film_poster, synopsis, banner, trailer, summary) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary]);
        $stmt->fetch();
        return $this->getPdo()->lastInsertId();
    }

    public function delete($movieId) {
        $stmt = $this->getPdo()->prepare("DELETE FROM movies WHERE id = ?");
        $stmt->execute([$movieId]);
        return $stmt->fetch();
    }

    public function edit($id, $title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary) {
        $stmt = $this->getPdo()->prepare("UPDATE movies SET title = ?, released_at = ?, film_poster = ?, synopsis = ?, banner = ?, trailer = ?, summary = ? WHERE id = ?");
        $stmt->execute([$title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary, $id]);
        return $stmt->fetch();
    }

    public function addActorInMovie(array $movies, string $actorId) 
    {
        foreach ($movies as $movieId => $value) 
        {
            $stmt = $this->getPdo()->prepare("INSERT INTO movies_actors (movie_id, actor_id) VALUES (?, ?)");
            $stmt->execute([$movieId, $actorId]);
            $stmt->fetch();
        }
    }
}
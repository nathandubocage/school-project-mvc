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
        return $stmt->fetch();
    }

    public function delete($movieId) {
        $stmt = $this->getPdo()->prepare("DELETE FROM movies WHERE id = ?");
        $stmt->execute([$movieId]);
        return $stmt->fetch();
    }

    public function edit($title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary) {
        $stmt = $this->getPdo()->prepare("UPDATE movies SET title = ?, released_at = ?, film_poster = ?, synopsis = ?, banner = ?, trailer = ?, summary = ?");
        $stmt->execute([$title, $released_at, $film_poster, $synopsis, $banner, $trailer, $summary]);
        return $stmt->fetch();
    }
}
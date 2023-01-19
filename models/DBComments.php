<?php

namespace models;

use models\base\SQL;
use PDO;

class DBComments extends SQL
{
    public function __construct()
    {
        parent::__construct('comments');
    }

    function getCommentsByMovieId(string $movieId)
    {
        $stmt = $this->getPdo()->prepare(
            "SELECT users.username, comments.created_at, comments.content 
            FROM comments  
            INNER JOIN users  
            ON comments.user_id = users.id 
            WHERE comments.movie_id = ?"
        );
        $stmt->execute([$movieId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    function addComments(string $movieId, string $userId, string $content)
    {
        $stmt = $this->getPdo()->prepare("INSERT INTO comments (user_id, content, movie_id) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $content, $movieId]);
        return $stmt->fetch();
    }
}

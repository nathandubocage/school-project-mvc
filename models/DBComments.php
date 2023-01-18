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
        $stmt = $this->getPdo()->prepare("SELECT users.username, comments.created_at, comments.content 
            FROM comments  
            INNER JOIN users  
            ON comments.user_id = users.id 
            WHERE comments.movie_id = ?"
        );
        $stmt->execute([$movieId]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }
}

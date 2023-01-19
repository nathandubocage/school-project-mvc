<?php

namespace controllers;

use controllers\base\WebController;

use models\DBComments;
use utils\SessionHelpers;

class CommentsWeb extends WebController
{
    private DBComments $commentsModel;

    function __construct()
    {
        $this->commentsModel = new DBComments();
    }

    function add($movie_id, $message)
    {

        $movie_id = htmlspecialchars($movie_id);
        $message = htmlspecialchars($message);

        if (SessionHelpers::isLogin()) {
            $this->commentsModel->addComments($movie_id, $_SESSION['id'], $message);
            header("location: ../movies/{$movie_id}");
        }
    }
}

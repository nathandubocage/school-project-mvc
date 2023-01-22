<?php

namespace controllers;

use controllers\base\WebController;
use models\DBComments;
use utils\SessionHelpers;

class CommentsWeb extends WebController
{
    private DBComments $commentsModel;

    private bool $isLogin;
    private $userId;


    function __construct()
    {
        $this->commentsModel = new DBComments();
        $this->isLogin = SessionHelpers::isLogin();
        $this->userId = SessionHelpers::getUserId();
    }

    function add($movie_id, $message)
    {
        if (!$this->isLogin) header('location: ../');

        $movie_id = htmlspecialchars($movie_id);
        $message = htmlspecialchars($message);

        if ($this->isLogin) {
            $this->commentsModel->addComments($movie_id, $this->userId, $message);
            header("location: ../movies/{$movie_id}");
        }
    }
}

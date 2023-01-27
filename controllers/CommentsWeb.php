<?php

namespace controllers;

use controllers\base\WebController;
use models\DBComments;
use utils\SessionHelpers;
use utils\Template;

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
        if (!$this->isLogin) header('location: ../../');

        $movie_id = htmlspecialchars($movie_id);
        $message = htmlspecialchars($message);

        if ($this->isLogin) {
            $this->commentsModel->addComment($movie_id, $this->userId, $message);
            header("location: ../../movies/{$movie_id}/");
        }
    }

    function edit($edit, $comment_id, $content, $movie_id)
    {
        $current_comment = $this->commentsModel->getOne($comment_id);

        if (!($this->isLogin) || SessionHelpers::getUserId() != $current_comment->user_id) header('location: ../../../../../');

        if ($edit) {
            $content = htmlspecialchars($content);

            if ($content != "") {
                $this->commentsModel->update($comment_id, $content);
                header("location: ../../../../../movies/{$movie_id}/");
            }
        }

        $currentComment = $this->commentsModel->getOne($comment_id);
        return Template::render("views/comments/edit.php", ["currentComment" => $currentComment]);
    }

    function delete($comment_id, $movie_id)
    {
        $current_comment = $this->commentsModel->getOne($comment_id);

        if (!($this->isLogin) || SessionHelpers::getUserId() != $current_comment->user_id) {
            header('location: ../../../../../');
            exit;
        }

        $this->commentsModel->deleteOne($comment_id);
        header("location: ../../../../../movies/{$movie_id}/");
    }
}

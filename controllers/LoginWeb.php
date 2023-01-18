<?php

namespace controllers;

use controllers\base\WebController;

use models\DBLogin;

use utils\Template;

class LoginWeb extends WebController
{
    private DBLogin $loginModel;

    function __construct()
    {
        $this->loginModel = new DBLogin();
    }

    function index()
    {
        return Template::render(
            "views/account/login.php",
        );
    }

    function run($username, $password)
    {
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $user = $this->loginModel->run($username, $password);

        if ($user) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;

            header('location: ../');
        } else {
            echo 'Impossible de vous authentifier';
        }
    }

    function logout()
    {
        session_destroy();
        header('location: ../');
        exit;
    }
}

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
            "views/global/login.php",
        );
    }

    function run()
    {
        $this->loginModel->run();
    }

    function logout()
    {
        session_destroy ();
        header('location: ../');
        exit;
    }
}
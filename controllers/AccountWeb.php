<?php

namespace controllers;

use controllers\base\WebController;
use models\DBAccount;
use utils\SessionHelpers;
use utils\Template;

class AccountWeb extends WebController
{
    private DBAccount $accountModel;

    function __construct()
    {
        $this->accountModel = new DBAccount();
    }

    function login()
    {
        return Template::render(
            "views/account/login.php",
        );
    }

    function login_run($username, $password)
    {
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $password = "aq1" . sha1($password . "&@!?==") . "25";
        $user = $this->accountModel->login_run($username, $password);

        if ($user) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            header('location: ../');
        } else {
            echo 'Impossible de vous authentifier';
        }
    }

    function logout()
    {
        SessionHelpers::logout();
        header('location: ../');
        exit();
    }

    function register($error)
    {
        return Template::render("views/account/register.php", ["error" => $error]);
    }

    function register_run($username, $password, $password_confirmation, $email)
    {
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);
        $password_confirmation = htmlspecialchars($password_confirmation);
        $email = htmlspecialchars($email);

        if ($password_confirmation != $password) {
            header('location: ../register?error=Les deux mots de passes sont différents');
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header('location: ../register?error=L\'adresse mail n\'a pas un format valide');
            exit();
        }

        $emailAlreadyUsed = $this->accountModel->checkEmail($email);

        if ($emailAlreadyUsed) {
            header("location: ../register?error=L'adresse mail est déjà utilisé");
            exit();
        }

        $password = "aq1" . sha1($password . "&@!?==") . "25";
        $this->accountModel->register_run($username, $password, $email);
        header("location: ../");
    }
}

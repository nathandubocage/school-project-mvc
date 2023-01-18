<?php
namespace models;

use models\base\SQL;

class DBLogin extends SQL
{
    function __construct()
    {
        parent::__construct('users', 'id');
    }

    function run()
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        $stmt = $this->getPdo()->prepare("SELECT * FROM users WHERE username = '$user_name' AND password = '$password'");
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            session_start ();

            $_SESSION['username'] = $_POST['user_name'];
            $_SESSION['password'] = $_POST['password'];
            header ('location: ../');
        }
        else {
            echo '<body onLoad="alert(\'TES QUI?\')">';
        }
    }
}
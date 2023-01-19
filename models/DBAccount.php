<?php

namespace models;

use models\base\SQL;

class DBAccount extends SQL
{
    function __construct()
    {
        parent::__construct('users', 'id');
    }

    function login_run(string $username, string $password): mixed
    {
        $stmt = $this->getPdo()->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        return $stmt->fetch();
    }

    function checkEmail($email): bool
    {
        $stmt = $this->getPdo()->prepare("SELECT COUNT(*) AS numberEmail FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $fetch = $stmt->fetch();
        return $fetch['numberEmail'] == 0 ? false : true;
    }

    function register_run(string $username, string $password, string $email)
    {
        $stmt = $this->getPdo()->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $email]);
        return $stmt->fetch();
    }
}

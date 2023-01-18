<?php

namespace models;

use models\base\SQL;

class DBLogin extends SQL
{
    function __construct()
    {
        parent::__construct('users', 'id');
    }

    function run(string $username, string $password)
    {
        $stmt = $this->getPdo()->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$username, $password]);
        return $stmt->fetch();
    }
}

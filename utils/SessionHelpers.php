<?php


namespace utils;


class SessionHelpers
{
    public function __construct()
    {
        SessionHelpers::init();
    }

    static function init(): void
    {
        session_start();
    }

    static function login(mixed $username): void
    {
        $_SESSION['username'] = $username;
    }

    static function logout(): void
    {
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        unset($_SESSION['role']);
    }

    static function getConnected(): mixed
    {
        if (SessionHelpers::isLogin()) {
            return $_SESSION['username'];
        } else {
            return array();
        }
    }

    static function getUserId(): mixed
    {
        if (SessionHelpers::isLogin()) {
            return $_SESSION['id'];
        } else {
            return array();
        }
    }

    static function isLogin(): bool
    {
        return isset($_SESSION['username']);
    }

    static function isAdmin(): bool
    {
        return isset($_SESSION['role']) && $_SESSION['role'] == "ADMIN";
    }
}

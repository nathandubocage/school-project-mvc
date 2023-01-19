<?php

namespace routes;

use controllers\AccountWeb;
use controllers\GalleryWeb;
use controllers\HomeWeb;
use controllers\MoviesWeb;
use controllers\ActorsWeb;
use controllers\LoginWeb;

use routes\base\Route;

class Web
{
    function __construct()
    {
        $home = new HomeWeb();
        Route::Add("/", [$home, "home"]);

        $movies = new MoviesWeb();
        Route::Add("/movies", [$movies, "movies"]);
        Route::Add("/movies/{id}", [$movies, "movie"]);

        $gallery = new GalleryWeb();
        Route::Add("/gallery", [$gallery, "gallery"]);

        $actors = new ActorsWeb();
        Route::Add("/actors", [$actors, "actors"]);

        $account = new AccountWeb();
        Route::Add('/login', [$account, 'login']);
        Route::Add('/login/run', [$account, 'login_run']);
        Route::Add('/logout', [$account, 'logout']);
        Route::Add('/register', [$account, 'register']);
        Route::Add('/register/run', [$account, 'register_run']);
    }
}

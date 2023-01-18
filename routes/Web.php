<?php

namespace routes;

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

        $login = new LoginWeb();
        Route::Add('/login', [$login, 'index']);
        Route::Add('/login/run', [$login, 'run']);
        Route::Add('/logout', [$login, 'logout']);
    }
}


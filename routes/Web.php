<?php

namespace routes;

use controllers\AccountWeb;
use controllers\GalleryWeb;
use controllers\HomeWeb;
use controllers\MoviesWeb;
use controllers\ActorsWeb;
use controllers\CommentsWeb;
use controllers\LoginWeb;

use routes\base\Route;

class Web
{
    function __construct()
    {
        $home = new HomeWeb();
        Route::Add("/", [$home, "home"]);

        $movies = new MoviesWeb();
        Route::Add("/movies/", [$movies, "movies"]);
        Route::Add("/movies/add", [$movies, "add"]);
        Route::Add("/movies/{id}/edit", [$movies, "edit"]);
        Route::Add("/movies/{id}/delete", [$movies, "delete"]);
        Route::Add("/movies/{id}", [$movies, "movie"]);

        $gallery = new GalleryWeb();
        Route::Add("/gallery/", [$gallery, "gallery"]);

        $actors = new ActorsWeb();
        Route::Add("/actors/", [$actors, "actors"]);
        Route::Add("/actors/add", [$actors, "add"]);
        Route::Add("/actors/{id}/edit", [$actors, "edit"]);
        Route::Add("/actors/{id}/delete", [$actors, "delete"]);

        $account = new AccountWeb();
        Route::Add('/login', [$account, 'login']);
        Route::Add('/login/run', [$account, 'login_run']);
        Route::Add('/logout', [$account, 'logout']);
        Route::Add('/register', [$account, 'register']);
        Route::Add('/register/run', [$account, 'register_run']);

        $comments = new CommentsWeb();
        Route::Add('/comments/add', [$comments, 'add']);
    }
}

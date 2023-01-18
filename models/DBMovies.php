<?php
namespace models;

use models\base\SQL;

class DBMovies extends SQL
{
    public function __construct()
    {
        parent::__construct('movies');
    }
}
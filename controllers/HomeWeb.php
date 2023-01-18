<?php

namespace controllers;

use controllers\base\WebController;
use utils\Template;

class HomeWeb extends WebController
{
    function home(): string
    {
        return Template::render("views/global/home.php");
    }
}
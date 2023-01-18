<?php

namespace controllers;

use controllers\base\WebController;
use models\DBGallery;
use utils\Template;

class GalleryWeb extends WebController
{
    private DBGallery $galleryModel;

    function __construct()
    {
        $this->galleryModel = new DBGallery();
    }

    function gallery(): string
    {
        $galleryAll = $this->galleryModel->getGallery();
        $galleryFiltered = [];

        foreach ($galleryAll as $gallery) {
            if (isset($galleryFiltered[$gallery['title']])) {
                array_push($galleryFiltered[$gallery['title']], $gallery['picture']);
            } else {
                $galleryFiltered[$gallery['title']] = [];
                array_push($galleryFiltered[$gallery['title']], $gallery['picture']);
            }
        }

        return Template::render("views/gallery/gallery.php", ['galleryAll' => $galleryFiltered]);
    }
}

<h1>Modifier un film</h1>

<form method="post" action="#">
    <label for="title">Titre du film</label>
    <input id="title" type="text" name="title" value="<?= $currentMovie->title; ?>" /> 
    <br />

    <label for="released_at">Date de sortie</label>
    <input id="released_at" type="date" name="released_at" value="<?= $currentMovie->released_at; ?>" />
    <br />

    <label for="film_poster">Affiche du film</label>
    <input id="film_poster" type="text" name="film_poster" value="<?= $currentMovie->film_poster; ?>" />
    <br />

    <label for="synopsis">Synopsis</label>
    <input id="synopsis" type="text" name="synopsis" value="<?= $currentMovie->synopsis; ?>" />
    <br />

    <label for="banner">Bannière</label>
    <input id="banner" type="text" name="banner" value="<?= $currentMovie->banner; ?>" />
    <br />

    <label for="trailer">Trailer</label>
    <input id="trailer" type="text" name="trailer" value="<?= $currentMovie->trailer; ?>" />
    <br />

    <textarea name="summary"><?= $currentMovie->summary; ?></textarea>
    <br />

    <h2>Galerie d'images du film</h2>
    <small>Vous pouvez ajouter seulement 3 images par site</small> <br /> <br />

    <input type="url" placeholder="Adresse de l'image" name="gallery_1" value="<?= isset($currentGallery[0]->picture) ? $currentGallery[0]->picture  : "" ?>" />
    <input type="hidden" name="gallery_1_id" value="<?= isset($currentGallery[0]->picture) ? $currentGallery[0]->id  : "" ?>" />
    <input type="url" placeholder="Adresse de l'image" name="gallery_2" value="<?= isset($currentGallery[1]->picture) ? $currentGallery[1]->picture  : "" ?>" />
    <input type="hidden" name="gallery_2_id" value="<?= isset($currentGallery[1]->picture) ? $currentGallery[1]->id  : "" ?>" />
    <input type="url" placeholder="Adresse de l'image" name="gallery_3" value="<?= isset($currentGallery[2]->picture) ? $currentGallery[2]->picture  : "" ?>" />
    <input type="hidden" name="gallery_3_id" value="<?= isset($currentGallery[2]->picture) ? $currentGallery[2]->id  : "" ?>" />
    <br /> <br />

    <input type="submit" name="edit" value="Valider" />
</form>
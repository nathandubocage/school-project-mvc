<section class="add-actor">


    <h1 class="add-title title">Modifier un film</h1>
    
    <form method="post" action="#">
        <label class="label-form mt-10" for="title">Titre du film</label>
        <input class="input-container" id="title" type="text" name="title" value="<?= $currentMovie->title; ?>" /> 
        <br />
    
        <label class="label-form mt-10" for="released_at">Date de sortie</label>
        <input class="input-container" id="released_at" type="date" name="released_at" value="<?= $currentMovie->released_at; ?>" />
        <br />
    
        <label class="label-form mt-10" for="film_poster">Affiche du film</label>
        <input class="input-container" id="film_poster" type="text" name="film_poster" value="<?= $currentMovie->film_poster; ?>" />
        <br />
    
        <label class="label-form mt-10" for="synopsis">Synopsis</label>
        <input class="input-container" id="synopsis" type="text" name="synopsis" value="<?= $currentMovie->synopsis; ?>" />
        <br />
    
        <label class="label-form mt-10" for="banner">Bannière</label>
        <input class="input-container" id="banner" type="text" name="banner" value="<?= $currentMovie->banner; ?>" />
        <br />
    
        <label class="label-form mt-10" for="trailer">Trailer</label>
        <input class="input-container" id="trailer" type="text" name="trailer" value="<?= $currentMovie->trailer; ?>" />
        <br />
    
        <textarea class="input-container mt-10"  name="summary"><?= $currentMovie->summary; ?></textarea>
        <br />
    
        <h2 class="mt-10">Galerie d'images du film</h2>
        <small>Vous pouvez ajouter seulement 3 images par site</small> <br /> <br />
    
        <input class="input-container mt-10" type="url" placeholder="Adresse de l'image" name="gallery_1" value="<?= isset($currentGallery[0]->picture) ? $currentGallery[0]->picture  : "" ?>" />
        <input type="hidden" name="gallery_1_id" value="<?= isset($currentGallery[0]->picture) ? $currentGallery[0]->id  : "" ?>" />
        <input class="input-container mt-10" type="url" placeholder="Adresse de l'image" name="gallery_2" value="<?= isset($currentGallery[1]->picture) ? $currentGallery[1]->picture  : "" ?>" />
        <input type="hidden" name="gallery_2_id" value="<?= isset($currentGallery[1]->picture) ? $currentGallery[1]->id  : "" ?>" />
        <input class="input-container mt-10" type="url" placeholder="Adresse de l'image" name="gallery_3" value="<?= isset($currentGallery[2]->picture) ? $currentGallery[2]->picture  : "" ?>" />
        <input type="hidden" name="gallery_3_id" value="<?= isset($currentGallery[2]->picture) ? $currentGallery[2]->id  : "" ?>" />
        <br /> <br />
    
        <input class="button-container" style="text-align: center; margin: auto;" type="submit" name="edit" value="Valider" />
    </form>
</section>
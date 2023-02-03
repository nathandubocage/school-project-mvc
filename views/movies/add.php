<section class="add-actor">
    <h1 class="add-title title">Ajouter un film</h1>

    <form method="post" action="#">
        <label class="label-form mt-10"  for="title">Titre du film</label>
        <input class="input-container" id="title" type="text" name="title" />
        <br />

        <label class="label-form mt-10"  for="released_at">Date de sortie</label>
        <input class="input-container" id="released_at" type="date" name="released_at" />
        <br />

        <label class="label-form mt-10"  for="film_poster">Affiche du film</label>
        <input class="input-container" id="film_poster" type="text" name="film_poster" />
        <br />

        <label class="label-form mt-10"  for="synopsis">Synopsis</label>
        <input class="input-container" id="synopsis" type="text" name="synopsis" />
        <br />

        <label class="label-form mt-10" for="banner">Bannière</label>
        <input class="input-container" id="banner" type="text" name="banner" />
        <br />

        <label  class="label-form mt-10" for="trailer">Trailer</label>
        <input class="input-container" id="trailer" type="text" name="trailer" />
        <br />

        <textarea class="input-container mt-10" name="summary">Votre message</textarea>
        <br />

        <h2 class="mt-10">Galerie d'images du film</h2>
        <small>Vous pouvez ajouter seulement 3 images par site</small> <br /> <br />

        <input class="input-container mt-10" type="url" placeholder="Adresse de l'image" name="picture_1" />
        <input class="input-container mt-10" type="url" placeholder="Adresse de l'image" name="picture_2" />
        <input class="input-container mt-10" type="url" placeholder="Adresse de l'image" name="picture_3" />
        <br /> <br />

        <input class="button-container" type="submit" name="add_button" value="Ajouter le film" />
    </form>
    <?php if ($error != "") echo $error; ?>
</section>
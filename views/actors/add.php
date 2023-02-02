<section class="add-actor">
    <h1 class="add-title">Ajouter un acteur</h1>

    <form method="post" action="#">
        <input class="input-container" type="text" name="name" placeholder="Nom de l'acteur" /> <br />
        <input class="input-container mt-10" type="text" name="character" placeholder="Personnage joué par cet acteur" /> <br />
        <input class="input-container mt-10" type="text" name="picture" placeholder="Image" /> <br />

        <h2 class="mt-10">Associer à des films</h2>

        <?php foreach ($movies as $movie) { ?>
            <input class="mt-10 checkbox-container"  id="<?= $movie->id ?>" type="checkbox" name="<?= $movie->id ?>" /> <label class="ml-5 mt-u-10" for="<?= $movie->id ?>"><?= $movie->title; ?></label> <br />
        <?php } ?>

        <input class="button-container mt-20" type="submit" name="add" value="Ajouter" />
    </form>
</section>
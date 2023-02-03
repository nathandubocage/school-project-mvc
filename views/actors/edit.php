<section class="add-actor">
    <h1 class="add-title">Modifier un acteur</h1>

    <form method="post" action="#">
        <input class="input-container" type="text" name="name" placeholder="Nom de l'acteur" value="<?= $currentActor->name ?>" /> <br />
        <input class="input-container mt-10" type="text" name="character" placeholder="Personnage joué par cet acteur" value="<?= $currentActor->character ?>" /> <br />
        <input class="input-container mt-10" type="text" name="picture" placeholder="Image" value="<?= $currentActor->picture ?>" /> <br />
        <div class="mt-10"></div>
        <?php foreach ($movies as $movie) { ?>
            <?php $e = isset($movies_actors[$movie->id]) && $movies_actors[$movie->id] == "checked" ? 'checked' : '' ?>
            <input class="mt-10 checkbox-container" <?= $e ?> id="<?= $movie->id ?>" type="checkbox" name="<?= $movie->id ?>" /> <label class="ml-5" for="<?= $movie->id ?>"><?= $movie->title; ?></label> <br />
        <?php } ?>

        <input class="button-container mt-20"  type="submit" name="edit" value="Modifier" />
    </form>
</section>
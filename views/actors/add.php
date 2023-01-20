<h1>Ajouter un acteur</h1>

<form method="post" action="#">
    <input type="text" name="name" placeholder="Nom de l'acteur" /> <br />
    <input type="text" name="character" placeholder="Personnage joué par cet acteur" /> <br />
    <input type="text" name="picture" placeholder="Image" /> <br />

    <h2>Associer à des films</h2>

    <?php foreach ($movies as $movie) { ?>
        <input id="<?= $movie->id ?>" type="checkbox" name="<?= $movie->id ?>" /> <label for="<?= $movie->id ?>"><?= $movie->title; ?></label> <br />
    <?php } ?>

    <input type="submit" name="add" value="Ajouter" />
</form>
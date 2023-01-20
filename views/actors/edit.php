<h1>Modifier un acteur</h1>

<form method="post" action="#">
    <input type="text" name="name" placeholder="Nom de l'acteur" value="<?= $currentActor->name ?>" /> <br />
    <input type="text" name="character" placeholder="Personnage joué par cet acteur" value="<?= $currentActor->character ?>" /> <br />
    <input type="text" name="picture" placeholder="Image" value="<?= $currentActor->picture ?>" /> <br />
    
    <?php foreach ($movies as $movie) { ?>
        <input id="<?= $movie->id ?>" type="checkbox" name="<?= $movie->id ?>" /> <label for="<?= $movie->id ?>"><?= $movie->title; ?></label> <br />
    <?php } ?>
    
    <input type="submit" name="edit" value="Modifier" />
</form>
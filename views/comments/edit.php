<h1>Éditer le commentaire</h1>

<form method="post" action="#">
    <label for="content">Contenu du commentaire</label>
    <textarea id="content" type="text" name="content" value="<?= $currentComment->content; ?>">
    <?= $currentComment->content; ?></textarea>
    <br />

    <input type="submit" name="edit" value="Valider" />
</form>
<h1>Ajouter un film</h1>

<form method="post" action="#">
    <label for="title">Titre du film</label>
    <input id="title" type="text" name="title" /> 
    <br />

    <label for="released_at">Date de sortie</label>
    <input id="released_at" type="date" name="released_at" />
    <br />

    <label for="film_poster">Affiche du film</label>
    <input id="film_poster" type="text" name="film_poster" />
    <br />

    <label for="synopsis">Synopsis</label>
    <input id="synopsis" type="text" name="synopsis" />
    <br />

    <label for="banner">Bannière</label>
    <input id="banner" type="text" name="banner" />
    <br />

    <label for="trailer">Trailer</label>
    <input id="trailer" type="text" name="trailer" />
    <br />

    <textarea name="summary">Votre message</textarea>
    <br />

    <input type="submit" name="add" value="Ajouter" />
</form>
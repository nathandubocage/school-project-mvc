<section class="movie">
    <div class="container-medium">
        <h1><?= $movie->title ?></h1>

        <?php
        echo $movie->summary . '<br />';
        echo "<img src='$movie->banner' alt='' /><br />";
        echo $movie->trailer . "<br />";
        $date = IntlCalendar::fromDateTime($movie->released_at, "fr_FR");
        echo IntlDateFormatter::formatObject($date, IntlDateFormatter::TRADITIONAL);
        ?>

        <h2>Galerie d'images</h2>

        <div class="movie__gallery">
            <?php
            foreach ($gallery as $item) {
                echo "<img class='movie__picture' src='$item->picture' alt='Image du film' /><br />";
            }
            ?>
        </div>

        <h2>Espace commentaire</h2>

        <?php if ($is_login) { ?>
            <h3>Formulaire</h3>

            <form action="<?= '../../comments/add/'; ?>" method="post">
                <textarea name="message"></textarea>
                <input type="hidden" name="movie_id" value=<?= $movie->id ?> />
                <input type="submit" value="Envoyer" />
            </form>
        <?php } ?>

        <h3>Liste des commentaires</h3>

        <?php
        foreach ($comments as $comment) {
            echo $comment->username . "<br />";
            echo $comment->created_at . "<br />";
            echo $comment->content . "<br />";
            echo "<hr />";

            if ($comment->user_id == $user_id) {
                echo "<a href='/comments/{$comment->comment_id}/edit/movies/{$movie->id}/'>Éditer</a>";
                echo "<a href='/comments/{$comment->comment_id}/delete/movies/{$movie->id}/'>Supprimer</a>";
            }
        }
        ?>

        <h2>Liste des acteurs</h2>

        <?php
        foreach ($actors as $actor) {
            echo $actor['name'] . "<br />";
            echo $actor['character'] . "<br />";
            echo $actor['picture'] . "<br />";
            echo "<hr />";
        }
        ?>
    </div>
</section>
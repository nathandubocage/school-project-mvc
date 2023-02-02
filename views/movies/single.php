<section class="movie">
    <div class="container-medium">
        <div class="movie__banner-container">
            <div class="movie__banner-item">
                <div class="backdropmask"></div>
                <?php echo "<img src='$movie->banner' alt='' /><br />"; ?>
            </div>
        </div>
        <div class="movie__infos">
            <div class="movie__infos-item">
                <?php echo "<img src='$movie->film_poster' alt='' /><br />"; ?>
                <div>
                <?php
                    foreach ($actors as $actor) {
                        echo $actor['name'] . "<br />";
                        echo $actor['character'] . "<br />";
                        echo $actor['picture'] . "<br />";
                        echo "<hr />";
                    }
                    ?>
                </div>
            </div>
            <div class="movie__infos-item">
                <h1 class="title"><?= $movie->title ?></h1>
                <p>Date de sortie: <?php $date = IntlCalendar::fromDateTime($movie->released_at, "fr_FR");
                echo IntlDateFormatter::formatObject($date, IntlDateFormatter::RELATIVE_SHORT); ?></p>
                <div class="movie__infos-item-summary">
                    <?php echo $movie->summary ?>
                </div>
                <div class="movie__infos-item-trailer">
                    <?php echo "<iframe width='560' height='315' src='$movie->trailer'allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe>" ?>
                </div>
                <div class="movie__infos-item-gallery">
                    <?php
                    foreach ($gallery as $item) {
                        echo "<img class='movie__picture' src='$item->picture' alt='Image du film' /><br />";
                    }
                    ?>
                </div>
            </div>

            <!-- <?php if ($is_login) { ?>
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

             -->
            </div>
        </div>
        
</section>
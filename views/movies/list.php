<section class="movies">
    <div class="container-medium">
        <h1 class="movies__heading title">Liste des films</h1>

        <?php
        if ($is_admin) {
            echo "<a class='movies__link movies__link--admin' href='/movies/add/'>Ajouter un film</a> <br />";
        }
        ?>

        <div class="movies__items">
            <?php
            foreach ($movies as $movie) {
                if ($is_admin) {
                    echo "<div>";
                    echo "<a class='movies__link movies__link--admin' href='/movies/{$movie->id}/edit/'>Éditer</a> <br />";
                    echo "<a class='movies__link movies__link--admin' href='/movies/{$movie->id}/delete/'>Supprimer</a> <br />";
                    echo "</div>";
                }
            ?>

                <a href="/movies/<?= $movie->id ?>/" class="movies__item">
                    <div class="movies__left">
                        <h2 class="movies__title"><?= $movie->title ?></h2>
                        <div class="movies__released-at">
                            <span>Date de sortie : </span>
                            <?php
                            $released_at = date_create($movie->released_at);
                            echo date_format($released_at, 'd/m/Y') . '<br />';
                            ?>
                        </div>

                        <p class="movies__synopsis">
                            <?= $movie->synopsis; ?>
                        </p>
                    </div>

                    <div class="movies__right">
                        <img class="movies__film-poster" src=<?= $movie->film_poster ?> alt="Image du film" />
                    </div>
                </a>
            <?php
            }
            ?>
        </div>
    </div>
</section>
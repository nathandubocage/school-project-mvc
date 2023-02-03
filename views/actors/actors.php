<section class="actors">
    <div class="container-medium">
        <h1 class="actors__heading title">Le casting</h1>

        <?php
        if ($is_admin) {
            echo "<button class='button-container button--small mt-20'><a href='/actors/add/'>Ajouter un acteur</a></button>";
        }

        foreach ($actorsAll as $name => $actors) {
        ?>
            <h2 class="actors__name"><?= $name; ?></h2>

            <div class="actors__movies">
        <?php
            foreach ($actors as $index => $actor) {
        ?>
                <div class="actors__container">
                <p class="actors__identity"><?= $actor['title']; ?> - <?= $actor['character']; ?></p>
        <?php
                if ($index == 0 && $is_admin) {
                    echo "<div>";
                    echo "<a class='movies__link movies__link--admin mr-10' href='/actors/{$actor['actor_id']}/edit/'>Modifier cet acteur</a> ";
                    echo "<a class='movies__link movies__link--admin' href='/actors/{$actor['actor_id']}/delete/'>Supprimer cet acteur</a>";
                    echo "</div>";
                }
        ?>
                </div>
        <?php
            }
        ?>
            </div>
            <img class="actors__image" src="<?= $actor['picture']; ?>" />
        <?php
            }
        ?>
    </div>
</section>
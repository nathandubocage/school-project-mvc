<section class="gallery">
    <div class="container-medium">
        <h1 class="gallery__heading">Galerie d'images</h1>
        <?php
        foreach ($galleryAll as $title => $images) {
        ?>
            <h2 class="gallery__title"><?= $title; ?></h2>

            <div class="gallery__items">
            <?php
            foreach ($images as $image) {
            ?>
                <a href="<?= $image ?>" target="_blank"><img class="gallery__image" src=<?= $image; ?> /></a>
            <?php
            }
            ?>
            </div>
        <?php
        }
        ?>

    </div>
</section>
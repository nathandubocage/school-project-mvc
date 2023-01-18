<h1>Gallery</h1>
    <?php
    foreach ($galleryAll as $title => $images) { 
    ?>
        <?= $title; ?> <br />
        
        <?php 
        foreach($images as $image) {
        ?>

        <img src=<?= $image; ?> alt="" /> <br />
        
        <?php
        }
        ?>

        <hr />
    <?php
        }
    ?>
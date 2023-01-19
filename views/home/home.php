<h1>Accueil</h1>
<?php

use utils\SessionHelpers;

if (SessionHelpers::isLogin()) { ?><h2>Bonjour <?= $_SESSION['username']; ?></h2><?php } ?>

<?= SessionHelpers::isAdmin(); ?>
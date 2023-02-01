<section class="login-container">
    <div class="left">
        <img class="scene"
            src="http://<?= $_SERVER['HTTP_HOST']; ?>/public/images/toy-story-scene.png"
        />
        <img class="background"
            src="http://<?= $_SERVER['HTTP_HOST']; ?>/public/images/toy-story-background.png"
        />
    </div>
    <div class="right">
        <h1 class="title">
            Se connecter
        </h1>
        <p>Bientôt vous serez autour d’un feu de camp en train de déguster de bonnes crottes d’agneaux 🐑🔥</p>
        <form method="post" action="/login/run/">
            <label for="username">
                <span>Pseudo</span>
                <input class="input-container secondary" placeholder="SexyBuzz85" type="text" id="username" name="username">
            </label>
            <label for="password">
                <span>Mot de passe</span>
                <input class="input-container secondary" placeholder="*********" type="password" id="password" name="password">
            </label>
            <input class="button-container" name="submit" type="submit" id="submit" value="Je me connecte">
            <a href="/register/">Je m'inscris</a>
        </form>
    </div>
</section>
<section class="register-container">
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
            Rejoindre l'aventure
        </h1>
        <p>Vous aussi ayez un serpent coincé dans votre botte en rejoignant l'aventure Toy Story 🐍👢</p>
        <form method="post" action="/register/run/">
            <label for="username">
                <span>Pseudo</span> 
                <input class="input-container secondary" placeholder="HotWoody19" type="text" id="username" name="username">
            </label>
        
            <label for="password">
                <span>Mot de passe</span> 
                <input class="input-container secondary" placeholder="********" type="password" id="password" name="password">
            </label>
        
            <label for="email">
                <span>Email</span>
                <input class="input-container secondary" placeholder="exemple@email.com"  id="email" type="email" name="email" />
            </label>

            <label for="password_confirmation">
                <span>Confirmation mot de passe</span> 
                <input class="input-container secondary" placeholder="********" type="password" id="password_confirmation" name="password_confirmation">
            </label>

            <input class="button-container submit" name="submit" type="submit" id="submit" value="Je m'inscris">
            <a href="/login/">Je me connecte</a>
        </form>
    </div>
</section>
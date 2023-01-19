<form method="post" action="register/run">
    <label for="username">Username</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br><br>
    <label for="password_confirmation">Confirlation de password</label>
    <input type="password" id="password_confirmation" name="password_confirmation"><br><br>
    <label for="email">Email</label>
    <input id="email" type="email" name="email" /> <br /><br />
    <input name="submit" type="submit" id="submit" value="Register"><br>
    <?= $error ? $error : ""; ?>
</form>
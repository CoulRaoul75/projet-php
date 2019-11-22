<h1>Login</h1>

<?php if (!$isValid) : ?>
    <ul class="alert alert-danger">
        <?php for ($i = 0; $i < count($errors); $i++) : ?>
            <li> <?= $errors[$i] ?> </li>
        <?php endfor ?>
    </ul>
<?php endif ?>

<form method="post">
    <div class="form-group">
        <label for="email">Identifiant</label>
        <input type="text" id="email" name="email" class="form-group" value="<?= $email ?>">
    </div>
    <div class="form-group">
        <label for="pwd">Mot de passe</label>
        <input type="password" id="pwd" name="pwd" class="form-group">
    </div>
    <button type="submit" name="submit" class="btn btn-block btn-info">Se connecter</button>
</form>
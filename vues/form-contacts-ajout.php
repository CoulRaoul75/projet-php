<h1>Ajouter une personne</h1>

<?php if (count($errors) > 0): ?>
    <ul class="alert alert-danger">
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post">

    <div class="form-group">
        <label for="firstName">Prénom</label>
        <input type="text" id="firstName" name="inputFirstName" class="form-control" value="<?= $firstName ?>">
    </div>

    <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" id="name" name="inputName" class="form-control" value="<?= $name ?>">
    </div>

    <input type="hidden" name="version" value="<?= $dbVersion ?>">

    <button class="btn btn-primary btn-block" type="submit" name="submit">Ajouter un contact</button>


</form>



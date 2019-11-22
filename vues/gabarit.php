<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="yarn-assets/bootstrap/dist/css/bootstrap.min.css">

    <title><?= $title ?></title>
</head>

<body class="container-fluid">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- affichage message flash -->
            <?php if (!empty($message)) : ?>
                <div class="alert alert-warning">
                    <?= $message ?>
                </div>
            <?php endif ?>


            <?php include VIEW_PATH . "/${viewName}.php" ?>
        </div>
    </div>

</body>

</html>
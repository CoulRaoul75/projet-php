<?php
//inclusion de la fonction créée dans html.php
require "../lib/html.php"
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produit</title>
</head>

<body>

    <?php
    // http://localhost:8000/produit.php?nb1=44a&nb2=50
    $nb1 = filter_input(INPUT_GET, "nb1", FILTER_SANITIZE_NUMBER_INT) ?? 15548;
    $nb2 = filter_input(INPUT_GET, "nb2", FILTER_SANITIZE_NUMBER_INT) ?? 15648;

    $result = $nb1 * $nb2;

    /*
$nb1 = $_GET["nb1"];
$nb2 = $_GET["nb2"];
$result = $nb1 * $nb2;
*/
    ?>

    <?php
    echo htmlTag("h1", "test de la fonction htmlTag");
    ?>

    <h1>Donne-moi le résultat de <?= $nb1 ?>*<?= $nb2 ?>=<?= $result ?></h1>

    <!-- Affiche la superglobale $_SERVER en préformaté <pre> -->

    <pre>
        <?php var_dump($_SERVER); ?>
    </pre>

</body>

</html>
<?php
//session_start();

//if (isset($_SESSION["email"])) {
//    $email = $_SESSION["email"];
//} else {
    // un message flash si pas de login
//    $_SESSION["message"] = "Veuillez vous connecter";
    // rediriger sur page login
//    header("location:login.php");
///}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Intro</title>
</head>

<body>

    <?php
    // reprend les données renseignées dans l'url
    // http://localhost:8000/intro.php?name=bidule&age=35

    $key = "name";

    $var = "age";

    // INPUT_GET >> Constante qui représente un nombre qui veut dire qu'on recherche les données sources dans GET
    // ?? Double coalese >> si la valeur est null on prend la variable par défaut
    $name = filter_input(INPUT_GET, $key) ?? "Joe";

    $age = filter_input(INPUT_GET, "age", FILTER_SANITIZE_NUMBER_INT) ?? 18;


    /* 1ère methode
    $name = $_GET["name"];

    if(isset($_GET["age"])){
     $age = $_GET["age"];
    } else {
     $age = 18;
    }
    */

    ?>

    <h1>Bonjour <?php echo $name; ?>, vous avez <?php echo $age; ?> ans</h1>
    <h2>Votre email est <?php echo $email; ?></h2>

    <p><a href="/app.php?route=logout">Déconnexion</a></p>



</body>
</html>
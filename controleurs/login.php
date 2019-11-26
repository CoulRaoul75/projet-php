<?php

// démarrage de la session >> se fait dans app.php
// session_start();

$isPosted = filter_has_var(INPUT_POST, "submit");

// initialisation du tableau des erreurs
$errors = [];

// initialisation des variables
$email = "";

if ($isPosted) {
    // récup des données
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "pwd");

    // validation des données
    if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Votre email n'est pas valide");
    }
    if (! $password) {
        array_push($errors, "Votre mot de passe ne peut être vide");
    }

    // authentification
    if ($email == "moi@mail.com" && $password == "123") {
        // régénération de la session
        session_regenerate_id(true);

        // stockage de l'email dans la session
        $_SESSION["email"] = $email;
        // redirection en cas de succès
         // à modifier pour avoir la page demandée (upload, controleur, etc) directement
        header("location:app.php?route=intro");   
    } else {
        array_push($errors, "Informations d'authentification invalides");
    }
}
// validité de la saisie avant l'envoi des données
$isValid = count($errors) == 0;

// affichage de la vue login décorée par le gabarit
$title = "Login";
$viewName = "login";
require VIEW_PATH . "/gabarit.php";

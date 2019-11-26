<?php

// démarrage de la session avec une fonction
session_start();

// définir les constantes de l'application
define("ROOT_PATH", dirname(__DIR__));
define("VIEW_PATH", ROOT_PATH ."/vues");
define("CONTROLLER_PATH", ROOT_PATH ."/controleurs");

// inclusion des bibliothèques
require ROOT_PATH . "/lib/database.php";

// possible aussi de créer le chemin vers la BD

// récup de la route passée en paramètre 
// va permettre d'aiguiller les pages dans l'url si on fait un echo $route
$route = filter_input(INPUT_GET, "route") ?? "defaut";

// tableau de routage
$routes = [
    "test"              => "controleur.php",
    "contact"           => "form-contact.html",
    "login"             => "login.php",
    "logout"            => "logout.php",
    "produit"           => "produit.php",
    "intro"             => "intro.php",
    "ta-tronche"        => "upload.php",
    "person"            => "persons.php",
    "contact-list"      => "contacts.php",
    "ajout-contact"     => "form-contacts-ajout.php",
    "supprimer"         => "contactDelete.php"
];

// condition avec variable controleur pour chemin ok et erreur 404
if(array_key_exists($route, $routes)){
    $controller = $routes[$route];
} else { // créer la page page 404.html
    $controller = "404.html";
    $route ="404";
}

// test de l'authentification
// pages publiques : mettre les exceptions
$publicRoutes = ["login", "produit", "404", "contact-list", "ajout-contact"];
// si la route n'est pas publique
if (! in_array($route, $publicRoutes)){
    if(isset($_SESSION["email"])){
        $email = $_SESSION["email"];
    } else {
        $_SESSION["message"]="Veuillez vous connecter pour accéder aux pages";
        header("location:app.php?route=login");
    }
}

// Gestion du message flash
// récupération du message flash (initialement dans login.php)
$message = $_SESSION["message"] ?? "";
// destruction du message flash de login.php
unset($_SESSION["message"]);

// inclusion du controleur
require CONTROLLER_PATH ."/$controller";

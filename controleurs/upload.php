<?php

// le formulaire a-t-il été envoyé ?

use function PHPSTORM_META\type;

$isPosted = filter_has_var(INPUT_POST, "submit");

if($isPosted){
    // récup des données
    $upload = $_FILES["tronche"];

    // affiche l'extension du fichier
    $extension = explode("/", $upload["type"])[1];

    // chemin de stockage de l'image
    $imageFolder = ROOT_PATH . "/www/images/";

    // nom de l'image
    $fileName = uniqid("tronche_") . "." . $extension;

    // déplacement du fichier temporaire
    if(move_uploaded_file($upload["tmp_name"], $imageFolder.$fileName)){
        $_SESSION["message"] = "Ta tronche est bien téléchargée";
    } else {
        $_SESSION["message"] = "y'a keke chose qui va pas... recommence";
    }

}

$title ="Ma tronche";
$viewName = "upload";

require VIEW_PATH . "/gabarit.php";


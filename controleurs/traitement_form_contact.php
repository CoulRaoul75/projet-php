<?php

//var_dump($_POST);

// recup des données
$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING);
$optin = filter_has_var(INPUT_POST, "optin");
$skills = filter_input(INPUT_POST, "skill", FILTER_SANITIZE_STRING, FILTER_REQUIRE_ARRAY);

var_dump($skills);

// validation des données
if(empty($name)){
    $message = "Saisie invalide";
} else {
    // traitement des données
    $message = "Bonjour $name";
    if($optin){
        $message .= ", merci de nous faire confiance";
    }
}

// restitution des données
echo $message;
?>
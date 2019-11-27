<?php

// initialisation des variables
$name = "";
$firstName = "";
$dbVersion = null;
// initialisation du tableau des erreurs
$errors = [];
// requête valable partout
$pdo = getPDO();

// récupération de l'ID
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

// initialisation de la variable isPostend
$isPosted = filter_has_var(INPUT_POST, "submit");

// condition pour pouvoir modifier les données stockées dans BD
if ($id > 0) {
    $sql = "SELECT firstName, name, version FROM contacts WHERE id = ?";
    $statement = $pdo->prepare($sql);
    $statement->execute([$id]);
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    $name = $data["name"];
    $firstName = $data["firstName"];
    $dbVersion = $data["version"];
}

// condition pour intégrer données dans BD
if ($isPosted) {
    // récup de la saisie
    $name = filter_input(INPUT_POST, "inputName", FILTER_SANITIZE_STRING);
    $firstName = filter_input(INPUT_POST, "inputFirstName", FILTER_SANITIZE_STRING);
    $formVersion = filter_input(INPUT_POST, "version", FILTER_SANITIZE_NUMBER_INT);

    // validation de la saisie
    if (empty($name)) {
        array_push($errors, "Le nom ne peut être vide");
    } else if (mb_strlen($name) < 2) {
        array_push($errors, "Le nom doit comporter plus de 1 caractère");
    }

    if (empty($firstName)) {
        $firstName = null;
    }

    // insertion dans la BD
    if (count($errors) == 0) {
        try {
            if ($id > 0) {
                // Les versions ne sont pas identiques
                if ($formVersion != $dbVersion) {
                    $_SESSION["message"] = "Vous ne pouvez pas modifier des données qui sont en cours de modification";
                    header("location:app.php?route=contact-list&id=$id");
                    exit;
                }
                // il faut que les variables soient renseignées dans un ordre identique
                $sql = "UPDATE contacts SET name=?, firstName=?, version=? WHERE id=?";
                $statement = $pdo->prepare($sql);
                $statement->execute([$name, $firstName, $dbVersion + 1, $id]);
            } else {
                $sql = "INSERT INTO contacts (name, firstName) VALUES(?, ?)";
                $statement = $pdo->prepare($sql);
                $statement->execute([$name, $firstName]);
            }

            header("location:app.php?route=contact-list");

        } catch (PDOException $exception) {
            array_push($errors, "Impossible de créer votre contact");
            }

        }
    }


// affichage de la vue
$title = "Formulaire d'ajout de nouveaux contacts";
$viewName = "form-contacts-ajout";
require VIEW_PATH . "/gabarit.php";
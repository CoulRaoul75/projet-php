<?php

// récupération de l'id
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if($id>0){
    try {
        $pdo = getPDO();
        $statement = $pdo->prepare("DELETE FROM contacts WHERE id=?");
        $statement -> execute([$id]);
    } catch (PDOException $exception){
        $_SESSION["message"] = "Impossible de supprimer ce contact";
    }
} else {
    $_SESSION["message"] = "Le paramètre ID passé n'est pas correct";
}

header("location:app.php?route=contact-list");


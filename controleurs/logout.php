<?php
//session_start();

// destruction de la session
session_destroy();
session_regenerate_id();

$_SESSION["message"] = "Vous êtes deconnectés";

header("location:app.php?route=login");


?>
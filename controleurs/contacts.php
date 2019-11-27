<?php

// connexion à la bd
$pdo = getPDO();

$recordSet = $pdo->query("SELECT * FROM contacts");
$contactList = $recordSet->fetchAll(PDO::FETCH_ASSOC);

// var_dump($contactList);



$title ="liste des contacts";
$viewName ="contactList";
require VIEW_PATH . "/gabarit.php";


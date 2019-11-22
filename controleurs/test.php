<?php

$message = "Hello";
$greet = function ($name) use($message) {
    echo "$message $name";
};

$message = "Hola"; // ca ne marche pas
$greet("Seb");

?>
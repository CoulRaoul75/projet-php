<?php

function getPDO(){
    $dsn ="mysql:host=localhost;dbname=test;charset=utf8";
    $user="root";
    $password="";

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    return new PDO($dsn, $user,$password, $options);
}

function logError($exception): void {
$log = date('d/m/Y h:i:s'). " :: ". $exception->getMessage() . "\n";
file_get_contents (
    ROOT_PATH."/logs/errors.log",
    $log, FILE_APPEND | LOCK_EX);
}
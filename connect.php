<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

//$db = 'mysql:dbname=u129604289_vk;host=mysql.hostinger.fr';
//$user = 'u129604289_vk';
//$password = 'v0xkr4t0s';
$db = 'mysql:dbname=vox;host=localhost';
$user = 'root';
$password = '';
try {
    $dbh = new PDO($db, $user, $password);
} catch (Exception $e){
    echo $e->getMessage();
}
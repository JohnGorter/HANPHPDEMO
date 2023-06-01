<?php

$user = "root"; 
$pwd = "pwd";
$server = "localhost";
$port = 3306;
$database = "classicmodels";

$connection = new PDO("mysql:host=$server;dbname=$database", $user, $pwd);

?>
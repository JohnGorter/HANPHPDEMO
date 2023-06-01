<?php
require_once "./utils/session_start.php";

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST" && isset($_POST["logout"])) {
    $_SESSION["role"] = "unknown";
    header("Location: /login.php");
    die();
} 
?>
<?php
require_once "./utils/session_start.php";
require_once("./layout/login/login.php");


if (!isset($_SESSION["role"])) $_SESSION["role"] = "unknown";


$method = $_SERVER["REQUEST_METHOD"];

echo $method;

if ($method != "POST") {
    echo $_SESSION["role"];
    $title  = "login";
    $content = generateLoginPanel(""); 
} else {
    // $title = "dangerous data";
    // $content = generateLoginPanel(htmlspecialchars_decode("&lt;script&gt;alert(&#039;john&#039;);&lt;/script&gt;")); 
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    if ($username == "john" && $pwd == "secret") {
        $title = 'welcome administrator';
        $content = "";
        $_SESSION["role"] = "ADMIN";
        header("Location: /index.php");
        die();
    } else {
        $title = 'welcome guest';
        $content = "";
        $_SESSION["role"] = "GUEST";
        header("Location: /index.php");
        die(); 
    }

}

include_once("./layout/public.php");
?>
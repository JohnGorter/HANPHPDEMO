<?php
require_once "./utils/session_start.php";
require_once "./layout/tables.php";
require_once "./utils/session_funcs.php";

$url = $_SERVER["PATH_INFO"];
$segments = explode("/", $_SERVER["PATH_INFO"]);
$command =   isset($segments[1]) ? $segments[1]:"";
$argument =   isset($segments[2]) ? $segments[2]:"";

$pagesize = isset($_GET["p"]) ? $_GET["p"] : 10;
$start = isset($_GET["s"]) ? $_GET["s"] : 0;


if (!isset($_SESSION["role"])) $_SESSION["role"] = "unknown";


echo $_SESSION["role"];

if ($_SESSION["role"] == "unknown") {
    header("Location: /login.php");
    die(); 
}

switch ($command) {
    case "show":    
       $content = generateTable($argument);
       $content .= "<hr>";
       $content .= generateTableData($argument, $pagesize, $start);
       $content .= "<br>";
       $content .= generatePager($argument, $url, $start, $pagesize);
       if (isAdmin()) {
        $content .= "<br>";
        $content .= generateQuerySection($argument);
       }
       $title = "Table ". $argument;
       break;
    default:
        $content = generateTablesTable();     
        $title = "Database tables";
        break;
}

include_once "./layout/main.php"
?>
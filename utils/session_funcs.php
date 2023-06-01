<?php

 function isAdmin()
 {
    return isset($_SESSION["role"]) && $_SESSION["role"] == "ADMIN";
 }
 function isGuest()
 {
    return isset($_SESSION["role"]) && $_SESSION["role"] == "GUEST";
 }
?>
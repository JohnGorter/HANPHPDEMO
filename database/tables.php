<?php

require_once("./database/connection.php");

function executeQuery($query) {
    global $connection;
    return $connection->query($query, PDO::FETCH_ASSOC)->fetchAll(); 
}
function getTables() {
    return executeQuery("SHOW TABLES"); 
}

function getTable($table) {
    return executeQuery("DESC $table"); 
}

function getTableRowCount($table) {
    return executeQuery(("SELECT count(1) FROM $table"));
    
}
function getTableData($table, $pagesize = 10, $skip = 0) {
    return executeQuery("SELECT * FROM $table LIMIT $skip, $pagesize"); 
}

function insertTableData($table, $fields, $values) {
    // INSERT INTO employees(employeeNumber, lastname, firstname, extension) VALUES(500, 'lastname', 'firstname', '')
    return executeQuery("INSERT INTO $table(" . implode(",", $fields) . ") VALUES(" . implode(",", $values) . ")"); 
}
?>
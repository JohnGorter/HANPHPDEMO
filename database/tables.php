<?php

require_once("./database/connection.php");

function executeQuery($query, $args = []) {
    global $connection;
    $stmt = $connection->prepare($query);
    foreach($args as $key => $value){
      $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
    }
    $stmt->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getTables() {
    return executeQuery("SHOW TABLES"); 
}

function getTable($table) {
    return executeQuery("DESC $table"); 
}

function getTableRowCount($table) {
    return executeQuery("SELECT count(1) FROM $table");
    
}
function getTableData($table, $pagesize = 10, $skip = 0) {
   
    return executeQuery("SELECT * FROM $table LIMIT :min,:max", [":min" => $skip, ":max" => $pagesize]); // SQL INJECTION 
}

function insertTableData($table, $fields, $values) {
    // INSERT INTO employees(employeeNumber, lastname, firstname, extension) VALUES(500, 'lastname', 'firstname', '')
    return executeQuery("INSERT INTO $table(" . implode(",", $fields) . ") VALUES(" . implode(",", $values) . ")"); 
}
?>
<?php
 require "./database/tables.php";

  function generateQuerySection($table) {
    $tables = getTableData($table, 1, 1);
    $result = "<h2>Query editor</h2><form method='POST'>";
    foreach ($tables as $row){
        foreach ($row as $field => $value) {
            $result .= "<label for='$field'>$field</label> <input type='text' name='$field' value=''></br>";
        }
    }
    $result .= "<input type='submit'></form>";
    return $result;
  }

 function generatePager($argument, $url, $start, $pagesize) {

    $pageback = $start - $pagesize; 
    $pageback = $pageback < 0 ? 0 : $pageback; 
    $totalrows = getTableRowCount($argument)[0]["count(1)"];
 
    $pagefw = $start + $pagesize; 
    $pagefw = $pagefw > $totalrows ? $start : $pagefw; 

    $result = "<a href='$url?p=$pagesize&s=$pageback'>previous</a> &nbsp; <a href='$url?p=$pagesize&s=$pagefw'>next</a>";
    return $result;
 }

 function generateTableData($table, $pagesize, $start){
    $tables = getTableData($table, $pagesize, $start);
    $result = "<table>";

    $result .= "<tr><th>" . implode("</th><th>", array_keys($tables[0])) . "</th></tr>";
    foreach ($tables as $table) {
        $result .= "<tr><td>" . implode("</td><td>", $table) . "</td></tr>";
    }
    $result .= "</table>";
    return $result;
}


 function generateTable($table){
    $tables = getTable($table);
    $result = "<table>";

    $result .= "<tr><th>" . implode("</th><th>", array_keys($tables[0])) . "</th></tr>";
    foreach ($tables as $table) {
        $result .= "<tr><td>" . implode("</td><td>", $table) . "</td></tr>";
    }
    $result .= "</table>";
    return $result;
}

function generateTablesTable(){
    $tables = getTables();
    $result = "<table>";
    foreach ($tables as $table) {
        $tablename = $table["Tables_in_classicmodels"];
        $result .= "<tr><td><a href='/show/$tablename'>" . implode("</td><td>", $table) . "</a></td></tr>";
    }
    $result .= "</table>";
    return $result;
}

?>
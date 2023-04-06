<?php

include('database_connection.php');

session_start();

$outpur = '';

if(isset($_POST["action"])) {
    if($_POST["action"] == "fetch") {
        $query = "SELECT * FROM tbl_grade";
        if(isset($_POST["search"]["value"])) {
            $query .= 'WHERE grade_name LIKE "%'.$_POST["search"]["value"].'%"';
        }
        if(isset($_POST["order"])) {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
    }
}

?>
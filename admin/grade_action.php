<?php

//grade_action.php

include('database_connection.php');

session_start();

$output = '';

if(isset($_POST["action"])) {
    if($_POST["action"] == 'fetch') {
        $query = "SELECT * FROM tbl_grade ";
        
        if(isset($_POST["search"]["value"])) {
            $query .= 'WHERE grade_name LIKE "%'.$_POST["search"]["value"].'%" ';
        }
        if(isset($_POST["order"])) {
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else {
            $query .= 'ORDER BY grade_id DESC ';
        }
        if($_POST["length"] != -1) {
            $query .= 'LIMIT ' . $_POST["start"] . ', ' . $_POST["length"];
        }

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $filtered_rows = $statement->rowCount();
        foreach($result as $row) {
            $sub_array = array();
            $sub_array[] = $row["grade_name"];
            $sub_array[] = '<button type="button" name="edit_grade" class="btn btn-primary btn-sm edit_grade" id="'.$row["grade_id"].'">Edit</button>';
            $sub_array[] = '<button type="button" name="delete_grade" class="btn btn-danger btn-sm delete_grade" id="'.$row["grade_id"].'">Delete</button>';
            $data[] = $sub_array;
        }

        $output = array(
            "draw"    => intval($_POST["draw"]),
            "recordsTotal"  =>  $filtered_rows,
            "recordsFiltered" => get_total_records($connect, 'tbl_grade'),
            "data"    => $data
        );
        
        echo json_encode($output);
    }
}

?>
<?php
include('database_connection.php');
session_start();

if(!isset($_SESSION["admin_id"])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang = "eng">
    <head>
        <title>Student Attendance System in PHP using Ajax</title>
        <meta charset = "utf-8">
        <meta name = "viewport" content= "width = device-width , initial-scale = 1.0">
        <meta http-equiv="X-UA-Compatible" content = "ie = edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    </head>
    <body>
        <div class="jumbotron-small text-center" style="margin-bottom:0">
            <h1>Student Attendance System</h1>
        </div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> 
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="grade.php" class="nav-link">Grade</a>
                    </li>
                    <li class="nav-item">
                        <a href="teacher.php" class="nav-link">Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a href="student.php" class="nav-link">Student</a>
                    </li>
                    <li class="nav-item">
                        <a href="attendance.php" class="nav-link">Attendance</a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
<?php
ob_start();
session_start();

ob_end_flush();

$servername =  "localhost";
$username = "root";
$password = "";
$dbname = "todolist";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

?>
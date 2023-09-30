<?php
$user = "root";
$pass = "";
$server = "localhost";
$database =  "stock_management";

$conn = new mysqli($server,$user,$pass,$database);

if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

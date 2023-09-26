<?php
include_once("connect_db.php");
include_once("ItemsTable.php");
$it = new ItemsTable($conn);
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $cpu = $_POST["cpu"];
    $total_cost = $_POST["total_cost"];
    $it->add($name, $quantity, $cpu, $total_cost, $_SESSION["userid"]);
    unset($_POST["add"]);
}
if(isset($_POST["edit"])){
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $cpu = $_POST["cpu"];
    $total_cost = $_POST["total_cost"];
}
if(isset($_POST["delete"])){
    
}
if(isset($_POST["clear"])){
    
}
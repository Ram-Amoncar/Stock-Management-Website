<?php

session_start();
include_once("connect_db.php");
include_once("ItemsTable.php");
$it = new ItemsTable($conn);
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $cpu = $_POST["cpu"];
    $total_cost = $_POST["total_cost"];
    $_SESSION['resInsert'] = $it->add($name, $quantity, $cpu, $total_cost, $_SESSION["user_id"]);
    header('Location: stock.php');
    unset($_POST["add"]);
}
if(isset($_POST["edit"])){
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $cpu = $_POST["cpu"];
    $total_cost = $_POST["total_cost"];
    $user_id=$_SESSION["user_id"];
    $_SESSION['resUpdate']=$it->update($name,$quantity,$cpu,$total_cost,$_SESSION['item_id'],$user_id);
    header('Location: stock.php');
    unset($_POST["edit"]);
}
if(isset($_POST["delete"])){
    $_SESSION['resDelete']=$it->delete($_SESSION['item_id'],$_SESSION['user_id']);
    header('Location: stock.php');
    unset($_POST["delete"]);
}


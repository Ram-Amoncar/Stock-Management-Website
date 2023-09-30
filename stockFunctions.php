<?php

session_start();
include_once("connect_db.php");
include_once("ItemsTable.php");
$it = new ItemsTable($conn);
if (isset($_POST["add"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $cpu = $_POST["cpu"];
    $total_cost = $_POST["total_cost"];
    $_SESSION['resInsert'] = $it->add($id, $name, $quantity, $cpu, $total_cost, $_SESSION["user_id"]);
    header('Location: ./stock');
    unset($_POST["add"]);
}
if (isset($_POST["edit"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $cpu = $_POST["cpu"];
    $total_cost = $_POST["total_cost"];
    $user_id = $_SESSION["user_id"];
    $_SESSION['resUpdate'] = $it->update($name, $quantity, $cpu, $total_cost, $id, $user_id);
    header('Location: ./stock');
    unset($_POST["edit"]);
}
if (isset($_POST["delete"])) {
    $id = $_POST["id"];
    $_SESSION['resDelete'] = $it->delete($id);
    header('Location: ./stock');
    unset($_POST["delete"]);
}

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage your stock here</title>
    <link rel="stylesheet" href="css/stock.css">
    <link rel="icon" type="image/x-icon" href="./assets/icon.ico">
</head>

<body>
    <div id="navbar">
        <a class="left">Stock Manangement System</a>
        <a href="./" class="right">
            <div id="userNdiv">user</div> Log Out
        </a>
    </div>
    <div id="con">
        <form action="stock.php" method="post">
            <div class="int-group">
                <input type="text" name="name" placeholder="Name" required>
                <input type="number" name="quantity" placeholder="Quantity" required>
                <input type="number" name="cpu" placeholder="Cost per unit" required>
                <input type="number" name="total_cost" placeholder="Total cost" readonly>
            </div>
            <div class="int-group">
                <input type="submit" value="Add" name="add">
                <input type="submit" value="Edit" name="edit">
                <input type="submit" value="Delete" name="delete">
                <input type="submit" value="Clear" name="clear">
            </div>
        </form>
        <form action="stock.php" method="post">
            <div class="int-group">
                <input type="search" name="searchBar" placeholder="Type here to search">
            </div>
        </form>
    </div>
</body>

</html>
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

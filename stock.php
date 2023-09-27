<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage your stock here</title>
    <script src="js/alert.js"></script>
    <link rel="stylesheet" href="css/stock.css">
    <link rel="icon" type="image/x-icon" href="./assets/icon.ico">
</head>

<body>
    <div id="navbar">
        <a class="left">Stock Management System</a>
        <a href="/index.php?lo=true" class="right">
            <div id="userNdiv"><?= $_SESSION["userN"] ?? "user" ?></div> Log Out
        </a>
    </div>
    <div id="con">
        <form action="stockFunctions.php" method="post" name="StockForm">
            <div class="int-group">
                <input type="text" name="name" placeholder="Name" >
                <input type="number" name="quantity" placeholder="Quantity" onchange="findTotal_cost()" >
                <input type="number" name="cpu" placeholder="Cost per unit" onchange="findTotal_cost()" >
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


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
</head>
<body>
<div id="navbar">
        <a class="left" >Home</a>
        <a href="/" class="right"><div id="userNdiv">user</div>Log Out</a>
      </div>
    <form action="stock.php" method="post">
    <input type="text" name="name" placeholder="name" required>
    <input type="number" name="quantity" placeholder="quantity" required>
    <input type="number" name="cpu" placeholder="Cost per unit" required>
    <input type="number" name="total_cost" placeholder="Total cost" readonly>
    <input type="submit" value="add" name="add">
    <input type="submit" value="edit" name="edit">
    <input type="submit" value="delete" name="delete">
    <input type="text" name="searchBar">
    </form>
</body>
</html>
<?php
 include_once("connect_db.php");
 include_once("ItemsTable.php");
 $it=new ItemsTable($conn);
if(isset($_POST["add"])){
    $name=$_POST["name"];
    $quantity=$_POST["quantity"];
    $cpu=$_POST["cpu"];
    $total_cost=$_POST["total_cost"];
    $it->add($name,$quantity,$cpu,$total_cost,$_SESSION["userid"]);
    unset($_POST["add"]);
}
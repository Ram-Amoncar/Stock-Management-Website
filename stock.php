<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="stock.php" method="post">
    name<input type="text" name="name" required>
    quantity<input type="number" name="quantity" required>
    cpu<input type="number" name="cpu" required>
    total cost<input type="number" name="total_cost" readonly>
    add<input type="submit" value="add" name="add">
    edit<input type="submit" value="edit" name="edit">
    delete<input type="submit" value="delete" name="delete">
    search bar<input type="text" name="search_bar">
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
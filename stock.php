<?php
session_start();
include_once("connect_db.php");
include_once("ItemsTable.php");
$it = new ItemsTable($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage your stock here</title>
    <script src="js/alert.js"></script>
    <script src="js/stock.js"></script>
    <link rel="stylesheet" href="css/stock.css">
    <link rel="stylesheet" href="css/alert.css">
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
        <form name="StockForm" action="stock.php" method="post" onsubmit="return validate()">
            <div class="int-group">
                <input type="text" name="name" placeholder="Name" >
                <input type="number" name="quantity" placeholder="Quantity" oninput="findTotal_cost()" >
                <input type="number" name="cpu" placeholder="Cost per unit" oninput="findTotal_cost()" >
                <input type="number" name="total_cost" placeholder="Total cost" readonly>
            </div>
            <div class="int-group">
                <input type="submit" value="Add" name="add">
                <input type="submit" value="Update" name="edit">
                <input type="submit" value="Delete" name="delete">
                <input type="reset" value="Clear" name="clear" onclick="alert_message('Text fields cleared',3)">
            </div>
        </form>
        <form action="stock.php" method="post">
            <div class="int-group">
                <input type="search" name="searchBar" placeholder="Type here to search">
            </div>
            <table border="1" cellspacing="0" cellpadding="10">
            <?php
            $result = $it->getAll($_SESSION['user_id']);
            if (mysqli_num_rows($result) > 0) : ?>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Cost per unit</th>
                    <th>Total Cost</th>
                    <th>Time & Date</th>
                    <th>Selection</th>
                </tr>
                <?php while ($data = mysqli_fetch_assoc($result)) : ?>

                    <tr id="<?= $data['id'] ?>">
                        <td>
                            <?= $data['name'] ?>
                        </td>
                        <td>
                            <?= $data['quantity'] ?>
                        </td>
                        <td>
                            <?= $data['cpu'] ?>
                        </td>
                        <td>
                            <?= $data['total_cost'] ?>
                        </td>
                        <td>
                            <?= $data['added_td'] ?>
                        </td>
                        <td style="text-align: center;">
                            <button type="button" onclick="fieldBuilder(<?= $data['id'] ?>)">Select</button>
                        </td>
                    <tr>
                    <?php endwhile ?>
                <?php endif ?>
        </table>
        </form>
    </div>
    <div id="alert_div" class="alert_div">
    </div>
</body>

</html>
<?php
if (isset($_POST["add"])) {
    $name = $_POST["name"];
    $quantity = $_POST["quantity"];
    $cpu = $_POST["cpu"];
    $total_cost = $_POST["total_cost"];
    $res=$it->add($name, $quantity, $cpu, $total_cost, $_SESSION["user_id"]);
    if($res){
        echo "<script type='text/javascript'>
        alert_message('Added Successful',2);
        </script>";
    }else{
        echo "<script type='text/javascript'>
        alert_message('Failed to Add',1);
        </script>";
    }
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
?>


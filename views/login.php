<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="#" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username"><br>
        <label for="pass">Password:</label>
        <input type="text" id="pass"><br>
        <button type="button"><b>Login</b></button>
    </form>
</body>

</html>
<?php
$userN = $_POST["username"];
$pass = $_POST["pass"];
?>
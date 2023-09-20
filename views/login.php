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
        <input type="text" id="username">
        <label for="pass">Password:</label>
        <input type="text" id="pass">
        <input type="submit" value="Login" name="btnLogin">
    </form>
</body>

</html>
<?php
if(isset($_POST["btnLogin"])){
    $userN = $_POST["username"];
    $pass = $_POST["pass"];
    unset($_POST["btnLogin"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <script src="register.js" defer></script>
</head>

<body>
    <form name="RegForm" action="register.php" method="post" onsubmit="return validate()">
        <label for="userN">Username:</label>
        <input type="text" name="username"><br>
        <label for="emailID">Email:</label>
        <input type="email" name="email"><br> 
        <label for="password">Password:</label>
        <input type="password" name="pass"><br>
        <label for="conPass">Conform Password:</label>
        <input type="password" name="cPass"><br>
        <input type="submit" name="btnRegister" value="Register" >
    </form>
</body>

</html>
<?php
 include_once("connect_db.php");
 include_once("UsersTable.php");
 $ut=new UsersTable($conn);
 if (isset($_POST["btnRegister"])) {
    $user = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    if ($ut->add($user,$pass,$email)) echo"<script>alert('Account Created')</script>";
    unset($_POST["btnRegister"]);
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <script src="register.js" defer></script>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <form name="RegForm" action="register.php" method="post" onsubmit="return validate()">
    <h4>Register</h4>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="email" name="email" placeholder="Email"><br> 
        <input type="password" name="pass" placeholder="Password"><br>
        <input type="password" name="cPass" placeholder="Conform Password"><br>
        <input type="submit" name="btnRegister" value="Register" >
        <div class="int-group" id="loginLine" >
            <span>Already have an account? </span><a href="index.php">Login</a>
        </div>
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
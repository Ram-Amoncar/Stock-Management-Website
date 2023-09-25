<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <script src="js/alert.js"></script>
    <script src="js/register.js"></script>
    <link rel="stylesheet" href="css/register.css">
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/same.css">
    <link rel="icon" type="image/x-icon" href="./assets/icon.ico">
</head>

<body>
    <form name="RegForm" action="register.php" method="post" onsubmit="return validate()">
        <h4>Register</h4>
        <input type="text" name="username" placeholder="Username"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="password" name="pass" placeholder="Password"><br>
        <input type="password" name="cPass" placeholder="Conform Password"><br>
        <input type="submit" name="btnRegister" value="Register">
        <div class="int-group" id="loginLine">
            <span>Already have an account? </span><a href="index.php">Login</a>
        </div>
    </form>
    <div id="alert_div" class="alert_div">
    </div>
</body>

</html>
<?php
include_once("connect_db.php");
include_once("UsersTable.php");
$ut = new UsersTable($conn);
if (isset($_POST["btnRegister"])) {
    $user = $_POST["username"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    if (!$ut->checkIfUserNameExists($user)) {
        $hashedpass= password_hash($pass,PASSWORD_BCRYPT);
        if ($ut->add($user, $hashedpass, $email)){
            echo "<script type='text/javascript'> 
        window.location.replace('index.php')
        alert_message('Account Created',2);
        </script>";
        }
        
    } else {
        echo "<script type='text/javascript'>
        alert_message('Username already exists',0);
        setIntputs('$email','$pass')
        </script>";
    }
    unset($_POST["btnRegister"]);
}
?>
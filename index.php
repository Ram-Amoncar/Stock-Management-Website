<?php
session_start();
if(isset($_GET['lo'])){
    session_destroy();
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="js/alert.js"></script>
    <script src="js/login.js"></script>
    <link rel="stylesheet" href="css/alert.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/same.css">
    <link rel="icon" type="image/x-icon" href="./assets/icon.ico">
</head>

<body>
    <form action="index.php" method="post" name="LoginForm" onsubmit="return validate()">
        <h4>Login</h4>
        <div class="int-group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <style>
                    svg {
                        fill: #000000
                    }
                </style>
                <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
            </svg>
            <input type="text" id="username" name="username" placeholder="Username">
        </div>
        <div class="int-group">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                <style>
                    svg {
                        fill: #000000
                    }
                </style>
                <path d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z" />
            </svg>
            <input type="password" id="pass" name="pass" placeholder="Password">
        </div>
        <div class="int-group" id="regLine">
            <span>Don't have an account? </span><a href="register.php">Register</a>
        </div>
        <div class="int-group">
            <input type="submit" value="Login" name="btnLogin">
        </div>
        <div id="alert_div" class="alert_div">
        </div>

    </form>
</body>

</html>
<?php
include_once("connect_db.php");
include_once("UsersTable.php");
$ut = new UsersTable($conn);
if (isset($_POST["btnLogin"])) {
    $userN = $_POST["username"];
    $pass = $_POST["pass"];
    $res = $ut->checkIfUserExists($userN, $pass);
    if ( is_numeric($res)) {       
        // user exists;
        $_SESSION["user_id"] = $res;
        $_SESSION["userN"] = $userN;
        echo "<script type='text/javascript'> 
        alert_message('Login Successful',2);
        sleep(700).then(() => {
            window.location.replace('stock.php');
        });
        </script>";
    } else {
        //user does not exists;
        echo "<script type='text/javascript'>alert_message('Login Failed',1);</script>";
    }
    unset($_POST["btnLogin"]);
}

?>
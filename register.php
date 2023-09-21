<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
</head>

<body>
    <form action="#" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username"><br>
        <label for="email">Email:</label>
        <input type="Email" name="email"><br>
        <label for="pass">Password:</label>
        <input type="password" name="pass" id="pass"><br>
        <label for="cPass">Conform Password:</label>
        <input type="password" name="cPass" id="cPass"><br>
        <button type="submit" onclick="checkPass()" name="btnRegister">Register</button>
    </form>
    <script>
        function checkPass() {
            checkIsEmpty();
            let pass1 = document.getElementById("pass").value;
            let pass2 = document.getElementById("cPass").value;
            if (pass1 != pass2) {
                alert("conform password and password fields do not match");
            }
        }
        function checkIsEmpty(){
            let username=document.getElementsByName("username").vlaue;
            let email =document.getElementsByName("email").vlaue;
            if(username.length==0){
                alert("Enter username");
            }
            if(email.length==0){
                alert("Enter email");
            }
        }
    </script>
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
    $ut->add($user,$pass,$email);
    echo"<script>alert('Account Created')</script>";
 }
?>
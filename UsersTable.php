<?php
final class UsersTable
{
    public $conn;
    public $tableName = "users";
    function __construct(mysqli $conn)
    {
        $this->conn = $conn;
        $q = "CREATE TABLE IF NOT EXISTS $this->tableName
            (
            id INT(10) PRIMARY KEY AUTO_INCREMENT,
            username VARCHAR(40),
            password VARCHAR(40),
            email VARCHAR(40)
            )";
        $this->conn->query($q);
    }

    function add(string $username, string $password, string $email)
    {
        $q = "INSERT INTO $this->tableName (`username`,`password`,`email`) VALUES
            ('$username','$password','$email')";
        return mysqli_query($this->conn, $q);
    }

    function checkIfUserExists(string $username, string $password)
    {
        $q = "SELECT id FROM $this->tableName WHERE username='$username' AND password='$password'";
        $res = mysqli_query($this->conn, $q);
        if($res->fetch_assoc() === null) return -1;
        $f = $res->fetch_field();
        return $f->id;
    }

    function checkIfUserNameExists(string $username)
    {
        $q = "SELECT * FROM $this->tableName WHERE username='$username'";
        $res = mysqli_query($this->conn, $q);
        if($res->fetch_assoc() === null) return false;
        return true;
    }
    function getAll()
    {
        $q = "SELECT * FROM $this->tableName";
        return mysqli_query($this->conn, $q);
    }
}
?>
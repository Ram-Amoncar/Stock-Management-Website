<?php
final class ItemsTable
{
    public $conn;
    public $tableName = "items";
    function __construct(mysqli $conn)
    {
        $this->conn = $conn;
        $q = "CREATE TABLE IF NOT EXISTS $this->tableName
            (
            id BIGINT(10) PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(50),
            quantity BIGINT(10),
            cpu BIGINT(10),
            total_cost BIGINT(20),
            user_id BIGINT(10)
            )";
        $this->conn->query($q);
    }

    function add(int $id,string $name, int $quantity, int $cpu, int $total_cost, int $user_id) : bool
    {
        if($this->checkIfIdExists($id)){
            $q = "INSERT INTO $this->tableName (`name`,`quantity`,`cpu`,`total_cost`,`user_id`) VALUES
            ('$name','$quantity','$cpu','$total_cost','$user_id')";
        }else{
            $q = "INSERT INTO $this->tableName (`id`,`name`,`quantity`,`cpu`,`total_cost`,`user_id`) VALUES
                ('$id', '$name','$quantity','$cpu','$total_cost','$user_id')";
        }

        return mysqli_query($this->conn, $q);
    }

    function checkIfIdExists(int $id) : bool
    {
        $q = "SELECT * FROM $this->tableName WHERE id='$id'";
        $res = mysqli_query($this->conn, $q);
        if($res->num_rows === 0) return false;
        return true;
    }
    function getAll(int $user_id) : mysqli_result
    {
        $q = "SELECT * FROM $this->tableName WHERE user_id = '$user_id'";
        return mysqli_query($this->conn, $q);
    }
    function update(string $name, int $quantity,int $cpu,int $total_cost, int $id,int $user_id) : bool {
        $q = "UPDATE $this->tableName SET name = '$name' , quantity = '$quantity' , cpu = '$cpu' , total_cost = '$total_cost' WHERE id = '$id' AND user_id = '$user_id'";
        mysqli_query($this->conn, $q);
        return mysqli_affected_rows($this->conn)==1;
    }   
    function delete(int $id) : bool {
        $q = "DELETE FROM $this->tableName WHERE id = $id";
        mysqli_query($this->conn, $q);
        return mysqli_affected_rows($this->conn)==1;
    }
}

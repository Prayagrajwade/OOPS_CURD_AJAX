<?php
require_once 'Database.php';

class User {
    private $conn;
    private $table_name = "users";

    public $id;
    public $name;
    public $email;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (name, email) VALUES ('$this->name', '$this->email')";
        return $this->conn->query($query);
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        return $this->conn->query($query);
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name = '$this->name', email = '$this->email' WHERE id = $this->id";
        return $this->conn->query($query);
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = $this->id";
        return $this->conn->query($query);
    }

    public function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = $this->id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }
}
?>

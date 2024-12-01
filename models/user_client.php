<?php
require_once '../connect/connect.php';

class UserClient extends connect
{

    public function register($name, $email, $password)
    {
        // $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO users(name, email, password, role_id) VALUES(?, ?, ?, 2)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $password]);
    }

    public function login($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // if ($user && password_verify($password, $user['password'])) {
            return $user;
        // }
        // return false;
    }

    private $db;

    public function __construct()
    {
        $connObj = new connect();
        $this->db = $connObj->connect();
    }

    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

<?php
require_once '../connect/connect.php';

class UserClient extends connect {

    public function register($name, $email, $password) {
        try {
            $sql = 'INSERT INTO users(name, email, password, role_id) VALUES(?, ?, ?, 1)';
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$name, $email, $password]);
        } catch (PDOException $e) {
            error_log("Error in register: " . $e->getMessage());
            return false;
        }
    }

    public function login($email, $password) {
        try {
            $sql = 'SELECT * FROM users WHERE email = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && $password === $user['password']) {
                return $user; 
            }
            return false; 
        } catch (PDOException $e) {
            error_log("Error in login: " . $e->getMessage());
            return false;
        }
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

?>

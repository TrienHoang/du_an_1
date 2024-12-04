<?php
require_once '../connect/connect.php';

class UserClient extends connect
{

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

    public function checkEmail($email)
    {
        $sql = "SELECT COUNT(*) as count FROM users WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }


    public function login($email, $password)
    {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
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

    public function updatePass($newPassword){
        $hash_password = password_hash($newPassword,PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = ? where user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$hash_password,$_SESSION['user']['user_id']]);
    }

    public function getPassword(){
        $sql = "SELECT password from users where user_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id']]);
        return $stmt->fetchColumn();
    }
}

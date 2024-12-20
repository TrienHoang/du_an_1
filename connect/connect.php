<?php
// Kết nối database
class connect
{
    private $conn;
    public function connect()
    {
        if ($this->conn === null) {


            $serverName = 'localhost';
            $userName = 'root';
            $password = '';
            $myDB = 'du_an_1';
            try {
                // Sử dụng cú pháp chuỗi đúng cho DSN
                $conn = new PDO("mysql:host=$serverName;dbname=$myDB", $userName, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $conn;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return null;
            }
        }

        return $this->conn;
    }
}

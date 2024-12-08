<?php

require_once '../connect/connect.php';

class Statistical extends connect
{
    public function getCountUser()
    {
        $sql = 'SELECT COUNT(*) AS new_users_this_year
        FROM users
        WHERE YEAR(created_at) = YEAR(CURDATE());
        ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getCountProduct()
    {
        $sql = 'SELECT COUNT(*) AS total_products FROM products';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getCountOrder()
    {
        $sql = 'SELECT COUNT(*) AS total_orders
        FROM orders;
        ';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getRevenue()
    {
        $sql = "SELECT SUM(amount) AS total_delivered_amount
        FROM order_details
        WHERE status = 'delivered';
        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

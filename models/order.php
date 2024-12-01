<?php
require_once '../connect/connect.php';

class Order extends connect
{

    public function addOder($product_id, $variant_id, $order_detail_id, $quantity)
    {
        $sql = 'INSERT INTO orders(user_id,product_id,variant_id,order_detail_id,quantity,created_at,updated_at) values(?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_SESSION['user']['user_id'], $product_id, $variant_id, $order_detail_id, $quantity]);
    }

    public function addOrderDetail($name, $email, $phone, $address, $amount, $note, $payment_method, $coupon_id, $shipping_id)
    {
        $sql = 'INSERT INTO order_details (name,email,phone,address,amount,note,payment_method,user_id,coupon_id,shipping_id,created_at,updated_at) values(?,?,?,?,?,?,?,?,?,?,now(),now())';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $email, $phone, $address, $amount, $note, $payment_method, $_SESSION['user']['user_id'], $coupon_id, $shipping_id]);
    }

    public function getOrderDetailIDNew()
    {
        $sql = "SELECT order_detail_id  FROM order_details ORDER BY order_detail_id DESC LIMIT 1;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

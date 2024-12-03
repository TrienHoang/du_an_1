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

    public function allOrderDetail()
    {
        $sql = "SELECT * from order_details";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderDetailById()
    {
        $sql = "SELECT * from order_details where order_detail_id  = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_detail_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrderById()
    {
        $sql = "SELECT 
        orders.*,
        products.name as product_name,
        products.image as product_image,
        product_variants.sale_price AS variant_sale_price,
        variant_colors.color_name AS variant_color_name,
        variant_size.size_name AS variant_size_name 

        from orders
        Left join products on products.product_id = orders.product_id
        Left join product_variants on product_variants.product_variant_id = orders.variant_id
        Left join variant_colors on product_variants.variant_color_id = variant_colors.variant_color_id
        Left join variant_size on product_variants.variant_size_id = variant_size.variant_size_id

         where orders.order_detail_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_detail_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCouponById()
    {
        $sql = "SELECT 
                coupons.*

        from order_details
        left join coupons on coupons.coupon_id = order_details.coupon_id

        where order_details.order_detail_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_detail_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getShipById()
    {
        $sql = "SELECT 
        ships.*
        from order_details
        left join ships on ships.ship_id = order_details.shipping_id

        where order_details.order_detail_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_detail_id']]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // public function updatedOrder($status)
    // {
    //     $sql = "UPDATE order_details set status = ?, updated_at = now() where order_detail_id = ?";
    //     $stmt = $this->connect()->prepare($sql);
    //     return $stmt->execute([$status, $_GET['order_detail_id']]);
    // }

    public function updatedOrder($status)
    {
        $sql = "SELECT status from order_details where order_detail_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_GET['order_detail_id']]);
        $currentStatus = $stmt->fetchColumn();

        $allowedStatus = [
            'pending' => ['confirmed'],
            'confirmed' => ['shiping', 'canceled'],
            'shiping' => ['delivered'],
            'delivered' => []
        ];
        if (!isset($allowedStatus[$currentStatus]) || !in_array($status, $allowedStatus[$currentStatus])) {
            return false;
        }

            $sql = "UPDATE order_details set status = ?, updated_at = now() where order_detail_id = ?";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$status, $_GET['order_detail_id']]);
    }

    public function detelteOrder(){
        $sql = "DELETE from order_details where order_detail_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([ $_GET['order_detail_id']]);
    }

    public function getOrderDetailByIdUser()
    {
        $sql = "SELECT * from order_details where user_id  = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cancle(){
        $sql = "UPDATE order_details set status = 'canceled' ,updated_at = now() where order_detail_id = ? ";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['order_detail_id']]);
    }
}

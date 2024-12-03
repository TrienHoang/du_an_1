<?php
require_once '../connect/connect.php';

class cart extends connect{

    public function getAllCart(){
        $sql = 'SELECT 
                    carts.cart_id AS cart_id,
                    products.product_id AS product_id,
                    products.name AS product_name,
                    products.image AS product_image,  
                    products.slug AS product_slug,
                    product_variants.product_variant_id as variant_id,
                    product_variants.price AS product_variant_price,
                    product_variants.sale_price AS product_variant_sale_price,
                    variant_colors.color_name AS variant_color_name,
                    variant_size.size_name AS variant_size_name,
                    carts.quantity AS quantity
                FROM carts
                    LEFT JOIN products ON carts.product_id = products.product_id
                    LEFT JOIN product_variants ON product_variants.product_variant_id = carts.variant_id
                    LEFT JOIN variant_colors ON product_variants.variant_color_id = variant_colors.variant_color_id
                    LEFT JOIN variant_size ON product_variants.variant_size_id = variant_size.variant_size_id  
                WHERE carts.user_id = ?';
    
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    

    public function addToCart($user_id, $product_id, $variant_id, $quantity){

        $sql = 'insert into carts(user_id, product_id, variant_id, quantity) values(?, ?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$user_id, $product_id, $variant_id, $quantity]);
    }
    
    public function checkCart(){
        $sql = 'select * from carts where user_id = ? and product_id = ? and variant_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id'], $_POST['product_id'], $_POST['variant_id']]);
        return $stmt->fetch();
    }

    public function updateCart($user_id, $quantity, $product_id, $variant_id){
        $sql = 'update carts set quantity = ? where user_id = ? and product_id = ? and variant_id = ?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity, $user_id, $product_id, $variant_id]);
    }

    public function updateCartById($cart_id,$quantity){
        $sql= "UPDATE carts set quantity = ? where cart_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$quantity,$cart_id]);
    }

    public function deleteCart($cart_id){
        $sql = "DELETE from carts where cart_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$cart_id]);
    }

    public function getCouponByCode($coupon_code){
        $sql = "SELECT * from coupons where coupon_code = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$coupon_code]);
        return  $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getHistoryOrder()
    {
        $sql = "SELECT 
        orders.order_id as order_id,
        products.image as order_product_image,
        products.name as order_product_name,
        products.sale_price as product_sale_price,
        variant_colors.color_name AS order_product_color,
        variant_size.size_name AS order_product_size,
        orders.quantity as order_product_quantity,
        orders.created_at as order_create_at,
        order_details.amount as order_total, 
        order_details.status as order_status

        from orders
        LEFT JOIN products on orders.product_id = products.product_id
        LEFT JOIN product_variants ON product_variants.product_variant_id = orders.variant_id
        LEFT JOIN variant_colors ON product_variants.variant_color_id = variant_colors.variant_color_id
        LEFT JOIN variant_size ON product_variants.variant_size_id = variant_size.variant_size_id  
        LEFT JOIN order_details on order_details.order_detail_id = orders.order_detail_id

        where orders.user_id = ?
        ";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$_SESSION['user']['user_id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
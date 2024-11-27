<?php
require_once '../connect/connect.php';

class cart extends connect{

    public function getAllCart(){
        $sql = 'SELECT 
                    carts.cart_id AS cart_id,
                    products.name AS product_name,
                    products.image AS product_image,  
                    products.slug AS product_slug,
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
}
<?php
require_once '../models/cart.php';

class CartController extends Cart {

    public function index() {
        $carts = $this->getAllCart();

        // echo '<pre>';
        // print_r($carts);
        // echo '<pre>';
        $sum = 0;
        foreach($carts as $cart) {
            $sum += $cart['product_variant_price'] * $cart['quantity'];
        }
        include "../views/client/cart/cart.php";
    }
    public function addToCartByNow() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            if (empty($_POST['product_id']) || empty($_POST['quantity']) || empty($_POST['variant_color_id']) || empty($_POST['variant_size_id'])) {
                $_SESSION['error'] = 'Vui lòng chọn sản phẩm, màu sắc và kích thước!';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
    
            $productId = $_POST['product_id'];
            $variantColorId = $_POST['variant_color_id'];
            $variantSizeId = $_POST['variant_size_id'];
            $quantity = $_POST['quantity'];
    
            $userId = isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : null;
            $checkCart = $this->checkCart($userId, $productId, $variantColorId, $variantSizeId);
    
            if ($checkCart) {
                $newQuantity = $checkCart['quantity'] + $quantity;
                $this->updateCart($userId, $newQuantity, $productId, $variantColorId, $variantSizeId);
            } else {
                $this->addToCart($userId, $productId, $variantColorId, $variantSizeId, $quantity);
            }
    
            $_SESSION['success'] = "Thêm vào giỏ hàng thành công!";
            header('Location: ?act=cart');
            exit();
        }
    }
    
    
}


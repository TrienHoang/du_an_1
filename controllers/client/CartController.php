<?php
require_once '../models/cart.php';

class CartController extends Cart
{

    public function index()
    {
        $carts = $this->getAllCart();
            // echo "<pre>";
            // var_dump($carts);
            // echo "</pre>";
        $sum = 0;
        foreach ($carts as $cart) {
            $sum += $cart['product_variant_sale_price'] * $cart['quantity'];
        }
        include "../views/client/cart/cart.php";
    }

    public function editCart(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["updateCart"])) {
            if (isset($_POST['quantity'])) {
                foreach($_POST["quantity"] as $cart_id => $quantity){
                    $this->updateCartById($cart_id,$quantity);
                }
                header('location:' . $_SERVER['HTTP_REFERER']);
                $_SESSION['success'] = "Cập nhật giỏ hàng thành công!";
                exit;
            }
        }
    }
    public function delete(){
        try {
            $this->deleteCart($_GET['id']);
            $_SESSION['success'] = 'Xóa đơn hàng thành công';
            header('location: ?act=cart');
            exit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = 'Xóa đơn hàng thất bại';
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    public function addToCartByNow()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["add_to_cart"])) {

            if (empty($_POST['variant_id']) || empty($_POST['quantity'])) {
                $_SESSION['error'] = 'Vui lòng chọn sản phẩm, màu sắc và kích thước!';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            // echo "<pre>";
            // var_dump($_POST);
            // echo "</pre>";
            $productId = $_POST['product_id'];
            $variantId = $_POST['variant_id'];
            $quantity = $_POST['quantity'];
            $userId = $_SESSION['user']['user_id']  ;

            $checkCart = $this->checkCart();

            if ($checkCart) {
                $quantity = $checkCart['quantity'] + $quantity;
                $this->updateCart($userId, $productId, $variantId, $quantity);
                $_SESSION['success'] = "Cập nhật thành công!";
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $this->addToCart($userId, $productId, $variantId, $quantity);
                $_SESSION['success'] = "Thêm vào giỏ hàng thành công!";
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        } elseif($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["buy_now"])){
            if (empty($_POST['variant_id'])) {
                $_SESSION['error'] = 'Vui lòng chọn sản phẩm, màu sắc và kích thước!';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $productId = $_POST['product_id'];
            $variantId = $_POST['variant_id'];
            $quantity = $_POST['quantity'];
            $userId = $_SESSION['user']['user_id']  ;

            $checkCart = $this->checkCart();

            if ($checkCart) {
                $quantity = $checkCart['quantity'] + $quantity;
                $this->updateCart($userId, $productId, $variantId, $quantity);
                // $_SESSION['success'] = "Cập nhật thành công!";
                header('Location: ?act=cart');
                exit();
            } else {
                $this->addToCart($userId, $productId, $variantId, $quantity);
                // $_SESSION['success'] = "Thêm vào giỏ hàng thành công!";
                header('Location:  ?act=cart');
                exit();
            }
        }
    }
}

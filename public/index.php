<?php
session_start();
// Admin
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/UserAdminController.php';
require_once '../controllers/admin/CouponController.php';
require_once '../controllers/admin/ProductAdminController.php';

// Client
require_once '../controllers/client/AuthController.php';
require_once '../controllers/client/HomeController.php';
require_once '../controllers/client/ProfileController.php';
require_once '../controllers/client/CartController.php';


// require_once '../controllers/client/SearchController.php';
// require_once '../controllers/client/SearchController.php';
// require_once '../controllers/client/index.php';


$action = isset($_GET['act']) ? $_GET['act'] : 'index';
$act = isset($_GET['act']) ? $_GET['act'] : 'home'; 
$categoryAdmin = new CategoryAdminController();
$userAdmin = new UserAdminController();
$productAdmin = new ProductAdminController();
$couponAdmin = new CouponController();


$auth = new AuthController();
$home = new HomeController();
$profile = new ProfileController();
$cart = new CartController();

switch ($action) {
    case 'admin': // Trang chủ admin
        include "../views/admin/index.php";
        break;
    case 'product': // Crud Sản phẩm
        $productAdmin->index();
        break;
    case 'product-create':
        $productAdmin->create();
        break;
    case 'product-edit':
        $productAdmin->edit();
        break;
    case 'product-detail':
        $productAdmin->productDetail();
        break;
    case 'gallery-delete':
        $productAdmin->deleteGallery();
        break;
    case 'variant-delete':
        $productAdmin->deleteProductVariant();
        break;
    case 'coupon': // Crud giảm giá
        $couponAdmin->index();
        break;
    case 'coupon-create':
        $couponAdmin->create();
        break;
    case 'coupon-edit':
        $couponAdmin->update();
        break;
    case 'coupon-detail':
        $couponAdmin->detail();
        break;
    case 'coupon-delete':
        $couponAdmin->delete();
        break;
    case 'category': // CRUD danh mục sản phẩm
        $categoryAdmin->index();
        break;
    case 'category-create':
        $categoryAdmin->addCategory();
        break;
    case 'category-edit':
        $id = $_GET['id'];
        $controller = new CategoryAdminController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->updateCategory($id);
        } else {
            $controller->editCategory($id);
        }
        break;
    case 'category-delete':
        $categoryAdmin->deleteCategory();
        break;
    case 'user': // CRUD Người dùng
        $userAdmin->listUsers();
        break;
    case 'user-create':
        $userAdmin->createUser();
        break;
    case 'user-edit':
        $id = $_GET['id'];
        $userAdmin->updateUser($id);
        break;
    case 'user-detail':
        $id = $_GET['id'];
        $userAdmin->detailUser($id);
        break;
        //=============================================
    case 'login':
        $auth->handleLogin();
        break;

    case 'register':
        $auth->handleRegister();
        break;
    case 'profile':
        include "../views/client/profile/profile.php";
        break;
    case 'update-profile':
        $profile->updateProfile();
        break;
    case 'logout':
        session_unset();
        header('location: index.php');
        break;
        
    case 'forgotPassword':
        $home->forgotPassword();
        break;
        //==============================================================
    case 'index':
        $home->index();
        break;
    case 'product_detail':
        $home->getProductDetail();
        break;
    case 'product-category':
        $home->productCategory();
        break;
    case 'all-products':
        $home->allProducts();
        break;
    case 'searchresult':
        $home->searchresult();  
        break;
    case 'cart':
        $cart->index();
        break;
    case 'addToCart-byNow':
        $cart->addToCartByNow();
        break;
    case 'update-cart':
        $cart->editCart();
        break;
    case 'delete-cart':
        $cart->delete();
        break;
}

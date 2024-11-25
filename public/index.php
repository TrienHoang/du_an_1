<?php
session_start();
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/UserAdminController.php';
require_once '../controllers/client/AuthController.php';
require_once '../controllers/client/HomeController.php';
require_once '../controllers/client/ProfileController.php';
require_once '../controllers/client/CartController.php';

require_once '../controllers/admin/ProductAdminController.php';
// require_once '../controllers/client/SearchController.php';
// require_once '../controllers/client/SearchController.php';


$action = isset($_GET['act']) ? $_GET['act'] : 'index';
$categoryAdmin = new CategoryAdminController();
$userAdmin = new UserAdminController();
$productAdmin = new ProductAdminController();




$auth = new AuthController();
$home = new HomeController();
$profile = new ProfileController();
$cart = new CartController();
// $search = new SearchController();
// $searchController = new SearchController();



switch ($action) {
    case 'admin':
        include "../views/admin/index.php";
        break;
    case 'product':
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
    case 'category':
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
    case 'user':
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
    // case 'search':
    //     $searchController->handleSearch();
    //     break;
        
    case 'forgotPassword':
        // if(isset($_POST['gui'])&&($_POST['gui'])){
        //     $email=$_POST['email'];
        //     $checkEmail = checkEmail($email);
        //     if(is_array($checkEmail)){
        //         $thongbao = "Mật khẩu của bạn là: ".$checkEmail['password'];
        //     }else{
        //         $thongbao="Email này không tồn tại!";
        //     }
        // }
        include "../views/client/auth/forgotPassword.php";
        break;
        //==============================================================
    case 'index':
        $home->index();
        break;
    case 'product_detail':
        $home->getProductDetail();
        break;
    case 'cart':
        $cart->index();
        break;
    case 'addToCart-byNow':
        $cart->addToCartByNow();
        break;
}

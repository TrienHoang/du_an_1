<?php
session_start();
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/client/index.php';

$action = isset($_GET['act']) ? $_GET['act'] : 'index';
$categoryAdmin = new CategoryAdminController();

switch ($action) {
    case 'admin':
        include "../views/admin/index.php";
        break;
    case 'product':
        include "../views/admin/product/list.php";
        break;
    case 'product-create':
        include "../views/admin/product/create.php";
        break;
    case 'product-edit':
        include "../views/admin/product/edit.php";
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
    case 'login':
        if(isset($_POST['login'])&&($_POST['login'])){
            $name=$_POST['name'];
            $password=$_POST['password'];
            $checkAccount = checkAccount($name, $password);
            if(is_array($checkAccount)){
                $_SESSION['name']=$checkAccount;
                header('location: index.php');
                // $thongbao="Bạn đã đăng nhập thành công!";
            }else{
                $thongbao= "Tài khoản không tồn tại! Vui lòng đăng ký!";
            }
            $thongbao = "Bạn đã đăng ký thành công! Vui lòng đăng nhập!";
        }
        include "../views/client/auth/login.php";
        break;
    case 'register':
        if(isset($_POST['register'])&&($_POST['register'])){
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            insert_account($name, $phone, $email, $password);
            $thongbao = "Bạn đã đăng ký thành công! Vui lòng đăng nhập!";
        }
        include "../views/client/auth/register.php";
        break;
    case 'forgotPassword':
        if(isset($_POST['gui'])&&($_POST['gui'])){
            $email=$_POST['email'];
            $checkEmail = checkEmail($email);
            if(is_array($checkEmail)){
                $thongbao = "Mật khẩu của bạn là: ".$checkEmail['password'];
            }else{
                $thongbao="Email này không tồn tại!";
            }
        }
        include "../views/client/auth/forgotPassword.php";
        break;
    
        
        
//==============================================================
    case 'index':
        include "../views/client/index.php";
        break;
}
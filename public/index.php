<?php
session_start();
require_once '../controllers/admin/CategoryAdminController.php';
require_once '../controllers/admin/UserAdminController.php';

$action = isset($_GET['act']) ? $_GET['act'] : 'index';
$categoryAdmin = new CategoryAdminController();
$userAdmin = new UserAdminController();

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



        //==============================================================
    case 'index':
        include "../views/client/index.php";
        break;
}

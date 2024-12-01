<?php
require_once '../models/Category.php';
require_once '../models/Product.php';
require_once '../models/user_client.php';

class HomeController
{

    protected $category;

    protected $product;

    protected $user; // Thêm thuộc tính này

public function __construct()
{
    $this->category = new Category();
    $this->product = new Product();
    $this->user = new User(); // Khởi tạo đối tượng User
}


 
    public function index()
    {

        $category = $this->category->listCategory();
        $product = $this->product->listProduct();

        include "../views/client/index.php";
    }

    public function getProductDetail()
    {

        $productDetail = $this->product->getProductBySlug($_GET['slug']);
        $productDetail = reset($productDetail);
        $product = $this->product->listProduct();

        $get4product = $this->product->get4product($productDetail['category_id']);
        // echo '<pre>';
        // print_r($get4product);
        // echo '<pre>';
        include '../views/client/product/productDetail.php';
    }

    public function productCategory() {
        $categoryId = isset($_GET['id']) ? $_GET['id'] : 0; 

        if ($categoryId > 0) {
            $category = $this->category->getCategoryById($categoryId);
            $products = $this->product->getProductsByCategoryId($categoryId); 

            include '../views/client/product/productCategory.php';
        } else {
            echo "Danh mục không hợp lệ.";
        }
    }


    public function searchresult() {
        if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
            $products = $this->product->searchProducts($keyword);
        } else {
            $products = []; 
        }

        include "../views/client/product/searchresult.php"; 
    }

    public function forgotPassword() {
        if (isset($_POST['gui'])) {
            $email = $_POST['email'];
    
            $userClient = new UserClient();
            $user = $userClient->getUserByEmail($email);
    
            if ($user) {
                $thongbao = "Mật khẩu của bạn là: <strong>" . htmlspecialchars($user['password']) . "</strong>";
            } else {
                $thongbao = "Email không tồn tại trong hệ thống.";
            }
        }
        include "../views/client/auth/forgotPassword.php";
    }
    
    

    
}

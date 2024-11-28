<?php
require_once '../models/search.php';

class SearchController {
    private $searchModel;

    public function __construct() {
        $this->searchModel = new ProductSearch();
    }

    public function handleSearch() {
        // if (isset($_POST['keyword']) && !empty($_POST['keyword'])) {
        //     $keyword = $_POST['keyword'];
        //     $products = $this->searchModel->searchProducts($keyword); // Gọi model để tìm kiếm sản phẩm
        //     include "../views/client/search_results.php"; // Hiển thị kết quả
        // } else {
        //     header("Location: index.php?act=index"); // Quay lại trang chủ nếu không có từ khóa
        // }
        include "../views/client/product/searchProduct.php";
    }
}
?>

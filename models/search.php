<?php
require_once '../connect/connect.php';

class ProductSearch extends connect {
    // Tìm kiếm sản phẩm theo từ khóa
    public function searchProducts($keyword) {
        try {
            $sql = "SELECT * FROM products WHERE name LIKE ? OR description LIKE ? AND status = 1";  // Lọc theo trạng thái sản phẩm
            $stmt = $this->connect()->prepare($sql);
            $searchTerm = '%' . $keyword . '%'; // Tạo từ khóa tìm kiếm với dấu '%'
            $stmt->execute([$searchTerm, $searchTerm]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả kết quả tìm kiếm
        } catch (PDOException $e) {
            error_log("Error in searchProducts: " . $e->getMessage());
            return [];
        }
    }
}
?>


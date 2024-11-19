<?php
require_once '../connect/connect.php';

// Hàm pdo_execute thực thi câu lệnh SQL với tham số
function pdo_execute($sql, $params = []) {
    // Tạo kết nối với cơ sở dữ liệu
    $connect = new connect();
    $conn = $connect->connect();
    
    if ($conn != null) {
        // Chuẩn bị câu lệnh SQL
        $stmt = $conn->prepare($sql);
        
        // Thực thi câu lệnh với các tham số truyền vào
        $stmt->execute($params);
    } else {
        echo "Không thể kết nối đến database!";
    }
}

// Hàm pdo_query_one để lấy 1 dòng dữ liệu
function pdo_query_one($sql, $params = []) {
    // Tạo kết nối với cơ sở dữ liệu
    $connect = new connect();
    $conn = $connect->connect();
    
    if ($conn != null) {
        // Chuẩn bị câu lệnh SQL
        $stmt = $conn->prepare($sql);
        
        // Thực thi câu lệnh với các tham số truyền vào
        $stmt->execute($params);
        
        // Lấy 1 dòng dữ liệu
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        echo "Không thể kết nối đến database!";
    }
}


function insert_account($name, $phone, $email, $password) {
    // Câu lệnh SQL với placeholder
    $sql = "INSERT INTO users (name, phone, email, password) VALUES (:name, :phone, :email, :password)";
    
    // Truyền mảng tham số tương ứng cho các placeholder
    pdo_execute($sql, [
        ':name' => $name,
        ':phone' => $phone,
        ':email' => $email,
        ':password' => $password
    ]);
}

function checkAccount($name, $password) {
    // Sử dụng cú pháp đúng trong câu lệnh SQL
    $sql = "SELECT * FROM users WHERE name = :name AND password = :password";
    
    // Truyền các tham số vào câu lệnh SQL
    return pdo_query_one($sql, [
        ':name' => $name,
        ':password' => $password
    ]);
}

function checkEmail($email) {
    // Sử dụng cú pháp đúng trong câu lệnh SQL
    $sql = "SELECT * FROM users WHERE email = :email ";
    
    // Truyền các tham số vào câu lệnh SQL
    return pdo_query_one($sql, [
        ':email' => $email
    ]);
}



?>

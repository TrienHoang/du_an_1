<?php
require_once('../models/user.php');
class UserAdminController extends User
{
    public function listUsers()
    {
        $listUsers = $this->listUser();
        include "../views/admin/user/list.php";
    }

    public function createUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['createUser'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors["name"] = "Vui lòng nhập tên";
            } else if (trim($_POST["name"]) < 11) {
                // $errors["name"] = "";
            }
            if (empty($_POST['phone'])) {
                $errors["phone"] = "Vui lòng nhập số đt";
            } else if (trim($_POST["phone"]) < 11) {
                $errors["phone"] = "Số điện thoại chưa hợp lệ";
            }
            if (filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "Vui lòng nhập email";
            } else {
                // $errors["email"] = "";
            }
            if (empty(trim($_POST['address']))) {
                $errors["address"] = "Vui lòng nhập địa chỉ";
            } else {
                // $errors["address"] = "";
            }
            if (!isset($_FILES["avatar"]) || $_FILES["avatar"]["error"] !== UPLOAD_ERR_OK) {
                $errors["avatar"] = "Vui lòng chọn 1 file";
            } else {
                $file = $_FILES["avatar"];
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                if (!in_array($extension, $allowedExtensions)) {
                    $errors["avatar"] = "Chỉ chấp nhận các định dạng JPG, JPEG, PNG, GIF";
                } elseif ($file['size'] > 2097152) { // 2MB
                    $errors["avatar"] = "Kích thước file quá lớn (tối đa 2MB)";
                }
            }
            if (!isset($_POST['role'])) {
                $errors["role"] = "Vui lòng chọn chức năng";
            } else {
                // $errors["role"] = "";
            }
            if (!isset($_POST['active'])) {
                $errors["active"] = "Vui lòng chọn trạng thái";
            } else {
                // $errors["active"] = "";
            }
            if (empty($_POST['password'])) {
                $errors["password"] = "Vui lòng nhập mật khẩu";
            } else if (strlen(trim($_POST['password'])) < 6) {
                $errors["password"] = "Mật khẩu nhiều hơn 6 kí tự";
            }
            if (empty($_POST['confirmPassword'])) {
                $errors["confirmPassword"] = "Chưa nhập lại mật khẩu !";
            } else if ($_POST['password'] !== $_POST['confirmPassword']) {
                $errors["confirmPassword"] = "Nhập lại mk sai";
            }

            $file = $_FILES["avatar"];
            $images = $file['name'];
            if (!empty($errors)) {
                if (move_uploaded_file($file['tmp_name'], './images/user/' . $images)) {
                    $createUser = $this->create(trim($_POST["name"]), trim($images), trim($_POST["address"]), trim($_POST["email"]), trim($_POST["phone"]), trim($_POST["password"]), trim($_POST["role"]), trim($_POST["active"]));
                    if ($createUser) {
                        $_SESSION["success"] = "Thêm người dùng thành công";
                        header('Location:?act=user');
                        exit();
                    } else {
                        $_SESSION["error"] = "Sửa người dùng thất bại";
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        exit();
                        // header('Location: ' . $_SERVER['HTTP_REFERER']);
                        // exit();
                    }
                }
            }
        }
        include "../views/admin/user/create.php";
    }

    public function updateUser($id)
    {
        $infoUser = $this->detail($id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateUser'])) {
            $errors = [];

            if (empty($_POST['name'])) {
                $errors["name"] = "Vui lòng nhập tên";
            } else if (strlen(trim($_POST["name"])) < 3) { // Kiểm tra độ dài tên
                $errors["name"] = "Tên phải có ít nhất 3 ký tự";
            }

            if (empty($_POST['phone'])) {
                $errors["phone"] = "Vui lòng nhập số đt";
            } else if (strlen(trim($_POST["phone"])) < 10) { // Kiểm tra độ dài số đt
                $errors["phone"] = "Số điện thoại chưa hợp lệ";
            }

            if (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
                $errors["email"] = "Email chưa hợp lệ"; // Kiểm tra email hợp lệ
            }

            if (empty(trim($_POST['address']))) {
                $errors["address"] = "Vui lòng nhập địa chỉ";
            }

            if (!isset($_POST['role'])) {
                $errors["role"] = "Vui lòng chọn chức năng";
            }

            if (!isset($_POST['active'])) {
                $errors["active"] = "Vui lòng chọn trạng thái";
            }

            // if (empty($_POST['password'])) {
            //     $errors["password"] = "Vui lòng nhập mật khẩu";
            // } else if (strlen(trim($_POST['password'])) < 6) {
            //     $errors["password"] = "Mật khẩu phải nhiều hơn 6 kí tự";
            // }

            // if (empty($_POST['confirmPassword'])) {
            //     $errors["confirmPassword"] = "Chưa nhập lại mật khẩu!";
            // } else if ($_POST['password'] !== $_POST['confirmPassword']) {
            //     $errors["confirmPassword"] = "Nhập lại mật khẩu không khớp";
            // }

            $file = $_FILES['avatar'];
            $images = $file['name'];
            if (!empty($_FILES['avatar']['name'])) {
                if (!move_uploaded_file($file['tmp_name'], './images/user/' . $images)) {
                    $errors['avatar'] = "Không thể tải ảnh lên";
                }
            } else {
                $images = $infoUser['avatar'];
            }

            if (empty($errors)) {
                $updateUser = $this->edit($id, trim($_POST["name"]), $images, trim($_POST["address"]), trim($_POST["email"]), trim($_POST["phone"]), trim($_POST["role"]), trim($_POST["active"]));
                if ($updateUser) {
                    // echo '<div class="alert alert-success">Sửa thành công!</div>';
                    // echo '<script>
                    //     setTimeout(function() {
                    //         window.location.href = "index.php?act=user";
                    //     }, 3000);
                    // </script>';
                    $_SESSION["success"] = "Sửa người dùng thành công";
                    header('Location:?act=user');
                    exit();
                } else {
                    $_SESSION["error"] = "Sửa người dùng thất bại";
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }

        include "../views/admin/user/edit.php";
    }


    public function detailUser($id)
    {
        $infoUser = $this->detail($id);
        include "../views/admin/user/detail.php";
    }
}

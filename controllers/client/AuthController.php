<?php
require_once '../models/user_client.php';

class AuthController extends UserClient
{

    private $user;

    public function __construct()
    {
        $this->user = new UserClient();
    }
    public function handleRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
            $errors = [];

            $name = trim($_POST['name']);
            $phone = trim($_POST['phone']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirm_password']);

            if (empty($name)) {
                $errors['name'] = "Vui lòng nhập tên";
            }

            if (empty($phone)) {
                $errors['phone'] = "Vui lòng nhập so dien thoai";
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Vui lòng nhập email hợp lệ";
            }

            if (empty($password) || strlen($password) < 6) {
                $errors['password'] = "Password phải có ít nhất 6 ký tự";
            }

            if ($password !== $confirmPassword) {
                $errors['confirm_password'] = "Mật khẩu không khớp!";
            }

            if (empty($errors)) {
                if ($this->user->checkEmail($email)) {
                    $errors['email'] = "Email này đã được sử dụng. Vui lòng chọn email khác.";
                }
            }

            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=register');
                exit();
            }

            $register = $this->user->register($name, $email, password_hash($password, PASSWORD_BCRYPT));
            if ($register) {
                $_SESSION['success'] = 'Tạo tài khoản thành công. Vui lòng đăng nhập!';
                header('Location: ?act=login');
            } else {
                $_SESSION['error'] = 'Tạo tài khoản không thành công! Vui lòng thử lại.';
                header('Location: ?act=register');
            }
            exit();
        }
        include "../views/client/auth/register.php";
    }

    public function handleLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $errors = [];

            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Vui lòng nhập email hợp lệ";
            }

            if (empty($password) || strlen($password) < 6) {
                $errors['password'] = "Password phải có ít nhất 6 ký tự";
            }

            if (empty($errors)) {
                $user = $this->login($email, $password);
                if ($user) {
                    $_SESSION['user'] = $user; // luu thong tin nguoi dung dang nhap
                    $_SESSION['success'] = 'Đăng nhập thành công!';
                    header('Location: ?act=index');
                } else {
                    $_SESSION['error'] = 'Đăng nhập thất bại! Email hoặc mật khẩu không đúng.';
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }
                exit();
            }
        }
        include "../views/client/auth/login.php";
    }

    public function chagePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['changePassword'])) {
            $oldPassword = $this->getPassword();
            $errors = [];
            if (empty($_POST['old_password'])) {
                $errors['old_password'] = "Vui lòng nhập mật khẩu cũ";
            }
            if (empty($_POST['new_password'])) {
                $errors['new_password'] = "Vui lòng nhập mật khẩu mới";
            }
            if (empty($_POST['confirm_password'])) {
                $errors['confirm_password'] = "Vui lòng nhập xác nhận mật khẩu";
            }
            if ($_POST["new_password"] !== $_POST["confirm_password"]) {
                $errors['confirm_password'] = "Vui lòng nhập lại, không trùng khớp với mật khẩu mới";
            }
            if (!password_verify($_POST['old_password'], $oldPassword)) {
                $errors['old_password'] = "Mật khẩu cũ không chính xác";
            }
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
            $changePassword = $this->updatePass($_POST['new_password']);
            if ($changePassword) {
                $_SESSION['success'] = "Cập nhật mật khẩu thành công";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            } else {
                $_SESSION['error'] = "Cập nhật mật khẩu thất bại";
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
        }
        include "../views/client/auth/forgotPassword.php";
    }
}

<?php
require_once '../models/user.php';


class ProfileController extends User{
    public function updateProfile(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-profile'])){
            $errors = [];

            var_dump($_POST);
           
            if (empty($_POST['name'])) {
                $errors['name'] = "Vui lòng nhập tên";
            }

            if (empty($_POST['address'])) {
                $errors['address'] = "Vui lòng nhập địa chỉ ";
            }

            if (empty($_POST['email'])) {
                $errors['email'] = "Vui lòng nhập email hợp lệ";
            }

            if (empty($_POST['phone'])) {
                $errors['phone'] = "Vui lòng nhập phone ";
            }


            if(!empty($errors)){
                $_SESSION['errors'] = "Bạn hãy nhập đủ các trường dữ liệu";
                header('location: ' .$_SERVER['HTTP_REFERER']);
                exit();
            }
            


            $_SESSION['errors'] = $errors;
            $user = $this->updateUsers($_POST['name'], $_POST['address'],$_POST['email'], $_POST['phone'],$_POST['password'],$_POST['render']);
            if($user){
                $_SESSION['user'] = $this->getUserById($_SESSION['user']['user_id']);
                $_SESSION['success'] = 'Cap nhat thong tin thanh cong';
                header('location:?act=profile');
                exit();
            }else{
                $_SESSION['error'] = 'Cap nhat thong tin khong thanh cong';
                header('location: ' .$_SERVER['HTTP_REFERER']);
                exit();
            }
        }
        
    }
}

?>
<?php
require_once '../models/user.php';
class ProfileController extends User{
    public function updateProfile(){
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['update-profile'])){
            // echo '123';
            // echo '<pre>';
            // print_r($_POST);
            // echo '<pre>';
            $errors = [];

           
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

           
            if (empty($_POST['password']) ) {
                $errors['password'] = "Password phải có ít nhất 6 ký tự";
            }

            if (empty($_POST['render']) ) {
                $errors['render'] = "Password phải có ít nhất 6 ký tự";
            }

            if(count($errors)>0){
                header('location: ' .$_SERVER['HTTP_REFERER']);
                exit();
            }
            


            $_SESSION['errors'] = $errors;
            $user = $this->updateUsers($_POST['image'], $_POST['name'],$_POST['address'], $_POST['email'], $_POST['phone'],$_POST['password'],$_POST['render']);
            if($user){
                $_SESSION['user'] = $this->getUserById($_SESSION['user']['user_id']);
                $_SESSION['success'] = 'Cap nhat thong tin thanh cong';
                header('location: ' .$_SERVER['HTTP_REFERER']);
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
<?php
include "../views/client/layout/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Login</title>
    <style>
        body {
            font-size: 17px;
        }
        #wrapper {
            min-height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px 0px;
        }
        .form-heading {
            font-size: 25px;
            color: black;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            position: relative;
            border-bottom: 1px solid black;
            margin-top: 15px;
            margin-bottom: 35px;
            display: flex;
            align-items: center;
            width: 600px;
        }
        .form-input {
            background: transparent;
            border: 0;
            outline: 0;
            flex-grow: 1;
        }
        .form-input::placeholder {
            color: gray; 
        }
        .text-danger {
            font-size: 14px;
            color: red;
            left: 100px;
            white-space: nowrap;
        }
        .form-submit {
            background: transparent;
            border: 1px solid #f5f5f5;
            color: white;
            width: 100%;
            background-color: #0075FF;
            border-radius: 6px;
            text-transform: uppercase;
            padding: 10px 10px;
            transition: 0.25s ease-in-out;
            margin-top: 30px;
        }
        .form-submit:hover {
            background-color: rgb(20, 99, 62);
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
        .register-link a {
            color: rgb(201, 13, 13);
            text-decoration: none;
            font-weight: bold;
        }
        .register-link a:hover {
            text-decoration: underline;
            color: rgb(20, 99, 62);
        }
        .eye {
            cursor: pointer;
        }
        .forgotPassword a {
            color: gray;
            text-decoration: none;
        }
        .forgotPassword a:hover {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>

<body>
<div id="wrapper">
    <?php
    if (isset($_SESSION['success'])) {
        echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']);  
    }
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);  
    }
    ?>

    <form action="index.php?act=login" method="post" id="form-login">
        <h1 class="form-heading">Đăng nhập</h1>

        <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input 
                type="text" 
                class="form-input" 
                placeholder="Nhập email..." 
                name="email" 
                value="<?= htmlspecialchars($_SESSION['old_data']['email'] ?? '') ?>"
            >
            <?php if (isset($_SESSION['errors']['email'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <i class="fa-solid fa-key"></i>
            <input 
                id="password" 
                type="password" 
                class="form-input" 
                placeholder="Nhập mật khẩu..." 
                name="password"
            >
            <span class="eye" id="eye">
                <i class="fa-solid fa-eye"></i>
            </span>
            <?php if (isset($_SESSION['errors']['password'])) : ?>
                <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
            <?php endif; ?>
        </div>

        <span class="forgotPassword"> 
            <a class="forgot_Password" href="index.php?act=forgotPassword">Quên mật khẩu?</a>
        </span>

        <input type="submit" value="Đăng nhập" class="form-submit" name="login">

        <div class="register-link">
            <span>Chưa có tài khoản? <a href="index.php?act=register">Đăng ký ngay</a></span>
        </div>
    </form>
</div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const eyeIcon = document.getElementById("eye");
        const passwordField = document.getElementById("password");

        if (eyeIcon && passwordField) {
            eyeIcon.addEventListener("click", function() {
                const icon = eyeIcon.querySelector("i");
                icon.classList.toggle("fa-eye");
                icon.classList.toggle("fa-eye-slash");

                passwordField.type = passwordField.type === "password" ? "text" : "password";
            });
        } else {
            console.error("Phần tử '#eye' hoặc '#password' không tồn tại trong DOM.");
        }
    });
</script>

</html>

<?php
include "../views/client/layout/footer.php";
?>

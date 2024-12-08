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
    <title>Register</title>
    <style>
        body {
            font-size: 17px;
            background-color: #f8f9fa;
        }
        #wrapper {
            min-height: 80vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px 0px;
        }
        .form-heading {
            font-size: 30px;
            color: black;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
            width: 50%;
            margin-left: 330px;
        }
        .form-input {
            flex-grow: 1;
            background: transparent;
            border: 1px solid #ccc;
            outline: 0;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            width: 50%; /* Điều chỉnh để các input có chiều rộng 50% */
        }
        .form-input::placeholder {
            color: gray;
        }
        .text-danger {
            font-size: 14px;
            color: red;
            white-space: nowrap;
        }
        .form-submit {
            background: transparent;
            border: 1px solid #f5f5f5;
            color: white;
            width: 50%; /* Điều chỉnh để nút "Đăng ký" có chiều rộng 50% */
            background-color: #0075FF;
            border-radius: 6px;
            text-transform: uppercase;
            padding: 12px;
            transition: 0.25s ease-in-out;
            margin-top: 30px;
            font-size: 16px;
            margin-left: 330px;
        }
        .form-submit:hover {
            background-color: rgb(20, 99, 62);
        }
        .eye {
            cursor: pointer;
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: blue;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<div id="wrapper">



    <form id="form-register" action="index.php?act=register" method="post" class="container">
        <h1 class="form-heading">Đăng ký</h1>

        <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" class="form-input" placeholder="Tên tài khoản" name="name">
            <?php if (isset($_SESSION['errors']['name'])) : ?>
                <span class="text-danger"><?= $_SESSION['errors']['name'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <i class="fa-solid fa-phone"></i>
            <input type="tel" class="form-input" placeholder="Số điện thoại" pattern="[0-9]{10}" name="phone">
            <?php if (isset($_SESSION['errors']['phone'])) : ?>
                <span class="text-danger"><?= $_SESSION['errors']['phone'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" class="form-input" placeholder="Email" name="email">
            <?php if (isset($_SESSION['errors']['email'])) : ?>
                <span class="text-danger"><?= $_SESSION['errors']['email'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <i class="fa-solid fa-key"></i>
            <input id="password1" type="password" class="form-input" placeholder="Mật khẩu" name="password">
            <span class="eye" id="eye1">
                <i class="fa-solid fa-eye"></i>
            </span>
            <?php if (isset($_SESSION['errors']['password'])) : ?>
                <span class="text-danger"><?= $_SESSION['errors']['password'] ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group">
            <i class="fa-solid fa-key"></i>
            <input id="password2" type="password" class="form-input" placeholder="Nhập lại mật khẩu" name="confirm_password">
            <span class="eye" id="eye2">
                <i class="fa-solid fa-eye"></i>
            </span>
            <?php if (isset($_SESSION['errors']['confirm_password'])) : ?>
                <span class="text-danger"><?= $_SESSION['errors']['confirm_password'] ?></span>
            <?php endif; ?>
        </div>

        <input type="submit" value="Đăng ký" class="form-submit" name="register">

        <div class="login-link">
            <span>Bạn đã có tài khoản? <a href="index.php?act=login">Đăng nhập ngay</a></span>
        </div>
    </form>
</div>
</body>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const togglePasswordVisibility = (eyeId, passwordId) => {
        const eyeIcon = document.getElementById(eyeId);
        const passwordField = document.getElementById(passwordId);

        if (eyeIcon && passwordField) {
            eyeIcon.addEventListener("click", function() {
                const icon = eyeIcon.querySelector("i");
                icon.classList.toggle("fa-eye");
                icon.classList.toggle("fa-eye-slash");

                passwordField.type = passwordField.type === "password" ? "text" : "password";
            });
        }
    };

    togglePasswordVisibility("eye1", "password1");
    togglePasswordVisibility("eye2", "password2");
});
</script>

</html>

<?php
unset($_SESSION['errors']);
include "../views/client/layout/footer.php";
?>

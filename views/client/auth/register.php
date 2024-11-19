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
          border-bottom: 1px solid black;
          margin-top: 15px;
          margin-bottom: 20px;
          display: flex;
          align-items: center;
          margin-bottom: 35px;
      }
      .form-input {
          background: transparent;
          border: 0;
          outline: 0;
          flex-grow: 1;
          width: 600px;
      }
      .form-input::placeholder {
          color: gray; 
      }
      .form-submit {
          background: transparent;
          border: 1px solid #f5f5f5;
          color: white;
          width: 100%;
          background-color: rgb(201, 13, 13);
          border-radius: 6px;
          text-transform: uppercase;
          padding: 10px 10px;
          transition: 0.25s ease-in-out;
          margin-top: 30px;
      }
      .form-submit:hover {
          background-color: rgb(20, 99, 62);
      }
      .eye {
          cursor: pointer;
      }
    </style>
</head>
<body>
    <div id="wrapper">
      <form id="form-register" action="index.php?act=register" method="post">
          <h1 class="form-heading">Đăng ký</h1>
          <!-- Tên tài khoản -->
          <div class="form-group">
            <i class="fa-solid fa-user"></i>
            <input type="text" class="form-input" placeholder="Tên tài khoản" required name="name">
          </div>
          <!-- Họ tên -->
          <div class="form-group">
            <i class="fa-solid fa-id-card"></i>
            <input type="text" class="form-input" placeholder="Họ tên" required name="name">
          </div>
          <!-- Số điện thoại -->
          <div class="form-group">
            <i class="fa-solid fa-phone"></i>
            <input type="tel" class="form-input" placeholder="Số điện thoại" pattern="[0-9]{10}" required name="phone">
          </div>
          <!-- Email -->
          <div class="form-group">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" class="form-input" placeholder="Email" required name="email">
          </div>
          <!-- Ngày sinh -->
          <div class="form-group">
            <i class="fa-solid fa-calendar"></i>
            <input type="date" class="form-input" required >
          </div>
          <!-- Mật khẩu -->
          <div class="form-group">
            <i class="fa-solid fa-key"></i>
            <input id="password1" type="password" class="form-input" placeholder="Mật khẩu" required name="password">
            <span class="eye" id="eye1">
              <i class="fa-solid fa-eye"></i>
            </span>
          </div>
          <!-- Nhập lại mật khẩu -->
          <div class="form-group">
            <i class="fa-solid fa-key"></i>
            <input id="password2" type="password" class="form-input" placeholder="Nhập lại mật khẩu" required name="repass">
            <span class="eye" id="eye2">
              <i class="fa-solid fa-eye"></i>
            </span>
          </div>
          <!-- Submit -->
          <input type="submit" value="Đăng ký" class="form-submit" name="register">
      </form>
      <?php
        if(isset($thongbao)&&($thongbao!="")){
            echo $thongbao;
        }
      ?>
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
            } else {
                console.error(`Phần tử '#${eyeId}' hoặc '#${passwordId}' không tồn tại trong DOM.`);
            }
        };

        togglePasswordVisibility("eye1", "password1");
        togglePasswordVisibility("eye2", "password2");
    });
</script>
</html>


<?php
include "../views/client/layout/footer.php";
?>
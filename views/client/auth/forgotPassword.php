<?php
include "../views/client/layout/header.php";
?>
<div class="xc-banner-one pt-20 pb-40">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-xxl-2 d-none d-xl-block">
                <div class="xc-banner-one__cat" style="width: 350px; margin-top: 25px;">
                    <ul style="padding: 5px 0px;">
                        <?php if ($_SESSION['user']['role_id'] == 1) : ?>
                            <li>
                                <a href="index.php?act=admin">
                                    <img style="width: 55px; margin-right: 20px;" alt="">
                                    Vào quản trị
                                </a>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="index.php?act=list-user-order">
                                <img style="width: 55px; margin-right: 20px;" alt="">
                                Đơn hàng của tôi
                            </a>
                        </li>
                        <li>
                            <a href="index.php?act=logout">
                                <img style="width: 55px; margin-right: 20px;" alt="">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-12 col-xl-9 col-xxl-9" style="padding-left: 80px;">
                <form class="row g-3" action="?act=chage-password" method="post" style="padding-left:140px; margin-top: 20px;">
                    <h3>Đổi mật khẩu</h3>

                    <div class="col-md-12">
                        <label for="inputEmail4" class="form-label">Mật khẩu cũ</label>
                        <input type="text" class="form-control" id="inputEmail4" name="old_password" >
                        <?php if (isset($_SESSION['errors']['old_password'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['old_password'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Nhập lại mới</label>
                        <input type="text" class="form-control" id="inputPassword4" name="new_password" >
                        <?php if (isset($_SESSION['errors']['new_password'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['new_password'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label for="inputAddress" class="form-label">Nhập lại mật khẩu</label>
                        <input type="text" class="form-control" id="inputAddress" name="confirm_password" >
                        <?php if (isset($_SESSION['errors']['confirm_password'])) : ?>
                            <p class="text-danger"><?= $_SESSION['errors']['confirm_password'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col-10">
                        <button  name="changePassword" class="btn btn-primary">Đổi mật khẩu</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<?php
unset($_SESSION['errors']);
include "../views/client/layout/footer.php";
?>
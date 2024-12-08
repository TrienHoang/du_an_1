<?php
include "../views/client/layout/header.php";
?>

<div class="xc-banner-one pt-20 pb-40">
    <div class="container">
        <div class="row">
            <h4>Welcome <?=$_SESSION['user']['name']?></h4>

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
                            <a href="index.php?act=chage-password">
                                <img style="width: 55px; margin-right: 20px;" alt="">
                                Đổi mật khẩu
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
                <form class="row g-3" action="?act=update-profile" method="post" style="padding-left:140px; margin-top: 20px;">
                    <h3>Thông tin của bạn</h3>

                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Name</label>
                        <input type="text" class="form-control" id="inputEmail4" name="name" value="<?=$_SESSION['user']['name']?>">
                        <?php if (isset($errors['name'])) : ?>
                            <p class="text-danger"><?= $errors['name']?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputPassword4" name="email" value="<?=$_SESSION['user']['email']?>">
                        <?php if (isset($errors['email'])) : ?>
                            <p class="text-danger"><?= $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="inputAddress" name="phone" value="<?=$_SESSION['user']['phone']?>">
                        <?php if (isset($errors['phone'])) : ?>
                            <p class="text-danger"><?= $errors['phone'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- <div class="col-md-6">
                        <label for="inputCity" class="form-label">Password</label>
                        <input type="text" class="form-control" id="inputCity" name="password" value="<?=$_SESSION['user']['password']?>">
                        <?php if (isset($errors['password'])) : ?>
                            <p class="text-danger"><?= $errors['password'] ?></p>
                        <?php endif; ?>
                    </div> -->

                    <div class="col-12">
                        <label for="inputAddress2" class="form-label">Address</label>
                        <input type="text" class="form-control" id="inputAddress2" name="address" value="<?=$_SESSION['user']['address']?>">
                        <?php if (isset($errors['address'])) : ?>
                            <p class="text-danger"><?= $errors['address'] ?></p>
                        <?php endif; ?>
                    </div>

                    <div class="col-md-4">
                        <select id="inputState" class="form-select" name="render">
                            <option value="Nam" <?=$_SESSION['user']['render'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                            <option value="Nu" <?=$_SESSION['user']['render'] == 'Nu' ? 'selected' : '' ?>>Nu</option>
                        </select>
                        <?php if (isset($errors['render'])) : ?>
                            <p class="text-danger"><?= $errors['render'] ?></p>
                        <?php endif; ?>
                    </div>

                    <!-- <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2"></label>
                    </div> -->

                    <div class="col-10">
                        <button type="submit" name="update-profile" class="btn btn-primary">Update Profile</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<?php
// unset($_SESSION['errors']);
include "../views/client/layout/footer.php";
?>

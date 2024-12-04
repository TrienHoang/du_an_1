<?php
include "../views/admin/layout/header.php";
?>
<div class="page-body">
    <!-- New User start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-8 m-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>Chỉnh sửa người dùng</h5>
                                </div>
                                <!-- <ul class="na   v nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home"
                                                        type="button">Account</button>
                                                </li>
                                            </ul> -->
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                        <form class="theme-form theme-form-2 mega-form" action="index.php?act=user-edit&id=<?= $infoUser['user_id']?>" method="post" enctype="multipart/form-data">
                                            <div class="card-header-1">
                                                <h5>Thông tin người dùng</h5>
                                            </div>

                                            <div class="row">
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="form-label-title col-lg-2 col-md-3 mb-0">Tên người dùng</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input name="name" class="form-control" value="<?=$infoUser["name"] ?>" type="text">
                                                        <?php if (isset($errors['name'])) : ?>
                                                            <p class="text-danger"><?= $errors['name'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Số điện thoại</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" name="phone" value="<?=$infoUser["phone"] ?>" type="number">
                                                        <?php if (isset($errors['phone'])) : ?>
                                                            <p class="text-danger"><?= $errors['phone'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Email</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input name="email" class="form-control" value="<?=$infoUser["email"]?>" type="email">
                                                        <?php if (isset($errors['email'])) : ?>
                                                            <p class="text-danger"><?= $errors['email'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Địa chỉ</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" name="address" value="<?=$infoUser["address"] ?>" type="text">
                                                        <?php if (isset($errors['address'])) : ?>
                                                            <p class="text-danger"><?= $errors['address'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>


                                                <div class="mb-3 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Avatar</label>
                                                    <div class="col-md-9 col-lg-10">
                                                    <img src="./images/user/<?=$infoUser["avatar"]; ?>" height="90px" class="mb-2" alt="Avatar người dùng">
                                                        <input class="form-control" name="avatar" type="file">
                                                        <input type="hidden" name="old_image" value="./images/user/<?=$infoUser["avatar"];?>" >
                                                        <?php if (isset($errors['avatar'])) : ?>
                                                            <p class="text-danger"><?= $errors['avatar'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Vai trò</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <select class="form-select" aria-label="Default select example" name="role">
                                                            <option value="">--Lựa chọn--</option>
                                                            <option value="1" <?= $infoUser['role_id'] == '1' ? 'selected' : '' ?>>Admin</option>
                                                            <option value="2" <?= $infoUser['role_id'] == '2' ? 'selected' : '' ?>>Client</option>
                                                        </select>
                                                        <?php if (isset($errors['role'])) : ?>
                                                            <p class="text-danger"><?= $errors['role'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Trạng thái</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <select class="form-select" aria-label="Default select example" name="active">
                                                            <option value="">--Lựa chọn--</option>
                                                            <option value="1" <?= $infoUser['active'] == '1' ? 'selected' : '' ?>>Hoạt động</option>
                                                            <option value="0" <?= $infoUser['active'] == '0' ? 'selected' : '' ?>>Không hoạt động</option>
                                                        </select>
                                                        <?php if (isset($errors['active'])) : ?>
                                                            <p class="text-danger"><?= $errors['active'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Password</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" name="password" disabled type="text">
                                                        <?php if (isset($errors['password'])) : ?>
                                                            <p class="text-danger"><?= $errors['password'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="mb-3 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Confirm
                                                        Password</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" name="confirmPassword" disabled type="password" >
                                                        <?php if (isset($errors['confirmPassword'])) : ?>
                                                            <p class="text-danger"><?= $errors['confirmPassword'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <button type="submit" class="me-3 btn btn-outline-primary"
                                                        name="updateUser">Cập nhật</button>
                                                    <button type="submit" class="btn btn-outline-warning"><a
                                                            href="index.php?act=user">Quay lại</a></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- New User End -->

</div>
<?php
include "../views/admin/layout/footer.php";
?>
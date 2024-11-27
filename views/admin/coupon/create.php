<?php
include "../views/admin/layout/header.php";
?>

<!-- Create Coupon Table start -->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="title-header option-title">
                                    <h5>Tạo mã giảm giá</h5>
                                </div>
                                <!-- <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home"
                                                        type="button">General</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                        type="button">Restriction</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-usage-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-usage" type="button">Usage</button>
                                                </li>
                                            </ul> -->

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                        <form action="?act=coupon-create" class="theme-form theme-form-2 mega-form" method="post">
                                            <div class="row">
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="form-label-title col-lg-2 col-md-3 mb-0"> Tên giảm giá </label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="text" name="name">
                                                        <?php if (isset($errors['name'])) : ?>
                                                            <p class="text-danger"><?= $errors['name'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Mã giảm giá</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="text" name="coupon_code">
                                                        <?php if (isset($errors['coupon_code'])) : ?>
                                                            <p class="text-danger"><?= $errors['coupon_code'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center mb-3">
                                                    <label
                                                        class="form-label-title col-lg-2 col-md-3 mb-0">Các loại giảm giá</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check user-checkbox ps-0">
                                                            <input class="checkbox_animated check-it" type="radio" name="coupon_type" value="percentage" id="flexCheckDefault2">
                                                            <label class="form-label-title col-md-4 mb-0">Giảm theo phần trăm</label>
                                                        </div>
                                                        <div class="form-check user-checkbox ps-0">
                                                            <input class="checkbox_animated check-it" type="radio" name="coupon_type" value="fixed amount" id="flexCheckDefault3">
                                                            <label class="form-label-title col-md-4 mb-0">Giảm giá trực tiếp</label>
                                                        </div>
                                                        <?php if (isset($errors['coupon_type'])) : ?>
                                                            <p class="text-danger"><?= $errors['coupon_type'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Giá trị giảm</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="text" name="coupon_value">
                                                        <?php if (isset($errors['coupon_value'])) : ?>
                                                            <p class="text-danger"><?= $errors['coupon_value'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Ngày bắt đầu</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="date" name="start_date">
                                                        <?php if (isset($errors['start_date'])) : ?>
                                                            <p class="text-danger"><?= $errors['start_date'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Ngày kết thúc</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="date" name="end_date">
                                                        <?php if (isset($errors['end_date'])) : ?>
                                                            <p class="text-danger"><?= $errors['end_date'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <!-- <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="form-label-title col-lg-2 col-md-3 mb-0">Free
                                                        Shipping</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check user-checkbox ps-0">
                                                            <input class="checkbox_animated check-it"
                                                                type="checkbox" value=""
                                                                id="flexCheckDefault">
                                                            <label
                                                                class="form-label-title col-md-2 mb-0">Allow
                                                                Free Shipping</label>
                                                        </div>
                                                    </div>
                                                </div> -->

                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-lg-2 col-md-3 col-form-label form-label-title">Số lượng</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="number" name="quantity">
                                                        <?php if (isset($errors['quantity'])) : ?>
                                                            <p class="text-danger"><?= $errors['quantity'] ?></p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>

                                                <!-- <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-2 col-form-label form-label-title">Loại giảm giá</label>
                                                    <div class="col-sm-10">
                                                        <select class="js-example-basic-single"
                                                            name="state">
                                                            <option disabled>--Lựa chọn--</option>
                                                            <option>Percent</option>
                                                            <option>Fixed</option>
                                                        </select>
                                                    </div>
                                                </div> -->


                                                <div class="row align-items-center">
                                                    <label
                                                        class="form-label-title col-lg-2 col-md-3 mb-0">Trạng thái</label>
                                                    <div class="col-md-9">
                                                        <div class="form-check user-checkbox ps-0">
                                                            <input class="checkbox_animated check-it" type="radio" name="status" value="active" id="flexCheckDefault1">
                                                            <label class="form-label-title col-md-4 mb-0">Còn hạn</label>
                                                        </div>
                                                        <div class="form-check user-checkbox ps-0">
                                                            <input class="checkbox_animated check-it" type="radio" name="status" value="hidden" id="flexCheckDefault2">
                                                            <label class="form-label-title col-md-4 mb-0">Hết hạn</label>
                                                        </div>
                                                        <div class="form-check user-checkbox ps-0">
                                                            <input class="checkbox_animated check-it" type="radio" name="status" value="future plan" id="flexCheckDefault3">
                                                            <label class="form-label-title col-md-4 mb-0">Trong tương lai</label>
                                                            <?php if (isset($errors['status'])) : ?>
                                                            <p class="text-danger"><?= $errors['status'] ?></p>
                                                        <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mt-4">
                                                    <button class="btn btn-danger ps-5 pe-5 me-3" type="submit" name="createCoupon">Tạo mã giảm giá</button>
                                                    <a href="?act=coupon" class="btn btn-danger ">Quay lại</a>
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
</div>
<!-- Create Coupon Table End -->

<?php
include "../views/admin/layout/footer.php";
?>
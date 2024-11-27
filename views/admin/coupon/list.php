<?php
include "../views/admin/layout/header.php";
?>

<!-- Coupon list table starts-->
<div class="page-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Danh sách giảm giá</h5>
                            <div class="right-options">
                                <ul>
                                    <li>
                                        <a class="btn btn-solid" href="?act=coupon-create">Thêm mới</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package coupon-list-table table-hover theme-table"
                                    id="table_id">
                                    <thead>
                                        <tr>

                                            <th>Tên giảm giá</th>
                                            <th>Mã giảm giá</th>
                                            <th>Số lượng</th>
                                            <th>Loại giảm giá</th>
                                            <th>Giá trị giảm</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($listCoupons as $coupon): ?>
                                            <tr>
                                                <td><?= $coupon['name'] ?></td>
                                                <td class="theme-color"><?= $coupon['coupon_code'] ?></td>
                                                <td><?= $coupon['quantity'] ?></td>
                                                <td class="menu-status">
                                                    <?php if ($coupon['coupon_type'] == "percentage") { ?>
                                                        <span class="primary">Phần trăm</span>
                                                    <?php } else { ?>
                                                        <span class="primary">Trực tiếp</span>
                                                    <?php } ?>
                                                </td>

                                                <td> <?php if ($coupon['coupon_type'] == "percentage") { ?>
                                                        <span><?= $coupon["coupon_value"] ?>%</span>
                                                    <?php  } else { ?>
                                                        <span><?= number_format($coupon["coupon_value"] * 1000, 0, ",", ".") ?>đ</span>
                                                    <?php  } ?>
                                                </td>
                                                <td class="menu-status">
                                                    <?php if ($coupon['status'] == "active") { ?>
                                                        <span class="success">Còn hạn</span>
                                                    <?php } elseif ($coupon['status'] == "hidden") { ?>
                                                        <span class="danger">Hết hạn</span>
                                                    <?php } else { ?>
                                                        <span class="info">Trong tương lai</span>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="?act=coupon-detail&coupon_id=<?= $coupon["coupon_id"] ?>">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="?act=coupon-edit&coupon_id=<?= $coupon["coupon_id"] ?>">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="?act=coupon-delete&coupon_id=<?= $coupon["coupon_id"] ?>" onclick="return confirmDeletion(event)">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                        <!-- <tr>
                                                        <td>
                                                            <span class="form-check user-checkbox m-0 p-0">
                                                                <input class="checkbox_animated check-it"
                                                                    type="checkbox" value="">
                                                            </span>
                                                        </td>
                                                        <td>25% Off</td>
                                                        <td>2143235</td>
                                                        <td class="theme-color">17%</td>
                                                        <td class="menu-status">
                                                            <span class="success">Success</span>
                                                        </td>
                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="javascript:void(0)">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModalToggle">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr> -->


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->

    <!-- footer start-->
    <!-- <div class="container-fluid">
                    <footer class="footer">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div> -->
    <!-- footer end-->
    <script>
        function confirmDeletion(event) {
            if (!confirm('Bạn có chắc muốn xóa?')) {
                event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết
                return false; // Ngăn chặn hành động liên kết tiếp tục
            }
        }
    </script>
    <?php
    include "../views/admin/layout/footer.php";
    ?>
<?php
include "../views/admin/layout/header.php";
?>
<!-- Order section Start -->
<div class="page-body">
    <!-- Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Danh sách đặt hàng</h5>
                            <!-- <a href="#" class="btn btn-solid">Download all orders</a> -->
                        </div>
                        <div>
                            <div class="table-responsive">
                                <table class="table all-package order-table theme-table" id="table_id">
                                    <thead>
                                        <tr>
                                            <th>Mã đơn hàng</th>
                                            <th>Ngày mua</th>
                                            <th>Khách hàng</th>
                                            <th>Trạng thái đơn hàng</th>
                                            <th>Tổng tiền</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($listOrder as $order) : ?>
                                            <tr data-bs-toggle="offcanvas" href="#order-details">

                                                <td>#<?= $order['order_detail_id'] ?></td>

                                                <td><?= date('M d ,y', strtotime($order['created_at'])) ?></td>

                                                <td><?= $order['name'] ?></td>

                                                <td class="order-success">
                                                    <span><?= $order['status'] ?></span>
                                                </td>

                                                <td><?= number_format($order['amount'] * 1000) ?>đ</td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="?act=order-edit&order_detail_id=<?= $order['order_detail_id'] ?>">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <?php if ($order['status'] == 'delivered' || $order['status'] == 'shiping'): ?>
                                                                <a onclick="return confirm('Không thể xóa khi đã giao hàng')" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            <?php else : ?>
                                                                <a onclick="return confirm('Bạn có chắc muốn xóa đơn hàng này?')" href="?act=order-delete&order_detail_id=<?= $order['order_detail_id'] ?>">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            <?php endif ?>
                                                        </li>
                                                        <!-- <li>
                                                            <a class="btn btn-sm btn-solid text-white"
                                                                href="order-tracking.html">
                                                                Tracking
                                                            </a>
                                                        </li> -->

                                                    </ul>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                        <!-- <tr data-bs-toggle="offcanvas" href="#order-details">
                                                        <td>
                                                            <span class="order-image">
                                                                <img src="assets/images/product/2.png" alt="users">
                                                            </span>
                                                        </td>

                                                        <td> 573-685572</td>

                                                        <td>Jul 25, 2022</td>

                                                        <td>Paypal</td>

                                                        <td class="order-success">
                                                            <span>Success</span>
                                                        </td>

                                                        <td>$15</td>

                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="order-detail.html">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>

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
                                                                <li>
                                                                    <a class="btn btn-sm btn-solid text-white"
                                                                        href="order-tracking.html">
                                                                        Tracking
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                    <tr data-bs-toggle="offcanvas" href="#order-details">
                                                        <td>
                                                            <span class="order-image">
                                                                <img src="assets/images/product/3.png" alt="users">
                                                            </span>
                                                        </td>

                                                        <td> 759-4568734</td>

                                                        <td>Jul 29, 2022</td>

                                                        <td>Stripe</td>

                                                        <td class="order-pending">
                                                            <span>Pending</span>
                                                        </td>

                                                        <td>$15</td>

                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="order-detail.html">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>

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
                                                                <li>
                                                                    <a class="btn btn-sm btn-solid text-white"
                                                                        href="order-tracking.html">
                                                                        Tracking
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
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->

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
    <!-- Order section End -->

    <?php
    include "../views/admin/layout/footer.php";
    ?>
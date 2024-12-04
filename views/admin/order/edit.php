<?php
include "../views/admin/layout/header.php";
?>
<!-- tracking section start -->
<div class="page-body">
    <!-- tracking table start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="title-header title-header-block package-card">
                            <div>
                                <h5>Đơn hàng: #<?= $getOrderDetail['order_detail_id'] ?></h5>
                            </div>
                            <div class="card-order-section">
                                <ul>
                                    <li><?= date('F d, Y \a\t g:i a', strtotime($getOrderDetail['created_at'])) ?></li>
                                    <li><?= count($getOrder) ?> sản phẩm</li>

                                </ul>
                            </div>
                        </div>
                        <div class="bg-inner cart-section order-details-table">
                            <form action="?act=order-update&order_detail_id=<?=$getOrderDetail['order_detail_id']?>" method="post">
                            <div class="row g-4">
                                <div class="d-flex flex-wrap align-items-center gap-2 mb-3 mt-3">
                                    <!-- <a href="#!" class="btn btn-secondary">Refund</a>
                                    <a href="#!" class="btn btn-secondary">Return</a> -->
                                    <select id="orderStatus" name="status" class="form-select order-edit">
                                        <option value="" disabled selected>-- Chọn trạng thái --</option>
                                        <option value="pending" <?=$getOrderDetail['status'] == "pending" ? "selected" : ""?>>Chưa xử lý</option>
                                        <option value="confirmed" <?=$getOrderDetail['status'] == "confirmed" ? "selected" : ""?>>Xác nhận</option>
                                        <option value="shiping" <?=$getOrderDetail['status'] == "shiping" ? "selected" : ""?>>Đang vận chuyển</option>
                                        <option value="delivered" <?=$getOrderDetail['status'] == "delivered" ? "selected" : ""?>>Giao hàng thành công</option>
                                        <option value="canceled" <?=$getOrderDetail['status'] == "canceled" ? "selected" : ""?>>Hủy đơn hàng</option>
                                    </select>
                                    <button type="submit" name="updateOrder" class="btn btn-primary ">Chỉnh sửa trang thái</button>
                                </div>
                            </form>
                                <div class="col-xl-9">
                                    <div class="table-responsive table-details">
                                        <table class="table cart-table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th colspan="9">Sản phẩm</th>
                                                    <!-- <th class="text-end" colspan="2">
                                                        <a href="javascript:void(0)"
                                                            class="theme-color">Edit
                                                            Items</a>
                                                    </th> -->
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php foreach ($getOrder as $order): ?>
                                                    <tr class="table-order">
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <img src="./images/product/<?= $order['product_image'] ?>"
                                                                    class="img-fluid blur-up lazyload" alt="">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <p>Tên sản phẩm</p>
                                                            <h5><?= $order['product_name'] ?></h5>
                                                        </td>
                                                        <td>
                                                            <p>Loại sản phẩm</p>
                                                            <h5><?= $order['variant_color_name'] ?>/<?= $order['variant_size_name'] ?></h5>
                                                        </td>
                                                        <td>
                                                            <p>Số lượng</p>
                                                            <h5><?= $order['quantity'] ?></h5>
                                                        </td>
                                                        <td>
                                                            <p>Giá</p>
                                                            <h5><?= number_format($order["variant_sale_price"] * 1000, 0, ',', '.') ?>đ</h5>
                                                        </td>
                                                        <td>
                                                            <p>Tổng tiền</p>
                                                            <h5><?= number_format(($order["variant_sale_price"] * $order['quantity']) * 1000, 0, ',', '.') ?>đ</h5>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                                <!-- <tr class="table-order">
                                                                <td>
                                                                    <a href="javascript:void(0)">
                                                                        <img src="assets/images/profile/2.jpg"
                                                                            class="img-fluid blur-up lazyload" alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <p>Product Name</p>
                                                                    <h5>Slim Fit Plastic Coat</h5>
                                                                </td>
                                                                <td>
                                                                    <p>Quantity</p>
                                                                    <h5>5</h5>
                                                                </td>
                                                                <td>
                                                                    <p>Price</p>
                                                                    <h5>$63.54</h5>
                                                                </td>
                                                            </tr>

                                                            <tr class="table-order">
                                                                <td>
                                                                    <a href="javascript:void(0)">
                                                                        <img src="assets/images/profile/3.jpg"
                                                                            class="img-fluid blur-up lazyload" alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <p>Product Name</p>
                                                                    <h5>Men's Sweatshirt</h5>
                                                                </td>
                                                                <td>
                                                                    <p>Quantity</p>
                                                                    <h5>1</h5>
                                                                </td>
                                                                <td>
                                                                    <p>Price</p>
                                                                    <h5>$63.54</h5>
                                                                </td>
                                                            </tr> -->
                                            </tbody>

                                            <tfoot>
                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Tổng tiền :</h5>
                                                    </td>
                                                    <td>
                                                        <h4><?= number_format($getOrderDetail['amount'] * 1000, 0, ',', '.') ?>đ</h4>
                                                    </td>
                                                </tr>

                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Giảm giá :</h5>
                                                    </td>
                                                    <td>
                                                        <h4>-<?= number_format($handleCoupon * 1000, 0, ',', '.') ?>đ</h4>
                                                    </td>
                                                </tr>

                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h5>Phí vận chuyển :</h5>
                                                    </td>
                                                    <td>
                                                        <h4><?= number_format($getShip['shipping_prices'] * 1000, 0, ',', '.') ?>đ</h4>
                                                    </td>
                                                </tr>

                                                <tr class="table-order">
                                                    <td colspan="3">
                                                        <h4 class="theme-color fw-bold">Thành tiền:</h4>
                                                    </td>
                                                    <td>
                                                        <h4 class="theme-color fw-bold"><?= number_format(($getOrderDetail['amount'] - $handleCoupon + $getShip['shipping_prices']) * 1000, 0, ',', '.') ?>đ</h4>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-xl-3">
                                    <div class="order-success">
                                        <div class="row g-4">
                                            <h4>Thông tin</h4>
                                            <ul class="order-details">
                                                <li>Mã đơn: #<?= $getOrderDetail['order_detail_id'] ?></li>
                                                <li>Ngay đặt: <?= date('F d, Y \a\t g:i a', strtotime($getOrderDetail['created_at'])) ?></li>
                                                <li>Tổng tiền: <?= number_format(($getOrderDetail['amount'] - $handleCoupon + $getShip['shipping_prices']) * 1000, 0, ',', '.') ?>đ</li>
                                            </ul>

                                            <h4>Địa chỉ</h4>
                                            <ul class="order-details">
                                                <li><?=$getOrderDetail['address'] ?></li>
                                            </ul>

                                            <div class="payment-mode">
                                                <h4>Phương thức thanh toán</h4>
                                                <p>Thanh toán khi nhận hàng</p>
                                            </div>

                                            <!-- <div class="delivery-sec">
                                                <h3>expected date of delivery: <span>october 22, 2018</span>
                                                </h3>
                                                <a href="order-tracking.html">track order</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- section end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tracking table end -->

    <?php
    include "../views/admin/layout/footer.php";
    ?>
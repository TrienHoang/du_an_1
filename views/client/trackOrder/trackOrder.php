<?php
include "../views/client/layout/header.php";
?>

<!-- xc-breadcrumb area start -->
<div class="xc-breadcrumb__area base-bg">
    <div class="xc-breadcrumb__bg w-img xc-breadcrumb__overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="xc-breadcrumb__content p-relative z-index-1">
                    <div class="xc-breadcrumb__list">
                        <span><a href="?act=">Trang chủ</a></span>
                        <span class="dvdr"><i class="icon-arrow-right"></i></span>
                        <span>Theo dõi đơn hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- xc-breadcrumb area end -->

<div class="xc-cart-page pt-50 pb-80">
    <div class="container">
        <form action="#">
            <div class="row gutter-y-30 ">
                <div class="">
                    <h6>Chi tiết đơn hàng </h6>
                </div>
                <div class="col-xl-9">
                    <div class="xc-cart-page__table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="9">
                                        <h4>Sản phẩm</h4>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($getOrder as $order): ?>
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0)">
                                                <img src="./images/product/<?= $order['product_image'] ?>"
                                                    class="img-fluid blur-up lazyload" width="100" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <h6>Tên sản phẩm</h6>
                                            <p><?= $order['product_name'] ?></p>
                                        </td>
                                        <td>
                                            <h6>Loại sản phẩm</h6>
                                            <p><?= $order['variant_color_name'] ?>/<?= $order['variant_size_name'] ?></p>
                                        </td>
                                        <td>
                                            <h6>Số lượng</h6>
                                            <p><?= $order['quantity'] ?></p>
                                        </td>
                                        <td>
                                            <h6>Giá</h6>
                                            <p><?= number_format($order["variant_sale_price"] * 1000, 0, ',', '.') ?>đ</p>
                                        </td>
                                        <td>
                                            <h6>Tổng tiền</h6>
                                            <p><?= number_format(($order["variant_sale_price"] * $order['quantity']) * 1000, 0, ',', '.') ?>đ</p>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>

                            <tfoot>
                                <tr class="table-order">
                                    <td colspan="3">
                                        <h6>Tổng tiền :</h6>
                                    </td>
                                    <td>
                                        <p><?= number_format($getOrderDetail['amount'] * 1000, 0, ',', '.') ?>đ</p>
                                    </td>
                                </tr>

                                <tr class="table-order">
                                    <td colspan="3">
                                        <h6>Giảm giá :</h6>
                                    </td>
                                    <td>
                                        <p>-<?= number_format($handleCoupon * 1000, 0, ',', '.') ?>đ</p>
                                    </td>
                                </tr>

                                <tr class="table-order">
                                    <td colspan="3">
                                        <h6>Phí vận chuyển :</h6>
                                    </td>
                                    <td>
                                        <p><?= number_format($getShip['shipping_prices'] * 1000, 0, ',', '.') ?>đ</p>
                                    </td>
                                </tr>

                                <tr class="table-order">
                                    <td colspan="3">
                                        <h6 class="theme-color fw-bold">Thành tiền:</h6>
                                    </td>
                                    <td>
                                        <h6 class="theme-color fw-bold"><?= number_format(($getOrderDetail['amount'] - $handleCoupon + $getShip['shipping_prices']) * 1000, 0, ',', '.') ?>đ</h6>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-xl-3 ">
                    <div class="bg-light-subtle rounded">
                        <div class=" row p-3 rounded">
                            <h5>Thông tin đơn hàng </h5>
                            <ul>
                                <li class="list-group-item">
                                    <?php if ($getOrderDetail['status'] == "pending"): ?>
                                        <span class="p-2 bg-warning fs-5 m-3 rounded text-light" >Chưa xử lý</span>
                                    <?php elseif ($getOrderDetail['status'] == "confirmed") : ?>
                                        <span class="p-2 bg-primary fs-5 m-3 rounded text-light" >Đã xác nhận</span>
                                        
                                    <?php elseif ($getOrderDetail['status'] == "shiping") : ?>
                                        <span class="p-2 bg-primary fs-5 m-3 rounded text-light" >Đang giao hàng</span>
                                        
                                    <?php elseif ($getOrderDetail['status'] == "delivered") : ?>
                                        <span class="p-2 bg-success fs-5 m-3 rounded text-light" >Giao hàng thành công</span>
                                        
                                    <?php else : ?>
                                        <span class="p-2 bg-danger fs-5 mb-3  rounded text-light" >Đơn hàng bị hủy</span>
                                        
                                    <?php endif ?>
                                </li>
                                <li class="list-group-item mt-5">Ngày đặt: <?= date('F d, Y \a\t g:i a', strtotime($order['created_at'])) ?></li>
                            </ul>

                            <h5>Địa chỉ giao hàng</h5>
                            <ul class="order-details">
                                <li class="list-group-item"><?= $getOrderDetail['address'] ?></li>
                            </ul>

                            <div class="payment-mode">
                                <h5>Phương thức thanh toán</h5>
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
        </form>
    </div>
</div>


<div class="xc-newsletter-form pt-60 pb-60 xc-has-overlay" data-bg="assets/img/bg/newsletter-bg.jpg">
    <div class="container">
        <div class="xc-newsletter-form__inner">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h3 class="xc-newsletter-form__title">Subscribe Newslatter</h3>
                    <form action="#" class="xc-newsletter-form__main">
                        <input type="email" placeholder="enter Email address ">
                        <button type="submit">Send Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "../views/client/layout/footer.php";
?>
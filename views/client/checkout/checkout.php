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
                        <span><a href="#">Home</a></span>
                        <span class="dvdr"><i class="icon-arrow-right"></i></span>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- xc-breadcrumb area end -->


<!-- checkout-area start -->
<section class="checkout-area pt-80 pb-85">
    <div class="container">
        <form action="?act=order" method="post">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkbox-form">
                        <h3 class="mb-30">Chi tiết thanh toán</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="">Tên</label>
                                    <input type="text" name="name" value="<?= $user['name'] ?>" placeholder="Nhập tên..">
                                    <?php if (isset($errors['name'])) : ?>
                                        <p class="text-danger"><?= $errors['name'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" placeholder="Địa chỉ" name="address" value="<?= $user['address'] ?>">
                                    <?php if (isset($errors['address'])) : ?>
                                        <p class="text-danger"><?= $errors['address'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="<?= $user['email'] ?>" placeholder="Nhập Email">
                                    <?php if (isset($errors['email'])) : ?>
                                        <p class="text-danger"><?= $errors['email'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list">
                                    <label for="">Số điện thoại</label>
                                    <input type="number" placeholder="Số điện thoại" name="phone" value="<?= $user['phone'] ?>">
                                    <?php if (isset($errors['phone'])) : ?>
                                        <p class="text-danger"><?= $errors['phone'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label for="">Ghi chú</label>
                                    <textarea placeholder="Ghi chú" name="note"></textarea>
                                    <?php if (isset($errors['note'])) : ?>
                                        <p class="text-danger"><?= $errors['note'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="shop_cart_widget xc-accordion">
                        <div class="accordion" id="shop_size">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="size__widget">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#size_widget_collapse" aria-expanded="true" aria-controls="size_widget_collapse">Shopping Cart
                                    </button>
                                </h2>
                                <div id="size_widget_collapse" class="accordion-collapse collapse show" aria-labelledby="size__widget" data-bs-parent="#shop_size">
                                    <div class="accordion-body">
                                        <div class="cart-coupon-code">
                                            <ul>
                                                <li class="d-flex justify-content-between">
                                                    <h6>Sản phẩm</h6>
                                                    <h6>Thành tiền</h6>
                                                </li>
                                                <?php foreach ($carts as $cart): ?>
                                                    <li class="d-flex justify-content-between">
                                                        <p><?= $cart['product_name'] ?> . <span>x <?= $cart['quantity'] ?></span></p>
                                                        <span><?= number_format(($cart['product_variant_sale_price'] * $cart['quantity']) * 1000, 0, '.', '.') ?>đ</span>
                                                    </li>
                                                <?php endforeach ?>
                                            </ul>
                                        </div>

                                        <?php if(isset($_SESSION['total'])) ?>
                                        <div class="cart-subtitle">
                                            <input type="hidden" name="amount" value="<?=isset($_SESSION['total']) ? $_SESSION['total'] : 0 ?>">
                                            <h4>Tổng tiền</h4>
                                            <h4><?= number_format( (isset($_SESSION['total']) ? $_SESSION['total'] : 0 ) * 1000, 0, '.', '.') ?>đ</h4>
                                        </div>
                                        <?php if (isset($_SESSION['coupon'])) : ?>
                                            <div class="cart-subtitle">
                                                <input type="hidden" name="coupon_id" value="<?= $_SESSION['coupon']["coupon_id"] ?>">
                                                <h4>Giảm giá</h4>
                                                <h4>- <?= number_format(($_SESSION['totalCoupon']) * 1000, 0, '.', '.') ?>đ</h4>
                                            </div>
                                        <?php endif ?>
                                        <div class="cart-checkout">
                                            <h4>Giao hàng</h4>
                                            <div class="shop__widget-list">
                                                <?php foreach ($ships as $key => $ship): ?>
                                                    <div class="shop__widget-list-item-2">
                                                        <input type="radio" name="shiping_id" value="<?= $ship['ship_id'] ?>" id="c-rate<?= $key ?>">
                                                        <label for="c-rate<?= $key ?>"><?= $ship['shipping_name'] ?> <span>(<?= number_format(($ship['shipping_prices']) * 1000, 0, '.', '.') ?>đ)</span></label>
                                                    </div>
                                                <?php endforeach ?>
                                                <?php if (isset($errors['shiping_id'])) : ?>
                                                    <p class="text-danger"><?= $errors['shiping_id'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="cart-checkout">
                                            <h4>Phương pháp thanh toán</h4>
                                            <div class="shop__widget-list">
                                                <div class="shop__widget-list-item-2 has-orange">
                                                    <input type="radio" name="payment_method" value="cod" id="c-shipping">
                                                    <label for="c-shipping">Thanh toán khi nhận hàng</label>
                                                    <?php if (isset($errors['payment_method'])) : ?>
                                                        <p class="text-danger"><?= $errors['payment_method'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (isset($_SESSION['coupon'])) { ?>
                                            <div class="cart-totails">
                                                <h4>Thành tiền</h4>
                                                <h4><?= number_format(($_SESSION['total'] - $_SESSION['totalCoupon']) * 1000, 0, '.', '.') ?>đ</h4>
                                            </div>
                                        <?php } else { ?>
                                            <div class="cart-totails">
                                                <h4>Thành tiền</h4>
                                                <h4><?= number_format((isset($_SESSION['total']) ? $_SESSION['total'] : 0) * 1000, 0, '.', '.') ?>đ</h4>
                                            </div>
                                        <?php } ?>
                                        <!-- <p>Wetters, as opposed to using Content here, content here, making it look like
                                                    readable English. Many desktop </p> -->
                                        <!-- <a class="cart-checkout-btn" href="#">Place Order</a> -->
                                        <button type="submit" name="submitCheckout" class="cart-checkout-btn">Check Out</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- checkout-area end -->

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
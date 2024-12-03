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
            <div class="row gutter-y-30 gx-5">
                <div class="">
                    <h4>Theo dõi đơn hàng</h4>
                </div>
                <div class="col-lg-10 col-xl-12">

                    <div class="xc-cart-page__table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Mã đơn hàng</th>
                                    <th class="cart-product-name">Trạng thái</th>
                                    <th class="product-price">Chi tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listOrder as $order): ?>
                                    <tr>
                                        <td class="product-name">#<?= $order['order_detail_id'] ?></td>
                                        <td class="product-price"><?= $order['status'] ?></td>
                                        <td>
                                            <a class="btn btn-primary" href="?act=track-order&order_detail_id=<?= $order['order_detail_id'] ?>">Xem chi tiết</a>

                                            <button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn hủy đơn hàng này không?')" 
                                            <?=($order['status'] == 'shiping' || $order['status'] == 'delivered'||$order['status'] == 'canceled' ) ? 'disabled' : "" ?>> <a href="?act=cancel-order&order_detail_id=<?= $order['order_detail_id'] ?>">Hủy hơn hàng</a></button>

                                        </td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="shop_cart_widget xc-accordion">
                                <div class="accordion" id="shop_size">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="size__widget">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#size_widget_collapse" aria-expanded="true" aria-controls="size_widget_collapse">Shopping Cart
                                            </button>
                                        </h2>
                                        <div id="size_widget_collapse" class="accordion-collapse collapse show" aria-labelledby="size__widget" data-bs-parent="#shop_size" >
                                            <div class="accordion-body">
                                                <div class="cart-coupon-code">
                                                    <input type="text" placeholder="Coupon Code">
                                                    <button>Apply</button>
                                                </div>
                                                <div class="cart-subtitle">
                                                    <h4>Subtotal</h4>
                                                    <h4>$4589</h4>
                                                </div>
                                                <div class="cart-checkout">
                                                    <h4>Shipping</h4>
                                                    <div class="shop__widget-list">
                                                        <div class="shop__widget-list-item-2">
                                                            <input type="radio" name="pay" id="c-rate">
                                                            <label for="c-rate">Flat rate</label>
                                                        </div>
                                                        <div class="shop__widget-list-item-2 has-orange">
                                                            <input type="radio" name="pay" id="c-Free">
                                                            <label for="c-Free">Free shipping</label>
                                                        </div>
                                                        <div class="shop__widget-list-item-2 has-green">
                                                            <input type="radio" name="pay" id="c-pickup">
                                                            <label for="c-pickup">Local pickup</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="cart-totails">
                                                    <h4>Subtotal</h4>
                                                    <h4>$4589</h4>
                                                </div>
                                                <p>Wetters, as opposed to using Content here, content here, making it look like readable English. Many desktop </p>
                                                <a class="cart-checkout-btn" href="checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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
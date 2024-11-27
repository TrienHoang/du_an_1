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
                        <span><a href="?act=index">Home</a></span>
                        <span class="dvdr"><i class="icon-arrow-right"></i></span>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- xc-breadcrumb area end -->

<div class="xc-cart-page pt-80 pb-80">
    <div class="container">
        <div class="row gutter-y-30 gx-5">
            <div class="col-lg-8 col-xl-9">
                <form action="?act=update-cart" method="post">
                    <div class="xc-cart-page__table">  
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Ảnh</th>
                                    <th class="cart-product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá sản phẩm</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product">Màu sắc</th>
                                    <th class="product">Dung lượng</th>
                                    <th class="product-remove">Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($carts as $cart): ?>
                                    <tr>
                                        <td class="product-thumbnail"><a href=""><img src="./images/product/<?= $cart['product_image'] ?>" alt=""></a></td>
                                        <td class="product-name"><a href=""><?= strlen($cart['product_name']) > 20 ? substr($cart['product_name'], 0, 20) . "..." : $cart['product_name']  ?></a>
                                        </td>
                                        <td class="product-price"><span class="amount"><?= number_format($cart['product_variant_sale_price'] * 1000, 0, '.', '.') ?>đ</span></td>
                                        <td class="product-quantity">
                                            <div class="xc-product-quantity mt-10 mb-10">
                                                <span class="xc-cart-minus sub">
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                                <input class="xc-cart-input" type="text" name="quantity[<?=$cart['cart_id']?>]" value="<?= $cart['quantity'] ?>">
                                                <span class="xc-cart-plus add">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td><?= $cart['variant_color_name'] ?></td>
                                        <td><?= $cart['variant_size_name'] ?></td>
                                        <!-- <td class="product-subtotal"><span class="amount"></span></td> -->
                                        <td class="product-remove">
                                            <a href="?act=delete-cart&id=<?= $cart["cart_id"] ?>">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class=" mt-3 d-flex justify-content-end">
                            <button class="btn btn-primary p-2 ps-4 pe-4" type="submit" name="updateCart">Update cart</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3">
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
                                        <h4><?= number_format($sum * 1000, 0, '.', '.') ?>đ</h4>
                                    </div>
                                    <!-- <div class="cart-checkout">
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
                                                </div> -->
                                    <div class="cart-totails">
                                        <h4>Subtotal</h4>
                                        <h4><?= number_format($sum * 1000, 0, '.', '.') ?>đ</h4>
                                    </div>
                                    <p>Wetters, as opposed to using Content here, content here, making it look like readable English. Many desktop </p>
                                    <a class="cart-checkout-btn" href="checkout.html">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
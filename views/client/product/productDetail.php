<?php
include "../views/client/layout/header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 


    <style>
/* Container chính */
.product__details-variants {
    margin-top: 20px;
    text-align: center;
}

.product__details-variants p {
    font-size: 16px;
    font-weight: 500;
    color: #333;
    letter-spacing: 0.5px;
}

/* Container màu */
.variant-colors {
    display: flex;
    gap: 12px;
    position: relative;
}

/* Vòng tròn màu */
.color {
    width: 28px; /* Nhỏ hơn */
    height: 28px;
    background: var(--color);
    border-radius: 50%;
    border: 1.5px solid rgba(0, 0, 0, 0.1); /* Viền nhạt */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); /* Bóng mờ nhẹ */
    cursor: pointer;
    position: relative;
    transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease;
}

/* Hiệu ứng hover */
.color:hover {
    transform: scale(1.1); /* Tăng kích thước nhẹ */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* Bóng nổi bật hơn */
    border-color: rgba(0, 0, 0, 0.2); /* Viền đậm hơn khi hover */
}

/* Hiệu ứng chọn (class 'selected') */
.color.selected {
    border-color: #555; /* Viền đậm hơn */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* Hiệu ứng nổi bật */
}

/* Tooltip tên màu */
.color::before {
    content: attr(title);
    position: absolute;
    top: -24px;
    left: 50%;
    transform: translateX(-50%);
    background: #333;
    color: #fff;
    font-size: 10px;
    font-weight: 400;
    padding: 3px 6px;
    border-radius: 3px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.25s ease, transform 0.25s ease;
}

/* Hiển thị tooltip khi hover */
.color:hover::before {
    opacity: 1;
    transform: translateX(-50%) translateY(-4px);
}



    </style>
</head>
<body>
    

<div class="xc-preloader">
        <div class="xc-preloader__image">
            <img src="client/assets/img/preloader/preloader.png" alt="preloader">
        </div>
    </div>
    <?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?php echo $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); ?>
<?php endif; ?>

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
                                <span><a href="#"><?= $productDetail['category_name'] ?></a></span>
                                <span class="dvdr"><i class="icon-arrow-right"></i></span>
                                <span><a href="#"><?= $productDetail['product_name'] ?></a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- xc-breadcrumb area end -->

        <!-- product details area start -->
        <section class="product__details-area pt-80 pb-80">
            <div class="container">
                <div class="row gutter-y-30" style="display: flex;">
                    <div class="col-xl-6 col-lg-6">
                        <div class="product__details-thumb-tab">
                            <div class="product__details-thumb-content w-img">
                                <div class="tab-content" id="nav-tabContent">

                                <?php foreach($productDetail['galleries'] as $key=>$gallery): ?>
                                    <div class="tab-pane fade show <?= $key === 0 ? 'active' : '' ?>" id="nav-<?= $key +1 ?>" role="tabpanel" aria-labelledby="nav-<?= $key +1?>-tab">
                                    <img style="width: 350px;" src="./images/product_gallery/<?=$gallery?>" alt="" >
                                    </div>
                                <?php endforeach; ?>

                            </div>
                            <div class="product__details-thumb-nav xc-tab">
                                <nav>
                                    <div class="nav nav-tabs justify-content-sm-between" id="nav-tab" role="tablist">

                                    <?php foreach($productDetail['galleries'] as $key=>$gallery): ?>
                                        <button class="nav-link<?= $key === 0 ? 'active' : '' ?>" id="nav-<?= $key +1 ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?= $key +1?>" type="button" role="tab" aria-controls="nav-<?= $key +1?>" aria-selected="<?= $key === 0 ? 'true' : 'false' ?>">
                                            <img style="width: 100px;" src="./images/product_gallery/<?=$gallery?>" alt="">
                                        </button>
                                    <?php endforeach; ?>

                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">

                        <form action="?act=addToCart-byNow" method="post">
                            
                            
                        <div class="product__details-wrapper" >

                            <input type="hidden" name="product_id" value="<?= $productDetail['product_id']?>">
                            <input type="hidden" name="product_variant_id" value="<?= $productDetail['product_variant_id']?>">

                            <div class="product__details-stock">
                                <span><?=$productDetail['category_name'] ?></span>
                            </div>
                            <h3 class="product__details-title"><?=$productDetail['product_name'] ?> </h3>

                            <div class="product__details-rating d-flex align-items-center">
                                <div class="product__rating product__rating-2 d-flex">
                                    <span>
                                        <i class="icon-star"></i>
                                    </span>
                                    <span>
                                        <i class="icon-star"></i>
                                    </span>
                                    <span>
                                        <i class="icon-star"></i>
                                    </span>
                                    <span>
                                        <i class="icon-star"></i>
                                    </span>
                                    <span>
                                        <i class="icon-star"></i>
                                    </span>
                                </div>
                                <div class="product__details-rating-count">
                                    <span>(0 review)</span>
                                </div>
                            </div>

                            <p><?=$productDetail['product_description'] ?></p>
                            

                            <div class="product__details-price">
                                <span class="product__details-ammount old-ammount sale-price-variants"><?=number_format($productDetail['product_sale_price'] * 1000, 0, '.', '.') ?>đ</span>
                                <span class="product__details-ammount new-ammount price-variants"><?=number_format($productDetail['product_price'] * 1000, 0, '.', '.') ?>đ</span>
                                <span class="product__details-offer">-12%</span>
                                <input type="hidden" name="variant_id" id="variant_id">
                            </div>


                            <div class="product__details-tags">
                            <span>RAM:</span>
                            <?php foreach($productDetail['variants'] as $variant) : ?>
                                <button type="button" data-size="<?=$variant['variant_size_name']?>">
                                <span ><?=$variant['variant_size_name']?></span>
                                </button>
                            <?php endforeach; ?>
                            </div>

                            <div class="product__details-tags">
                                <span>MÀU:</span>
                                <?php foreach($productDetail['variants'] as $variant) : ?>

                                <button type="button" class="product__details-variants " data-color="<?=$variant['variant_color_code']?>">

                                <span class="color" style="--color: <?= $variant['variant_color_code']; ?>" title="<?= $variant['variant_color_name']; ?>"></span>

                                    <!-- <div class="color" style="--color: #000000;" title="Black"></div>
                                    <div class="color" style="--color: #FFC0CB;" title="Pink"></div>
                                    <div class="color" style="--color: #ADD8E6;" title=" Blue"></div> -->
                               
                                <!-- </div> #FFFFFF -->
                            </button>
                            <?php endforeach; ?>
                    </div>
                        

                            <span class="product__details-quantity quantity-variants"> So luong: 
                            </span>
                                <div class="xc-product-quantity mt-10 mb-10">
                                    <span class="xc-cart-minus sub">
                                        <i class="fas fa-minus"></i>
                                    </span>
                                    <input class="xc-cart-input" type="text" name="quantity" value="1" />
                                    <span class="xc-cart-plus add">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                </div>
                           

                            <div class="product__details-action d-flex flex-wrap align-items-center">
                                <button name="add_to_cart" class="product-add-cart-btn swiftcart-btn" style="padding: 15px 30px;">
                                    Add to cart
                                </button>

                                <button name="buy_now" class="product-add-cart-btn swiftcart-btn" style="padding: 15px 30px;">
                                   Buy now
                                </button>
                                <!-- <button type="button" class="product-action-btn">
                                    <i class="icon-love"></i>
                                </button>
                                <button type="button" class="product-action-btn">
                                    <i class="icon-eye"></i>
                                </button> -->
                            </div>
                            <!-- <div class="product__details-sku product__details-more">
                                <p>SKU:</p>
                                <span>29045-SB-8</span>
                            </div>
                            <div class="product__details-categories product__details-more">
                                <p>Categories:</p>
                                <span>
                                    <a href="#">Bag,</a>
                                </span>
                                <span>
                                    <a href="#">Ladies Bag,</a>
                                </span>
                                <span>
                                    <a href="#">Handbags</a>
                                </span>
                            </div>
                            -->
                            <!-- <div class="product__details-share">
                                <span>Share:</span>

                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                            </div>  -->
                        </div>
                    </div>

                    </form>
                    
                </div>
            </div>
        </section>
        <!-- product details area end -->

        <!-- product details tab area start -->
        <section class="product__details-tab-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="product__details-tab-nav">
                            <nav>
                                <div class="product__details-tab-nav-inner nav xc-tab-menu d-flex flex-sm-nowrap flex-wrap" id="nav-tab-info" role="tablist">

                                    <button class="nav-link active" id="nav-desc-tab" data-bs-toggle="tab" data-bs-target="#nav-desc" type="button" role="tab" aria-controls="nav-desc" aria-selected="true">Description</button>

                                    <button class="nav-link" id="nav-additional-tab" data-bs-toggle="tab" data-bs-target="#nav-additional" type="button" role="tab" aria-controls="nav-additional" aria-selected="false">Additional information</button>

                                    <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews (02)</button>
                                    <span id="marker" class="xc-tab-line d-none d-sm-inline-block"></span>
                                </div>
                            </nav>
                        </div>
                        <div class="product__details-tab-content">
                            <div class="tab-content" id="nav-tabContent-info">
                                <div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                                    <div class="product__details-description product__details-review-inner mt-60">
                                        <div class="product__details-description-content">
                                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                                nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                                fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                minim veniam,
                                                Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                                                dolore eu fugiat nulla pariatur. </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-additional" role="tabpanel" aria-labelledby="nav-additional-tab">
                                    <div class="product__details-additional">
                                        <div class="product__details-additional-inner">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">Brand:</th>
                                                        <td>Apple</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Style:</th>
                                                        <td>GPS</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Screen Size:</th>
                                                        <td>41 Millimeters</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Color:</th>
                                                        <td>Green Aluminum Case with Clover Sport Band</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Compatible Devices:</th>
                                                        <td>Smarxchone</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Special Feature:</th>
                                                        <td>Activity Tracker, Heart Rate Monitor, Sleep Monitor, Blood
                                                            Oxygen</td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">Capacity:</th>
                                                        <td>32GB</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                                    <div class="product__details-review pt-60">
                                        <div class="product__details-review-inner">
                                            <div class="product-rating">
                                                <h4 class="product-rating-title">Ratings and reviews</h4>
                                                <div class="product-rating-wrapper d-flex flex-wrap align-items-center mb-50">
                                                    <div class="product-rating-number mr-40">
                                                        <h4 class="product-rating-number-title">4.5</h4>
                                                        <div class="product-rating-star">
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="product-rating-bar-wrapper">
                                                        <div class="product-rating-bar-item d-flex align-items-center">
                                                            <div class="product-rating-bar-text">
                                                                <span>5</span>
                                                            </div>
                                                            <div class="product-rating-bar">
                                                                <div class="single-progress" data-width="70%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-rating-bar-item d-flex align-items-center">
                                                            <div class="product-rating-bar-text">
                                                                <span>4</span>
                                                            </div>
                                                            <div class="product-rating-bar">
                                                                <div class="single-progress" data-width="60%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-rating-bar-item d-flex align-items-center">
                                                            <div class="product-rating-bar-text">
                                                                <span>3</span>
                                                            </div>
                                                            <div class="product-rating-bar">
                                                                <div class="single-progress" data-width="40%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-rating-bar-item d-flex align-items-center">
                                                            <div class="product-rating-bar-text">
                                                                <span>2</span>
                                                            </div>
                                                            <div class="product-rating-bar">
                                                                <div class="single-progress" data-width="10%"></div>
                                                            </div>
                                                        </div>
                                                        <div class="product-rating-bar-item d-flex align-items-center">
                                                            <div class="product-rating-bar-text">
                                                                <span>1</span>
                                                            </div>
                                                            <div class="product-rating-bar">
                                                                <div class="single-progress" data-width="25%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product__details-review-list mb-65">
                                                <div class="product-review-item">
                                                    <div class="product-review-avater d-flex align-items-center">
                                                        <div class="product-review-avater-thumb">
                                                            <img src="client/assets/img/blog/comment-avata-1.jpg" alt="">
                                                        </div>
                                                        <div class="product-review-avater-info">
                                                            <h4 class="product-review-avater-title">Michelle Hunter</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-review-rating d-flex align-items-center">
                                                        <div class="product-review-rating-wrapper d-flex">
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                        </div>
                                                        <div class="product-review-rating-date">
                                                            <span>August 8, 2022</span>
                                                        </div>
                                                    </div>
                                                    <p>I’m upgrading from a series 1, so it is a completely different
                                                        watch. I am very satisfied with this purchase. Most of the heart
                                                        monitoring functions only work with people.</p>
                                                </div>
                                                <div class="product-review-item">
                                                    <div class="product-review-avater d-flex align-items-center">
                                                        <div class="product-review-avater-thumb">
                                                            <img src="client/assets/img/blog/comment-avata-2.jpg" alt="">
                                                        </div>
                                                        <div class="product-review-avater-info">
                                                            <h4 class="product-review-avater-title">Sean Hathaway</h4>
                                                        </div>
                                                    </div>
                                                    <div class="product-review-rating d-flex align-items-center">
                                                        <div class="product-review-rating-wrapper d-flex">
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                        </div>
                                                        <div class="product-review-rating-date">
                                                            <span>August 10, 2022</span>
                                                        </div>
                                                    </div>
                                                    <p>I’m upgrading from a series 1, so it is a completely different
                                                        watch. I am very satisfied with this purchase. Most of the heart
                                                        monitoring functions only work with people.</p>
                                                </div>
                                            </div>
                                            <div class="product-review-form">
                                                <h3 class="product-review-form-title">Add a review</h3>
                                                <p>Your email address will not be published. Required fields are marked
                                                    *</p>
                                                <form action="#">
                                                    <div class="product-review-form-rating  mb-25">
                                                        <h3 class="rate-title">Rate this product:</h3>
                                                        <div class="product-review-rating-wrapper d-flex">
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                            <span>
                                                                <i class="icon-star"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="product-review-input is-textarea">
                                                                <textarea placeholder="Your Review Here..."></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="product-review-input">
                                                                <input type="text" placeholder="Name*">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="product-review-input">
                                                                <input type="email" placeholder="Email*">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="product-review-agree d-flex align-items-start mb-25">
                                                                <input type="checkbox" id="p-agree">
                                                                <label for="p-agree">Save my name, email, and website in
                                                                    this browser for the next time I comment</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="product-review-btn">
                                                                <button class="swiftcart-btn" type="submit">Submit
                                                                    Review</button>
                                                            </div>
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
        </section>
        <!-- product details tab area end -->

        <!-- related product -->
        

        <div class="xc-related-product pb-80">
            <div class="container">
                <h3 class="xc-section-title mb-30"> Sản phẩm liên quan</h3>
                <div class="row gutter-y-30">
                    <div class="col-xl-3 col-md-6">
                        <?php foreach($product as $pro): ?>
            <div class="col">
                <div class="xc-product-two__item">
                    <span class="xc-product-two__deal d-none">BEST DEALS</span>

                    <div class="xc-product-two__img">
                        <img src="./images/product/<?php echo $pro['product_image']?>" alt="product">
                    </div>

                    <h5 class="xc-product-two__title">
                        <a href="#" style="font-size: 12px;"><?php echo $pro['category_name']?></a>
                    </h5>

                    <h3 class="xc-product-two__title"><strong><a href="#"><?php echo $pro['product_name']?></a></strong></h3>

                    <div class="xc-product-two__btn">
                    <a href="?act=product_detail&slug=<?= $pro['product_slug'] ?>"><i class="icon-eye"></i></a>

                        <a href="cart.html"><i class="icon-grocery-store"></i></a>
                    </div>
                    
                    <div>
                        <h4 class="xc-product-two__price" style="font-size: 12px; color: gray;"><del><?php echo number_format($pro['product_sale_price']* 1000,0, '.','.') ?>đ</del></h4>
                        <h4 class="xc-product-two__price"><?php echo number_format($pro['product_price']* 1000,0, '.','.') ?>đ</h4>
                    </div>

                    <div class="xc-product-two__ratting">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <span>(0 review)</span>
                    </div>

                </div>
            </div>
            <?php endforeach; ?>
                    </div>
                    
                </div>
            </div>
        </div>
     

        <div class="xc-newsletter-form pt-60 pb-60 xc-has-overlay" data-bg="client/assets/img/bg/newsletter-bg.jpg">
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
        </body>
        
        </html>
        <script>
document.addEventListener('DOMContentLoaded', function() {
    let selectedColor = null;
    let selectedSize = null;
    let selectedVariantId = null; 

    // Lấy dữ liệu từ php sang js
    const variants = <?= json_encode($productDetail['variants']); ?>;

    // Lấy các nút màu và kích thước
    const colorButtons = document.querySelectorAll('.product__details-variants');
    const sizeButtons = document.querySelectorAll('.product__details-tags button');
    const addToCartButton = document.querySelector('[name="add_to_cart"]');
    const buyNowButton = document.querySelector('[name="buy_now"]');

    // Hàm kiểm tra giá, số lượng và id biến thể
    function checkPrice() {
        const errorMessage = document.getElementById('error-message');
        errorMessage.textContent = ''; 

        if (selectedColor && selectedSize) {
            const matchedVariant = variants.find(variant =>
                variant.variant_color_code === selectedColor &&
                variant.variant_size_name === selectedSize
            );

            if (matchedVariant) {
                // Cập nhật giá và số lượng
                document.querySelector('.price-variants').textContent =
                    numberWithCommas(matchedVariant.product_variant_price * 1000) + 'đ';
                document.querySelector('.sale-price-variants').textContent =
                    numberWithCommas(matchedVariant.product_variant_sale_price * 1000) + 'đ';
                document.querySelector('.quantity-variants').textContent =
                    `Số lượng: ${matchedVariant.product_variant_quantity}`;

                // Cập nhật `variant_id` vào input ẩn
                document.getElementById('variant_id').value = matchedVariant.variant_id;
                selectedVariantId = matchedVariant.variant_id;  

                // Kiểm tra trạng thái tồn kho
                const isOutOfStock = matchedVariant.product_variant_quantity <= 0;
                addToCartButton.disabled = isOutOfStock;
                buyNowButton.disabled = isOutOfStock;

                if (isOutOfStock) {
                    errorMessage.textContent = "Sản phẩm đã hết hàng, vui lòng chọn biến thể khác.";
                }
            } else {
                errorMessage.textContent = "Không tìm thấy biến thể phù hợp.";
                resetDetails();
            }
        } else {
            resetDetails();
        }
    }

   
    function resetDetails() {
        document.querySelector('.price-variants').textContent = '';
        document.querySelector('.sale-price-variants').textContent = '';
        document.querySelector('.quantity-variants').textContent = 'Số lượng: 0';
        document.getElementById('variant_id').value = '';
        addToCartButton.disabled = true;
        buyNowButton.disabled = true;
    }

    // Cập nhật các màu có sẵn cho kích thước đã chọn
    function updateColor() {
        colorButtons.forEach(button => {
            const color = button.getAttribute('data-color');
            const isAvailable = variants.some(variant =>
                variant.variant_color_code === color &&
                variant.variant_size_name === selectedSize
            );
            button.disabled = !isAvailable;
            button.classList.toggle('selected', isAvailable && color === selectedColor);
        });
        checkPrice();
    }

    // Cập nhật các kích thước có sẵn cho màu đã chọn
    function updateSize() {
        sizeButtons.forEach(button => {
            const size = button.getAttribute('data-size');
            const isAvailable = variants.some(variant =>
                variant.variant_color_code === selectedColor &&
                variant.variant_size_name === size
            );
            button.disabled = !isAvailable;
            button.classList.toggle('selected', isAvailable && size === selectedSize);
        });
        checkPrice();
    }

    //  chọn màu
    colorButtons.forEach(button => {
        button.addEventListener('click', function() {
            selectedColor = this.getAttribute('data-color');
            updateSize();
            checkPrice();
        });
    });

    // chọn kích thước
    sizeButtons.forEach(button => {
        button.addEventListener('click', function() {
            selectedSize = this.getAttribute('data-size');
            updateColor();
            checkPrice();
        });
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    // Kiểm tra và thông báo khi submit form
    document.querySelector('form').addEventListener('submit', function (event) {
        const variantId = document.getElementById('variant_id').value;
        if (!variantId || variantId === 'undefined') {
            alert("Vui lòng chọn màu sắc và dung lượng sản phẩm trước khi thêm vào giỏ hàng.");
            event.preventDefault();
        }
    });
    
});

</script>
<div id="error-message" style="color: red; margin-top: 10px;"></div>

<?php
include "../views/client/layout/footer.php";
?>
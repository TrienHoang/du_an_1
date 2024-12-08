<?php
include "../views/client/layout/header.php";
?>
<!-- <pre>
<?=var_dump($productDetail) ?>    
</pre> -->

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
                        <span><a href=""><?= $productDetail['category_name'] ?></a></span>
                        <span class="dvdr"><i class="icon-arrow-right"></i></span>
                        <span><a href=""><?= $productDetail['product_name'] ?></a></span>
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

        <div class="row gutter-y-30">
            <div class="col-xl-6 col-lg-6">
                <div class="product__details-thumb-tab">
                    <div class="product__details-thumb-content w-img">
                        <div class="tab-content" id="nav-tabContent">
                            <?php foreach ($productDetail['galleries'] as $key => $gallery) : ?>
                                <div class="tab-pane fade show <?= $key === 0 ? "active" : "" ?>" id="nav-<?= $key + 1 ?>" role="tabpanel" aria-labelledby="nav-<?= $key + 1 ?>-tab">
                                    <img src="./images/product_gallery/<?= $gallery ?>" height="800px" alt="">
                                </div>
                            <?php endforeach ?>

                        </div>
                    </div>
                    <div class="product__details-thumb-nav xc-tab">
                        <nav>

                            <div class="nav nav-tabs justify-content-sm-start" id="nav-tab" role="tablist">
                                <?php foreach ($productDetail['galleries'] as $key => $gallery) : ?>
                                    <button class="nav-link <?= $key === 0 ? "active" : "" ?>" id="nav-<?= $key + 1 ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-<?= $key + 1 ?>" type="button" role="tab" aria-controls="nav-<?= $key + 1 ?>" aria-selected="true">
                                        <img src="./images/product_gallery/<?= $gallery ?>" height="100px" alt="">
                                    </button>
                                <?php endforeach ?>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <form action="?act=addToCart-byNow" method="post">
                    <div class="product__details-wrapper">

                        <input type="hidden" name="product_id" value="<?= $productDetail['product_id'] ?>">

                        <input type="hidden" name="product_variant_id" value="<?= $productDetail['product_variant_id'] ?>">

                        <div class="product__details-stock">
                            <span><?= $productDetail['category_name'] ?></span>
                        </div>
                        <h3 class="product__details-title"><?= $productDetail['product_name'] ?></h3>

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
                                <span>(4 customer review)</span>
                            </div>
                        </div>



                        <div class="product__details-price">
                            <span class="product__details-ammount old-ammount price-variants"><?= number_format($productDetail['product_price'] * 1000, 0, '.', '.') ?></span>
                            <span class="product__details-ammount new-ammount sale-price-variants"><?= number_format($productDetail['product_sale_price'] * 1000, 0, '.', '.') ?></span>
                            <!-- <span class="product__details-offer">-12%</span> -->
                            <input type="hidden" name="variant_id" id="variant_id">
                        </div>
                        <div class="product-detail-variant">
                            <div class="product-detail-variant-color">
                                <h5>Màu: </h5>
                                <div class="row">
                                    <?php foreach ($productDetail["variants"] as $key => $variant): ?>
                                        <button type="button" class="btn btn-color col-2 m-1" data-color="<?= $variant["variant_color_code"] ?>"><span class="  rounded-5 p-2 pe-4" style=" background-color: <?= $variant["variant_color_code"] ?>;"></span></button>
                                    <?php endforeach ?>
                                </div>
                            </div>

                            <div class="product-detail-variant-size">
                                <h5>Dung lượng: </h5>
                                <div class="row">
                                    <?php foreach ($productDetail["variants"] as $key => $variant): ?>
                                        <button type="button" class="btn btn-size col-2 m-1" style=" border: none;" data-size="<?= $variant["variant_size_name"] ?>"><?= $variant["variant_size_name"] ?></button>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>

                        <span class="product__details-quantity quantity-variants"> Số lượng:
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
                            <button type="submit" class="product-add-cart-btn swiftcart-btn" name="add_to_cart">
                                Thêm vào giỏ hàng
                            </button>
                            <button class="product-add-cart-btn swiftcart-btn" name="buy_now">
                                Mua ngay
                            </button>
                            <!-- <button type="button" >
                                <i class="icon-love"></i>
                            </button>
                            <button type="button" class="product-action-btn">
                                <i class="icon-eye"></i>
                            </button> -->
                        </div>
                        <!-- <div class="product__details-sku product__details-more">
                        <p>SKU:</p>
                        <span>29045-SB-8</span>
                    </div> -->
                    </div>
                    <div class="product__details-categories product__details-more">
                        <p>Danh mục:</p>
                        <span>
                            <a href="#"><?= $productDetail['category_name'] ?></a>
                        </span>
                    </div>
                    <div class="product__details-share">
                        <span>Share:</span>

                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </form>
            </div>

        </div>
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

                            <button class="nav-link active" id="nav-desc-tab" data-bs-toggle="tab" data-bs-target="#nav-desc" type="button" role="tab" aria-controls="nav-desc" aria-selected="true">Mô tả</button>

                            <button class="nav-link" id="nav-additional-tab" data-bs-toggle="tab" data-bs-target="#nav-additional" type="button" role="tab" aria-controls="nav-additional" aria-selected="false">Thông tin sản phẩm</button>

                            <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Bình luận (02)</button>
                            <span id="marker" class="xc-tab-line d-none d-sm-inline-block"></span>
                        </div>
                    </nav>
                </div>
                <div class="product__details-tab-content">
                    <div class="tab-content" id="nav-tabContent-info">
                        <div class="tab-pane fade show active" id="nav-desc" role="tabpanel" aria-labelledby="nav-desc-tab">
                            <div class="product__details-description product__details-review-inner mt-60">
                                <div class="product__details-description-content">
                                <p><?= $productDetail['product_description'] ?></p>
                                    </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-additional" role="tabpanel" aria-labelledby="nav-additional-tab">
                            <div class="product__details-additional">
                                <div class="product__details-additional-inner">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Hãng điện thoại:</th>
                                                <td><?=$productDetail['category_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Dung lượng bộ nhớ</th>
                                                <td>256Gb</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Màu:</th>
                                                <td>Xanh lá</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tương thích </th>
                                                <td>Hệ điều hành Ios và Androi</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Tính năng đặc biệt</th>
                                                <td> Theo dõi hoạt động, Theo dõi nhịp tim, Theo dõi giấc ngủ, Oxy trong máu</td>
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
                                                    <img src="assets/img/blog/comment-avata-1.jpg" alt="">
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
                                                    <img src="assets/img/blog/comment-avata-2.jpg" alt="">
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
        <h3 class="xc-section-title mb-30">Sản phẩm liên quan</h3>
        <div class="row gutter-y-30">
            <?php foreach ($get4product as $key => $product): ?>
                <div class="col-xl-3 col-md-6">
                    <div class="xc-product-eight__item">
                        <div class="xc-product-eight__img">
                            <img src="./images/product/<?= $product['image'] ?>" style="width: 100%; height: 255px; object-fit: cover;" alt="fas">
                            <span class="xc-product-eight__offer">30% off</span>
                            <div class="xc-product-eight__icons">
                                <a href="?act=product_detail&slug=<?= $product['slug'] ?>" class="xc-product-eight__action">
                                    <i class="icon-eye"></i>
                                    <span class="xc-product-eight__tooltip">Xem chi tiết</span>
                                </a>
                                <!-- <button class="xc-product-eight__action">
                                <i class="icon-magnifying-glass"></i>
                                <span class="xc-product-eight__tooltip">Quick view</span>
                            </button>
                            <button class="xc-product-eight__action">
                                <i class="icon-shopping-cart"></i>
                                <span class="xc-product-eight__tooltip">Add To Cart</span>
                            </button> -->
                            </div>
                        </div>
                        <div class="xc-product-eight__content">
                            <div class="xc-product-eight__ratting">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                (25 Reviews)
                            </div>
                            <h3 class="xc-product-eight__title"><a href="product-details.html"><?=$product['name'] ?></a></h3>
                            <h5 class="xc-product-eight__price"><del class="me-1"><?= number_format($product['sale_price'] * 1000, 0, '.', '.') ?>đ</del><?= number_format($product['price'] * 1000, 0, '.', '.') ?>đ</h5>
                        </div>
                    </div>
                </div> <?php endforeach ?>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let selectedColor = null;
        let selectedSize = null;
        let selectedVariantId = null;

        // Lấy dữ liệu từ php sang js
        const variants = <?= json_encode($productDetail['variants']); ?>;
        console.log(variants);
        // Lấy các nút màu và kích thước
        const colorButtons = document.querySelectorAll('.btn-color');
        const sizeButtons = document.querySelectorAll('.btn-size');

        //  chọn màu
        colorButtons.forEach(button => {
            button.addEventListener('click', function() {
                selectedColor = this.getAttribute('data-color');
                // console.log(selectedColor);
                updateSize();
                checkPrice();
            });
        });


        // chọn kích thước
        sizeButtons.forEach(button => {
            button.addEventListener('click', function() {
                selectedSize = this.getAttribute('data-size');
                // console.log(selectedSize);
                updateColor();
                checkPrice();
            });
        });

        // Hàm kiểm tra giá, số lượng và id biến thể
        function checkPrice() {
            if (selectedColor && selectedSize) {
                const matchedVariant = variants.find(variant =>
                    variant.variant_color_code === selectedColor &&
                    variant.variant_size_name === selectedSize
                );
                // console.log(matchedVariant);
                if (matchedVariant) {
                    document.querySelector('.price-variants').textContent = numberWithCommas(matchedVariant.product_variant_price);
                    document.querySelector('.sale-price-variants').textContent = numberWithCommas(matchedVariant.product_variant_sale_price);
                    document.querySelector('.quantity-variants').textContent = `Số lượng : ${matchedVariant.product_variant_quantity}`;
                    document.getElementById('variant_id').value = matchedVariant.product_variant_id;
                }
            } else {
                document.querySelector('.price-variants').textContent = '';
                document.querySelector('.sale-price-variants').textContent = '';
                document.querySelector('.quantity-variants').textContent = 'Số lượng: 0';
                document.getElementById('variant_id').value = '';
            }
        }


        // Cập nhật các màu có sẵn cho kích thước đã chọn
        function updateColor() {
            colorButtons.forEach(button => {
                const color = button.getAttribute('data-color');
                const isAvailable = variants.some(variant =>
                    variant.variant_color_code === color &&
                    variant.variant_size_name === selectedSize
                );
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
                if (!isAvailable) {
                    button.classList.remove("selected")
                }
            });
            selectedSize = null;
        }


        function numberWithCommas(x) {
            return new Intl.NumberFormat('vi-VN').format(x)
        }
    });
</script>
<?php
include "../views/client/layout/footer.php";
?>
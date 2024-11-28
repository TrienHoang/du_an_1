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
                                <span>Shop</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- xc-breadcrumb area end -->

        <!-- shop area start -->
        <section class="xc-shop-area pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4">
                        <div class="shop__sidebar on-left">
                            <div class="shop__widget xc-accordion">
                                <div class="accordion" id="shop_category">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="category__widget">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#cagetory_widget_collapse" aria-expanded="true" aria-controls="cagetory_widget_collapse">
                                                Categories
                                            </button>
                                        </h2>
                                        <div id="cagetory_widget_collapse" class="accordion-collapse collapse show" aria-labelledby="category__widget" data-bs-parent="#shop_category">
                                            <div class="accordion-body">
                                                <div class="shop__widget-list">
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="all" checked>
                                                        <label for="all">All</label>
                                                    </div>
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="man" checked>
                                                        <label for="man">Man</label>
                                                    </div>
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="women">
                                                        <label for="women">Women</label>
                                                    </div>
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="child">
                                                        <label for="child">Child</label>
                                                    </div>
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="tshirt">
                                                        <label for="tshirt">T-shirt</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop__widget xc-accordion">
                                <div class="accordion" id="shop_brand">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="brand__widget">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#brand_widget_collapse" aria-expanded="true" aria-controls="brand_widget_collapse">
                                                Brands
                                            </button>
                                        </h2>
                                        <div id="brand_widget_collapse" class="accordion-collapse collapse show" aria-labelledby="brand__widget" data-bs-parent="#shop_brand">
                                            <div class="accordion-body">
                                                <div class="shop__widget-list">
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="iphone_12">
                                                        <label for="iphone_12">Rich Man</label>
                                                    </div>
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="iphone_12_pro">
                                                        <label for="iphone_12_pro">Doji Bari</label>
                                                    </div>
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="iphone_11_pro">
                                                        <label for="iphone_11_pro">Polo Cotton</label>
                                                    </div>
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="samsung" checked>
                                                        <label for="samsung">Easy</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop__widget xc-accordion">
                                <div class="accordion" id="shop_size">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="size__widget">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#size_widget_collapse" aria-expanded="true" aria-controls="size_widget_collapse">Size
                                            </button>
                                        </h2>
                                        <div id="size_widget_collapse" class="accordion-collapse collapse show" aria-labelledby="size__widget" data-bs-parent="#shop_size">
                                            <div class="accordion-body">
                                                <div class="shop__widget-list">
                                                    <div class="shop__widget-list-item-2">
                                                        <input type="checkbox" id="c-black" checked>
                                                        <label for="c-black">S</label>
                                                    </div>
                                                    <div class="shop__widget-list-item-2 has-orange">
                                                        <input type="checkbox" id="c-orange">
                                                        <label for="c-orange">M</label>
                                                    </div>
                                                    <div class="shop__widget-list-item-2 has-green">
                                                        <input type="checkbox" id="c-green">
                                                        <label for="c-green">L</label>
                                                    </div>
                                                    <div class="shop__widget-list-item-2 has-red">
                                                        <input type="checkbox" id="c-red" checked>
                                                        <label for="c-red">Xl</label>
                                                    </div>
                                                    <div class="shop__widget-list-item-2 has-yellow">
                                                        <input type="checkbox" id="c-XXL">
                                                        <label for="c-XXL">XXL</label>
                                                    </div>
                                                    <div class="shop__widget-list-item-2 has-yellow">
                                                        <input type="checkbox" id="c-XXXL">
                                                        <label for="c-XXXL">XXXL</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop__widget xc-accordion">
                                <div class="accordion" id="shop_range">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="range__widget">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#range_widget_collapse" aria-expanded="true" aria-controls="range_widget_collapse">Price range
                                            </button>
                                        </h2>
                                        <div id="range_widget_collapse" class="accordion-collapse collapse show" aria-labelledby="range__widget" data-bs-parent="#shop_range">
                                            <div class="accordion-body">
                                                <div class="price-ranger">
                                                    <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                                    </div>
                                                    <div class="ranger-min-max-block">
                                                        <input type="text" readonly="" class="min">
                                                        <span>-</span>
                                                        <input type="text" readonly="" class="max">
                                                        <input type="submit" value="Filter">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="shop__widget xc-accordion">
                                <div class="accordion" id="shop_price">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="price__widget">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#price_widget_collapse" aria-expanded="true" aria-controls="price_widget_collapse">
                                                Price
                                            </button>
                                        </h2>
                                        <div id="price_widget_collapse" class="accordion-collapse collapse show" aria-labelledby="price__widget" data-bs-parent="#shop_price">
                                            <div class="accordion-body">
                                                <div class="shop__widget-list">
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="higher">
                                                        <label for="higher">$10.00 - $49.00</label>
                                                    </div>
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="high" checked>
                                                        <label for="high">$50.00 - $99.00</label>
                                                    </div>
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="medium">
                                                        <label for="medium">$100.00 - $199.00</label>
                                                    </div>
                                                    <div class="shop__widget-list-item">
                                                        <input type="checkbox" id="low">
                                                        <label for="low">$200.00 +</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="xc-shop-main-wrapper">
                            <div class="xc-shop-top mb-45 bg-white">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="xc-shop-top-left d-flex align-items-center ">
                                            <div class="xc-shop-top-result">
                                                <p>Showing 1–14 of 26 results</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="xc-shop-top-right d-sm-flex align-items-center justify-content-md-end">
                                            <div class="xc-shop-top-select">
                                                <select>
                                                    <option>Default Sorting</option>
                                                    <option>Low to Hight</option>
                                                    <option>High to Low</option>
                                                    <option>New Added</option>
                                                    <option>On Sale</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="xc-shop-items-wrapper xc-shop-item-primary">
                                <div class="row gutter-y-20">
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-1.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <span class="xc-product-two__deal">BEST DEALS</span>
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-2.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <span class="xc-product-two__deal">BEST DEALS</span>
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-3.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <span class="xc-product-two__deal">BEST DEALS</span>
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-4.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <span class="xc-product-two__deal">BEST DEALS</span>
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-5.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-6.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <span class="xc-product-two__deal">BEST DEALS</span>
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-7.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-8.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <span class="xc-product-two__deal">BEST DEALS</span>
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-9.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <span class="xc-product-two__deal">BEST DEALS</span>
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-10.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">

                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-11.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-6 infinite-item">
                                        <div class="xc-product-two__item">
                                            <div class="xc-product-two__img">
                                                <img src="assets/img/products/f-product-1-12.png" alt="product">
                                            </div>
                                            <div class="xc-product-two__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (125)
                                            </div>
                                            <h3 class="xc-product-two__title"><a href="#">Basics High-Speed HDMI Cable 18 Gbps, 4K/6</a></h3>
                                            <h4 class="xc-product-two__price">$360</h4>
                                            <div class="xc-product-two__btn">
                                                <a href="product-details.html"><i class="icon-eye"></i></a>
                                                <a href="cart.html"><i class="icon-grocery-store"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="xc-shop-pagination mt-20">
                                <div class="xc-pagination text-center">
                                    <ul>
                                        <li>
                                            <a href="404-4.html" class="prev page-numbers">
                                                <i class="fa-solid fa-angle-left"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="current" href="404-4.html">1</a>
                                        </li>
                                        <li>
                                            <span>2</span>
                                        </li>
                                        <li>
                                            <a href="404-4.html">3</a>
                                        </li>
                                        <li>
                                            <a href="404-4.html" class="next page-numbers">
                                                <i class="fa-solid fa-angle-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- shop area end -->

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
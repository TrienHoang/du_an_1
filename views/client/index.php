<?php
include "../views/client/layout/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        li{
            list-style: none;
        }
        a{
            text-decoration: none;
        }
        .slider{
            padding: 20px ;
            height: 350px;
            text-align: center;
            margin-top: -20px;
        }
        .slider-content{
            justify-content: space-between;
        }
        .slider-content-top{
            width: 100%;
            height: 300px;
            position: relative;
        }
        .slider-content-bottom{
            width: 690px;
            display: flex;
            justify-content:space-between ;
            border: 2px solid #ddd;
            border-top: none;
            height: 50px;
            margin-left: 72px;
        }
        .slider-content-bottom li{
            width: 20%;
            text-align: center;
            cursor: pointer;
            padding: 10px 0px;
            height: 100%;
            line-height: 20px;
            position: relative;
            
        }
        .slider-content-bottom li::before{
            display: block;
            content: "";
            position: absolute;
            height: 70%;
            width: 1px;
            background-color: #ddd;
            right: 0;
        }
        .slider-content-bottom li.active { 
            border-top: 4px solid rgb(224, 38, 38) ;
        }
        .slider-content-top-btn{
            position: absolute;
            top: 50%;
            display: flex;
            justify-content: space-between;
            width: 81%;
            margin-left: 80px;
        }
        .slider-content-top-btn i {
            color: #333;
            font-size: 25px;
            transform: translateY(-50%);
            border-radius: 5px;
            opacity: 0;
            transition: all 0.3s;
            cursor: pointer;
        }
        .slider-content-top:hover i{
            opacity: 1;
        }
        .xc-sec-heading{
            padding-top: 40px;
        }

    </style>
</head>
<body>
        <div class="xc-body-overlay xc-close-toggler"></div>
        <div class="xc-search-popup">
            <div class="xc-search-popup__wrap">
                <a href="#" class="xc-search-popup__close xc-close-toggler"></a>
                <div class="xc-search-popup__form">
                    <form role="search" method="get" action="#">
                        <input type="search" placeholder="Search Here..." value="" name="s">
                        <button type="submit"><i class="icon-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="xc-mobile-nav__wrapper">
            <div class="xc-mobile-nav__overlay xc-close-toggler"></div>
            <!-- /.mobile-nav__overlay -->
            <div class="xc-mobile-nav__content">
                <a href="#" class="xc-mobile-nav__close xc-search-popup__close xc-close-toggler"></a>
                <div class="logo-box">
                    <a href="index.php?act=index"><img src="../public/client/assets//img/logo/white-logo.png" width="150" alt="" /></a>
                </div>
                <!-- /.logo-box -->
                <div class="xc-mobile-nav__menu"></div>
                <!-- /.mobile-nav__container -->

                <ul class="xc-mobile-nav__contact list-unstyled">
                    <li>
                        <i class="fa fa-envelope"></i>
                        <a href="mailto:needhelp@swiftcart.com">needhelp@corpai.com</a>
                    </li>
                    <li>
                        <i class="fa fa-phone-alt"></i>
                        <a href="tel:666-888-0000">666 888 0000</a>
                    </li>
                </ul><!-- /.mobile-nav__contact -->
                <div class="xc-mobile-nav__top">
                    <div class="xc-mobile-nav__social">
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-facebook-square"></a>
                        <a href="#" class="fab fa-pinterest-p"></a>
                        <a href="#" class="fab fa-instagram"></a>
                    </div><!-- /.mobile-nav__social -->
                </div><!-- /.mobile-nav__top -->
            </div>
            <!-- /.mobile-nav__content -->
        </div>
        <!-- /.mobile-nav__wrapper -->
        <div class="xc-back-to-top-wrapper">
            <button id="xc_back-to-top" type="button" class="xc-back-to-top-btn">
                <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span class="xc-back-to-top-progress"></span>
            </button>
        </div>

        <!-- banner one start -->

        <div class="xc-banner-one pt-20 pb-40">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-xxl-2 d-none d-xl-block">
                        <div class="xc-banner-one__cat">
                            <ul>
                                <li><a href="#">Fashion & Accessories</a></li>
                                <li><a href="#">Sports & Entertainment</a></li>
                                <li><a href="#">Health & Beauty</a></li>
                                <li><a href="#">Digital & Electronics</a></li>
                                <li><a href="#">Tools, Equipment</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-xl-9 col-xxl-9" style="padding-left: 80px;">
                        <div id="carouselExample" class="carousel slide">
                            <div class="carousel-inner">
                            <section class="slider">
                                <div class="container" >
                                    <div class="slider-content">
                                        <div class="slider-content">
                                            <div class="slider-content-top">
                                                <a href="#"><img src="./../public/client/assets//img/banner/0.webp" alt="" id="anh"></a>
                                                <div class="slider-content-top-btn">
                                                    <i class="fa-solid fa-arrow-left" onclick="pre()"></i>
                                                    <i class="fa-solid fa-arrow-right" onclick="next()"></i>
                                                </div>
                                            </div>
                                            <div class="slider-content-bottom">
                                                <li class="active">SAMSUNG A06 </li>
                                                <li>IPHONE 16 SERIES </li>
                                                <li>GALAXY S24 ULTRA </li>
                                                <li>HUAWEI WATCH D2 </li>
                                                <li>MACBOOK PRO 2024 </li>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>

                          </div>

                          
                    </div>
                </div>
            </div>
        </div>


        <!-- product two start -->
        <div class="xc-product-two pb-80">
            <div class="container">
                <div class="xc-sec-heading">
                    <h3 class="xc-sec-heading__title"><span><i class="icon-power"></i></span>Recommended Items</h3>
                </div>
                <div class="row gutter-y-20 row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-5 ">
                    <div class="col">
                        <div class="xc-product-two__item">
                            <span class="xc-product-two__deal d-none">BEST DEALS</span>
                            <div class="xc-product-two__img">
                                <img src="../public/client/assets//img/products/product-2-1.png" alt="product">
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
                    <div class="col">
                        <div class="xc-product-two__item">
                            <span class="xc-product-two__deal">BEST DEALS</span>
                            <div class="xc-product-two__img">
                                <img src="../public/client/assets//img/products/product-2-2.png" alt="product">
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
                    <div class="col">
                        <div class="xc-product-two__item">
                            <span class="xc-product-two__deal">BEST DEALS</span>
                            <div class="xc-product-two__img">
                                <img src="../public/client/assets//img/products/product-2-3.png" alt="product">
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
                    <div class="col">
                        <div class="xc-product-two__item">
                            <span class="xc-product-two__deal d-none">BEST DEALS</span>
                            <div class="xc-product-two__img">
                                <img src="../public/client/assets//img/products/product-2-4.png" alt="product">
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
                    <div class="col">
                        <div class="xc-product-two__item">
                            <span class="xc-product-two__deal d-none">BEST DEALS</span>
                            <div class="xc-product-two__img">
                                <img src="../public/client/assets//img/products/product-2-5.png" alt="product">
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
                    <div class="col">
                        <div class="xc-product-two__item">
                            <span class="xc-product-two__deal d-none">BEST DEALS</span>
                            <div class="xc-product-two__img">
                                <img src="../public/client/assets//img/products/product-2-6.png" alt="product">
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
                    <div class="col">
                        <div class="xc-product-two__item">
                            <span class="xc-product-two__deal">BEST DEALS</span>
                            <div class="xc-product-two__img">
                                <img src="../public/client/assets//img/products/product-2-7.png" alt="product">
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
                    <div class="col">
                        <div class="xc-product-two__item">
                            <span class="xc-product-two__deal d-none">BEST DEALS</span>
                            <div class="xc-product-two__img">
                                <img src="../public/client/assets//img/products/product-2-8.png" alt="product">
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
                    <div class="col">
                        <div class="xc-product-two__item">
                            <span class="xc-product-two__deal">BEST DEALS</span>
                            <div class="xc-product-two__img">
                                <img src="../public/client/assets//img/products/product-2-9.png" alt="product">
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
                    <div class="col">
                        <div class="xc-product-two__item">
                            <span class="xc-product-two__deal d-none">BEST DEALS</span>
                            <div class="xc-product-two__img">
                                <img src="../public/client/assets//img/products/product-2-10.png" alt="product">
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
        </div>
        <!-- product two end -->

        <!-- top sale product start -->
        <div class="xc-product-four pb-80">
            <div class="container">
                <div class="xc-sec-heading xc-has-btn">
                    <h3 class="xc-sec-heading__title"><span><i class="icon-power"></i></span>Top Sale Product</h3>
                    <div class="xc-sec-heading__btn">
                        <a href="shop.html" class="xc-sec-heading-btn">show all</a>
                    </div>
                </div>
                <div class="row gutter-y-60">
                    <!-- <div class="col-xl-3">
                        <div class="xc-banner-four">
                            <div class="xc-banner-four__img">
                                <img src="../public/client/assets//img/banner/banner-4-1.jpg" alt="banner4">
                                <h3 class="xc-banner-four__title">Xiaomi True Wireless Earbuds</h3>
                                <p class="xc-banner-four__info">Escape the noise, It’s time to hear the magic with Xiaomi
                                    Earbuds.</p>
                                <p class="xc-banner-four__price">Only for: <span> $299 USD </span></p>
                                <a href="shop.html" class="swiftcart-btn w-100">Shop now <i class="icon-next"></i></a>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-xl-12">
                        <div class="xc-product-four__wrapper">
                            <div class="row gutter-y-20">
                                <div class="col-md-6 col-lg-4">
                                    <div class="xc-product-list__item xc-product-list__item-two">
                                        <div class="xc-product-list__thumb">
                                            <img src="../public/client/assets//img/products/product-sm-1-1.png" alt="">
                                        </div>
                                        <div class="xc-product-list__content">
                                            <h3 class="xc-product-list__title"><a href="product-details.html">27-inch FHD 1080p
                                                    IPS GamingLED Monitor</a></h3>
                                            <div class="xc-product-list__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (25)
                                            </div>
                                            <span class="xc-product-list__price">$360</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="xc-product-list__item xc-product-list__item-two">
                                        <div class="xc-product-list__thumb">
                                            <img src="../public/client/assets//img/products/product-sm-1-2.png" alt="">
                                        </div>
                                        <div class="xc-product-list__content">
                                            <h3 class="xc-product-list__title"><a href="product-details.html">27-inch FHD 1080p
                                                    IPS GamingLED Monitor</a></h3>
                                            <div class="xc-product-list__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (25)
                                            </div>
                                            <span class="xc-product-list__price">$360</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="xc-product-list__item xc-product-list__item-two">
                                        <div class="xc-product-list__thumb">
                                            <img src="../public/client/assets//img/products/product-sm-1-3.png" alt="">
                                        </div>
                                        <div class="xc-product-list__content">
                                            <h3 class="xc-product-list__title"><a href="product-details.html">27-inch FHD 1080p
                                                    IPS GamingLED Monitor</a></h3>
                                            <div class="xc-product-list__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (25)
                                            </div>
                                            <span class="xc-product-list__price">$360</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="xc-product-list__item xc-product-list__item-two">
                                        <div class="xc-product-list__thumb">
                                            <img src="../public/client/assets//img/products/product-sm-1-4.png" alt="">
                                        </div>
                                        <div class="xc-product-list__content">
                                            <h3 class="xc-product-list__title"><a href="product-details.html">27-inch FHD 1080p
                                                    IPS GamingLED Monitor</a></h3>
                                            <div class="xc-product-list__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (25)
                                            </div>
                                            <span class="xc-product-list__price">$360</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="xc-product-list__item xc-product-list__item-two">
                                        <div class="xc-product-list__thumb">
                                            <img src="../public/client/assets//img/products/product-sm-1-5.png" alt="">
                                        </div>
                                        <div class="xc-product-list__content">
                                            <h3 class="xc-product-list__title"><a href="product-details.html">27-inch FHD 1080p
                                                    IPS GamingLED Monitor</a></h3>
                                            <div class="xc-product-list__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (25)
                                            </div>
                                            <span class="xc-product-list__price">$360</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="xc-product-list__item xc-product-list__item-two">
                                        <div class="xc-product-list__thumb">
                                            <img src="../public/client/assets//img/products/product-sm-1-6.png" alt="">
                                        </div>
                                        <div class="xc-product-list__content">
                                            <h3 class="xc-product-list__title"><a href="product-details.html">27-inch FHD 1080p
                                                    IPS GamingLED Monitor</a></h3>
                                            <div class="xc-product-list__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (25)
                                            </div>
                                            <span class="xc-product-list__price">$360</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="xc-product-list__item xc-product-list__item-two">
                                        <div class="xc-product-list__thumb">
                                            <img src="../public/client/assets//img/products/product-sm-1-7.png" alt="">
                                        </div>
                                        <div class="xc-product-list__content">
                                            <h3 class="xc-product-list__title"><a href="product-details.html">27-inch FHD 1080p
                                                    IPS GamingLED Monitor</a></h3>
                                            <div class="xc-product-list__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (25)
                                            </div>
                                            <span class="xc-product-list__price">$360</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="xc-product-list__item xc-product-list__item-two">
                                        <div class="xc-product-list__thumb">
                                            <img src="../public/client/assets//img/products/product-sm-1-8.png" alt="">
                                        </div>
                                        <div class="xc-product-list__content">
                                            <h3 class="xc-product-list__title"><a href="product-details.html">27-inch FHD 1080p
                                                    IPS GamingLED Monitor</a></h3>
                                            <div class="xc-product-list__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (25)
                                            </div>
                                            <span class="xc-product-list__price">$360</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="xc-product-list__item xc-product-list__item-two">
                                        <div class="xc-product-list__thumb">
                                            <img src="../public/client/assets//img/products/product-sm-1-9.png" alt="">
                                        </div>
                                        <div class="xc-product-list__content">
                                            <h3 class="xc-product-list__title"><a href="product-details.html">27-inch FHD 1080p
                                                    IPS GamingLED Monitor</a></h3>
                                            <div class="xc-product-list__ratting">
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                <i class="icon-star"></i>
                                                (25)
                                            </div>
                                            <span class="xc-product-list__price">$360</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="xc-newsletter-form pt-60 pb-60 xc-has-overlay" data-bg="../public/client/assets//img/bg/newsletter-bg.jpg">
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

        <script>
    var img = [];
var index = 0;

// Load ảnh
function loadanh() {
    for (var i = 0; i < 6; i++) {
        img[i] = new Image();
        img[i].src = "./../public/client/assets//img/banner/" + i + ".webp";
    }
}
loadanh();

// Nút next
function next() {
    index++;
    if (index >= img.length) {
        index = 0;
    }

    var anh = document.getElementById("anh");
    anh.src = img[index].src;  
    updateActiveItem(); 
}

// Nút pre
function pre() {
    index--;
    if (index < 0) {
        index = img.length - 1;  
    }
    var anh = document.getElementById("anh");
    anh.src = img[index].src;
    updateActiveItem();  
}


function updateActiveItem() {
    var items = document.querySelectorAll('.slider-content-bottom li');
    items.forEach(function(item, i) {
        item.classList.remove('active'); 
        if (i === index) {
            item.classList.add('active'); 
        }
    });
}

</script>
</html>
<?php
include "../views/client/layout/footer.php";
?>


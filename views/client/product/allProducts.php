<?php
include "../views/client/layout/header.php";
?>

<div class="row" style="margin-top:20px;">
    <?php foreach($products as $pro): ?>
    <div class="col-12 col-md-4 col-lg-3 mb-4">
        <div class="xc-product-two__item border rounded">
            <span class="xc-product-two__deal d-none">BEST DEALS</span>

            <div class="xc-product-two__img">
                <img src="./images/product/<?php echo $pro['image'] ?>" alt="product" class="img-fluid">
            </div>

            <h5 class="xc-product-two__title">
                <a href="#" style="font-size: 12px;"><?php echo $pro['category_name'] ?></a>
            </h5>

            <h3 class="xc-product-two__title">
                <strong><a href="#"><?php echo $pro['name'] ?></a></strong>
            </h3>

            <div class="xc-product-two__btn">
                <a href="?act=product_detail&slug=<?= $pro['slug'] ?>" class="btn btn-outline-primary">
                    <i class="icon-eye"></i>
                </a>
                <a href="cart.html" class="btn btn-outline-success">
                    <i class="icon-grocery-store"></i> 
                </a>
            </div>
            
            <div>
                <h4 class="xc-product-two__price" style="font-size: 12px; color: gray;">
                    <del><?php echo number_format($pro['sale_price'] * 1000, 0, '.', '.') ?>đ</del>
                </h4>
                <h4 class="xc-product-two__price">
                    <?php echo number_format($pro['price'] * 1000, 0, '.', '.') ?>đ
                </h4>
            </div>

            <div class="xc-product-two__ratting">
                <i class="icon-star"></i>
                <i class="icon-star"></i>
                <i class="icon-star"></i>
                <i class="icon-star"></i>
                <i class="icon-star"></i>
                <span>(0 reviews)</span>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php
include "../views/client/layout/footer.php";
?>

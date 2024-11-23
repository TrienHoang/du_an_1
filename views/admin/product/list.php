<?php
include "../views/admin/layout/header.php";
?>
<!-- Page Body Start-->
<div class="page-body-wrapper">
    <!-- Container-fluid starts-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title d-sm-flex d-block">
                                <h5>Danh sách sản phẩm</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="index.php?act=product-create">Thêm sản phẩm</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package theme-table table-product" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>Ảnh sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Danh mục</th>
                                                <th>Biến thể</th>
                                                <th>Giá hiện tại</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($listProduct as $product) : ?>
                                                <tr>
                                                    <td>
                                                        <div class="table-image">
                                                            <img src="./images/product/<?= $product['product_image'] ?>" class="img-fluid"
                                                                alt="">
                                                        </div>
                                                    </td>

                                                    <td><?= $product['product_name'] ?></td>

                                                    <td><?= $product['category_name'] ?></td>

                                                    <td>
                                                        <?php foreach ($product['variants'] as $variant) : ?>
                                                            <span><?= $variant['product_variant_size'] ?>/<?= $variant['product_variant_color'] ?></span>
                                                              <br>
                                                        <?php endforeach; ?>
                                                    </td>

                                                    <td class="td-price"><?= number_format($product["product_price"] * 1000, 0, ',', '.')  ?>đ</td>

                                                    <td>
                                                        <?= $product['product_status'] == 0 ? "<span class='status-danger'>Ẩn</span>" : "<span class='status-succes'>Hiện</span>" ?>

                                                    </td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="?act=product-detail&id=<?= $product["product_id"] ?>">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="?act=product-edit&id=<?= $product["product_id"] ?>">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <!-- <li>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </li> -->
                                                        </ul>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

    </div>
</div>
</div>
<!-- page-wrapper End-->

<?php
include "../views/admin/layout/footer.php";
?>
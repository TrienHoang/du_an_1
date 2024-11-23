<?php
include "../views/admin/layout/header.php";
?>
<!-- Page Body start -->
<div class="page-body-wrapper">
    <div class="page-body">
        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Xem chi tiết sản phẩm</h5>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Tên sản phẩm</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="product_name" name="product_name"
                                                value="<?= $product['0']["product_name"] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label
                                            class="col-sm-3 col-form-label form-label-title">Danh mục</label>
                                        <div class="col-sm-9">
                                            <select class="form-control w-100" name="category_id" disabled>
                                                <?php foreach ($list_categoris as $category): ?>
                                                    <option value="<?= $category["category_id"] ?>"
                                                        <?= $product[0]['category_id'] == $category['category_id'] ? "selected" : "" ?>><?= $category["name"] ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Giá sản phẩm</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" id="" value="<?= $product['0']["product_price"] ?>" name="product_price" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Giá khuyến mãi</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" id="product_sale_price" name="product_sale_price" value="<?= $product['0']["product_sale_price"] ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Mô tả</label>
                                        <div class="col-sm-9">
                                            <textarea name="description" class="form-control" readonly><?= $product['0']["product_description"] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-3 mb-0">Trạng thái</label>
                                        <div class="col-sm-9">
                                            <select class="form-control " name="status"  disabled>
                                                <option value="1" <?= $product['0']["product_status"] == 1 ? 'selected' : '' ?>>Hiện</option>
                                                <option value="0" <?= $product['0']["product_status"] == 0 ? 'selected' : '' ?>>Ẩn</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Ảnh sản phẩm -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Ảnh sản phẩm</h5>
                                    </div>
                                    <!-- Thêm nhiều ảnh -->
                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Tất cả ảnh</label>
                                        <div class="col-sm-9 text-center mt-3">
                                            <?php foreach ($gallery as $key => $value): ?>
                                                <img src="./images/product_gallery/<?= $value['image'] ?>" width="100px" alt="ảnh sản phẩm <?= $key + 1 ?>">
                                                <input type="text" hidden name="old_gallery_image[]" value="<?= $value["image"] ?>">
                                            <?php endforeach; ?>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-3 col-form-label form-label-title">Chọn ảnh</label>
                                        <div class="col-sm-9 mt-3 text-center">
                                            <img src="./images/product/<?= $product['0']['product_image'] ?>" width="100px" alt="">
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label
                                            class="col-sm-3 col-form-label form-label-title">Đường dẫn</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" id="slug" name="product_slug" value="<?= $product['0']['product_slug'] ?>" readonly>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Các biến thể của sản phẩm</h5>
                                    </div>
                                    <div id="variant">
                                        <?php foreach ($variants as $key => $value): ?>
                                            <div class=" border rounded-3 p-2 mb-2 cow">
                                                <div class=" mb-4">
                                                    <div class="d-flex justify-content-evenly">
                                                        <input type="text" hidden name="product_variant_id[]" value="<?= $value["product_variant_id"] ?>" disabled>
                                                        <div class="mt-3 me-5">
                                                            <h5 class="text-dark fw-medium mb-1">Dung lượng </h5>
                                                            <div class="d-flex flex-wrap gap-2" aria-label="Basic checkbox toggle button group">
                                                                <?php foreach ($list_sizes as $size): ?>
                                                                    <input type="checkbox" class="form-check-input" id="size-<?= $size["variant_size_id"] ?>-<?= $key ?>" value="<?= $size["variant_size_id"] ?>" <?= $value['variant_size_id'] == $size["variant_size_id"] ? "checked" : "" ?>
                                                                        name="variant_size[]" disabled>
                                                                    <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-<?= $size["variant_size_id"] ?>-<?= $key ?>"><?= $size["size_name"] ?></label>
                                                                <?php endforeach ?>
                                                                <?php if (isset($errors['variant_size'])) : ?>
                                                                    <p class="text-danger"><?= $errors['variant_size'] ?></p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 me-5">
                                                            <h5 class="text-dark fw-medium mb-1 ">Màu :</h5>

                                                            <div class="d-flex flex-wrap gap-2" aria-label="Basic checkbox toggle button group">
                                                                <?php foreach ($list_color as $color): ?>
                                                                    <input type="checkbox" disabled class="form-check-input" id="color-<?= $color["variant_color_id"] ?>-<?= $key ?>" value="<?= $color["variant_color_id"] ?>" <?= $value['variant_color_id'] == $color["variant_color_id"] ? "checked" : "" ?>
                                                                        name="variant_color[]">
                                                                    <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-<?= $color["variant_color_id"] ?>-<?= $key ?>"><span class="rounded p-2" style="background-color: <?= $color["color_code"] ?>;"></span></label>
                                                                <?php endforeach ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-header-2">
                                                    <h5>Giá sản phẩm</h5>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 form-label-title">Giá biến thể</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" name="variant_price[]" value="<?= $variants[$key]["product_price"] ?>" readonly>
                                                        <?php if (isset($errors['variant_price'])): ?>
                                                            <?php foreach ($errors['variant_price'] as $variant_price) :  ?>
                                                                <p class="text-danger"><?= $variant_price ?></p>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 form-label-title">Giá khuyễn mãi biến thể</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" readonly name="variant_sale_price[]" value="<?= $variants[$key]["product_sale_price"] ?>">
                                                    </div>
                                                </div>
                                                <div class="mb-1 row align-items-center">
                                                    <label class="col-sm-3 form-label-title">Số lượng</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" name="variant_quantity[]" value="<?= $variants[$key]["product_quantity"] ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="?act=product" class="btn btn-danger ">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->

    </div>
    <!-- Container-fluid End -->
</div>
<!-- Page Body End -->
<!-- <script>
    document.getElementById("add_variant").addEventListener("click", () => {
        // console.log("Click");
        const container = document.getElementById("variant");
        // console.log(createVariant);
        const newVariant = document.createElement("div");
        newVariant.innerHTML = `
        
        <div class=" border rounded-3 p-2 mb-2 cow">
                                                <div class=" mb-4">
                                                    <div class="d-flex justify-content-evenly">
                                                        <div class="mt-3 me-5">
                                                            <h5 class="text-dark fw-medium mb-1">Dung lượng </h5>
                                                            <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                                            <?php foreach ($list_sizes as $size): ?>
                                                                <input type="checkbox" class="form-check-input" id="size-<?= $size["variant_size_id"] ?>-${container.children.length}  value="<?= $size["variant_size_id"] ?>" name="variant_size[]">
                                                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-<?= $size["variant_size_id"] ?>-${container.children.length}"><?= $size["size_name"] ?></label>
                                                            <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 me-5">
                                                            <h5 class="text-dark fw-medium mb-1">Màu :</h5>
                                                            <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                                            <?php foreach ($list_color as $color): ?>
                                                                <input type="checkbox" class="form-check-input" id="color-<?= $color["variant_color_id"] ?>-${container.children.length}" value="<?= $color["variant_color_id"]  ?>">
                                                                <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-<?= $color["variant_color_id"] ?>-${container.children.length}" ><span class="rounded-circle p-2" style="background-color: <?= $color["color_code"] ?>;"></span></label>
                                                            <?php endforeach; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-header-2">
                                                    <h5>Giá sản phẩm</h5>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 form-label-title">Giá biến thể</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" name="variant_price[]" placeholder="0">
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 form-label-title">Giá khuyễn mãi biến thể</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" placeholder="0" name="variant_sale_price[]">
                                                    </div>
                                                </div>
                                                <div class="mb-1 row align-items-center">
                                                    <label class="col-sm-3 form-label-title">Số lượng</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" placeholder="0" name="variant_quantity[]">
                                                    </div>
                                                </div>
                                            </div>
        `;
        container.appendChild(newVariant);
    })
</script> -->
<?php
include "../views/admin/layout/footer.php";
?>
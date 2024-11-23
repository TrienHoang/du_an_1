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
                        <form action="?act=product-edit&id=<?= $product[0]['product_id'] ?>" method="post" class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
                            <div class="col-sm-8 m-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-2">
                                            <h5>Chỉnh sửa sản phẩm</h5>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Tên sản phẩm</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" onkeyup="ChangeToSlug();" id="product_name" name="product_name"
                                                    value="<?= $product['0']["product_name"] ?>">
                                                <input type="text" hidden name="product_id" value="<?= $product[0]['product_id'] ?>">
                                                <?php if (isset($errors['product_name'])) : ?>
                                                    <p class="text-danger"><?= $errors['product_name'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label
                                                class="col-sm-3 col-form-label form-label-title">Danh mục</label>
                                            <div class="col-sm-9">
                                                <select class="form-control w-100" name="category_id">
                                                    <?php foreach ($list_categoris as $category): ?>
                                                        <option value="<?= $category["category_id"] ?>"
                                                            <?= $product[0]['category_id'] == $category['category_id'] ? "selected" : "" ?>><?= $category["name"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <?php if (isset($errors['category_id'])) : ?>
                                                    <p class="text-danger"><?= $errors['category_id'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Giá sản phẩm</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" id="" value="<?= $product['0']["product_price"] ?>" name="product_price"
                                                    placeholder="Nhập giá...">
                                                <?php if (isset($errors['product_price'])) : ?>
                                                    <p class="text-danger"><?= $errors['product_price'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Giá khuyến mãi</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" id="product_sale_price" name="product_sale_price" value="<?= $product['0']["product_sale_price"] ?>"
                                                    placeholder="Nhập giá khuyến mãi...">
                                                <?php if (isset($errors['product_sale_price'])) : ?>
                                                    <p class="text-danger"><?= $errors['product_sale_price'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Mô tả</label>
                                            <div class="col-sm-9">
                                                <textarea name="description" class="form-control"><?= $product['0']["product_description"] ?></textarea>
                                                <?php if (isset($errors['description'])) : ?>
                                                    <p class="text-danger"><?= $errors['description'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Trạng thái</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="status">
                                                    <option value="1" <?= $product['0']["product_status"] == 1 ? 'selected' : '' ?>>Hiện</option>
                                                    <option value="0" <?= $product['0']["product_status"] == 0 ? 'selected' : '' ?>>Ẩn</option>
                                                </select>
                                                <?php if (isset($errors['status'])) : ?>
                                                    <span class="text-danger"><?= $errors['status'] ?></span>
                                                <?php endif; ?>
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

                                            <label
                                                class="col-sm-3 col-form-label form-label-title">Chọn nhiều ảnh</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file"
                                                    id="formFile" name="gallery_image[]" multiple>
                                                <?php if (isset($errors['gallery_image'])) : ?>
                                                    <p class="text-danger"><?= $errors['gallery_image'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-9 text-center mt-3">
                                                <?php foreach ($gallery as $key => $value): ?>
                                                    <img src="./images/product_gallery/<?= $value['image'] ?>" width="100px" alt="ảnh sản phẩm <?= $key + 1 ?>">
                                                    <a href="?act=gallery-delete&gallery_id=<?= $value["product_gallery_id"] ?>" class="remove_gallery"><i class="ri-close-circle-line" style="font-size: 20px; "></i></a>
                                                    <input type="text" hidden name="old_gallery_image[]" value="<?= $value["image"] ?>">
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label
                                                class="col-sm-3 col-form-label form-label-title">Chọn ảnh</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file"
                                                    id="formFile" name="product_image" value="<?= $product['0']['product_name'] ?>">
                                                <input type="text" hidden name="old_product_image" value="<?= $product['0']["product_image"] ?>">
                                                <?php if (isset($errors['product_image'])) : ?>
                                                    <span class="text-danger"><?= $errors['product_image'] ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="col-sm-9 mt-3 text-center">
                                                <img src="./images/product/<?= $product['0']['product_image'] ?>" width="100px" alt="">
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label
                                                class="col-sm-3 col-form-label form-label-title">Đường dẫn</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="slug" name="product_slug" value="<?= $product['0']['product_slug'] ?>" multiple>
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
                                                    <a href="?act=variant-delete&variant_id=<?= $value["product_variant_id"] ?>" class="d-flex justify-content-end me-2"><i class="ri-close-line" style="font-size: 20px;"></i></a>
                                                    <div class=" mb-4">
                                                        <div class="d-flex justify-content-evenly">
                                                            <input type="text" hidden name="product_variant_id[]" value="<?= $value["product_variant_id"] ?>">
                                                            <div class="mt-3 me-5">
                                                                <h5 class="text-dark fw-medium mb-1">Dung lượng </h5>
                                                                <div class="d-flex flex-wrap gap-2" aria-label="Basic checkbox toggle button group">
                                                                    <?php foreach ($list_sizes as $size): ?>
                                                                        <input type="checkbox" class="form-check-input" id="size-<?= $size["variant_size_id"] ?>-<?= $key ?>" value="<?= $size["variant_size_id"] ?>" <?= $value['variant_size_id'] == $size["variant_size_id"] ? "checked" : "" ?>
                                                                            name="variant_size[]">
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
                                                                        <input type="checkbox" class="form-check-input" id="color-<?= $color["variant_color_id"] ?>-<?= $key ?>" value="<?= $color["variant_color_id"] ?>" <?= $value['variant_color_id'] == $color["variant_color_id"] ? "checked" : "" ?>
                                                                            name="variant_color[]">
                                                                        <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-<?= $color["variant_color_id"] ?>-<?= $key ?>"><span class="rounded p-2" style="background-color: <?= $color["color_code"] ?>;"></span></label>
                                                                    <?php endforeach ?>
                                                                    <?php if (isset($errors['variant_color'])) : ?>
                                                                        <p class="text-danger"><?= $errors['variant_color'] ?></p>
                                                                    <?php endif; ?>
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
                                                            <input class="form-control" type="number" name="variant_price[]" value="<?= $variants[$key]["product_price"] ?>">
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
                                                            <input class="form-control" type="number" name="variant_sale_price[]" value="<?= $variants[$key]["product_sale_price"] ?>">
                                                            <?php if (isset($errors['variant_sale_price'])): ?>
                                                                <?php foreach ($errors['variant_sale_price'] as $variant_sale_price) :  ?>
                                                                    <p class="text-danger"><?= $variant_sale_price ?></p>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-1 row align-items-center">
                                                        <label class="col-sm-3 form-label-title">Số lượng</label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control" type="number" name="variant_quantity[]" value="<?= $variants[$key]["product_quantity"] ?>">
                                                            <?php if (isset($errors['variant_quantity'])): ?>
                                                                <?php foreach ($errors['variant_quantity'] as $variant_quantity) :  ?>
                                                                    <p class="text-danger"><?= $variant_quantity ?></p>
                                                                <?php endforeach; ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <button type='button' class="btn btn-primary mt-4" id="add_variant">Thêm biến thể</button>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-danger ps-5 pe-5 me-3" type="submit" name="updateProduct">Chỉnh sửa sản phẩm</button>
                                    <a href="?act=product" class="btn btn-danger ">Quay lại</a>
                                </div>
                        </form>
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
<script>
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
</script>
<?php
include "../views/admin/layout/footer.php";
?>
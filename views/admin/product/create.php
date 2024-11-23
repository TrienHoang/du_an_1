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
                        <form action="?act=product-create" method="post" class="theme-form theme-form-2 mega-form" enctype="multipart/form-data">
                            <div class="col-sm-8 m-auto">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-header-2">
                                            <h5>Thêm mới sản phẩm</h5>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Tên sản phẩm</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" onkeyup="ChangeToSlug();" id="product_name" name="product_name"
                                                    placeholder="Nhập tên...">
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
                                                    <option selected>-- Lựa chọn --</option>
                                                    <?php foreach ($list_categoris as $category): ?>
                                                        <option value="<?= $category["category_id"] ?>"><?= $category["name"] ?></option>
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
                                                <input class="form-control" type="number" id="" name="product_price"
                                                    placeholder="Nhập giá...">
                                                <?php if (isset($errors['product_price'])) : ?>
                                                    <p class="text-danger"><?= $errors['product_price'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Giá khuyến mãi</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" id="product_sale_price" name="product_sale_price"
                                                    placeholder="Nhập giá khuyến mãi...">
                                                <?php if (isset($errors['product_sale_price'])) : ?>
                                                    <p class="text-danger"><?= $errors['product_sale_price'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Mô tả</label>
                                            <div class="col-sm-9">
                                                <textarea name="description" class="form-control"></textarea>
                                                <?php if (isset($errors['description'])) : ?>
                                                    <p class="text-danger"><?= $errors['description'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Trạng thái</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="status">
                                                    <option value="1">Hiện</option>
                                                    <option value="0">Ẩn</option>
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
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label
                                                class="col-sm-3 col-form-label form-label-title">Chọn ảnh</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="file"
                                                    id="formFile" name="product_image">
                                                <?php if (isset($errors['product_image'])) : ?>
                                                    <span class="text-danger"><?= $errors['product_image'] ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label
                                                class="col-sm-3 col-form-label form-label-title">Đường dẫn</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" id="slug" name="product_slug" multiple>
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
                                            <div class=" border rounded-3 p-2 mb-2 cow">
                                                <div class=" mb-4">
                                                    <div class="d-flex justify-content-evenly">
                                                        <div class="mt-3 me-5">
                                                            <h5 class="text-dark fw-medium mb-1">Dung lượng </h5>
                                                            <div class="d-flex flex-wrap gap-2">
                                                                <?php foreach ($list_sizes as $size): ?>
                                                                    <input type="checkbox" class="form-check-input" id="size-<?= $size["variant_size_id"] ?>" value="<?= $size["variant_size_id"] ?>" name="variant_size[]">
                                                                    <label class="btn btn-light  rounded d-flex justify-content-center align-items-center" for="size-<?= $size["variant_size_id"] ?>"><?= $size["size_name"] ?></label>
                                                                <?php endforeach ?>
                                                                <?php if (isset($errors['variant_size'])) : ?>
                                                                    <p class="text-danger"><?= $errors['variant_size'] ?></p>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="mt-3 me-5">
                                                            <h5 class="text-dark fw-medium mb-1 ">Màu :</h5>

                                                            <div class="d-flex flex-wrap gap-2">
                                                                <?php foreach ($list_color as $color): ?>
                                                                    <input type="checkbox" class="  " id="color-<?= $color["variant_color_id"] ?>" value="<?= $color["variant_color_id"] ?>" name="variant_color[]">
                                                                    <label class="btn btn-light  rounded d-flex justify-content-center align-items-center" for="color-<?= $color["variant_color_id"] ?>"><span class="rounded p-2" style="background-color: <?= $color["color_code"] ?>;"></span></label>
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
                                                        <input class="form-control" type="number" name="variant_price[]">
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
                                                        <input class="form-control" type="number" name="variant_sale_price[]">
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
                                                        <input class="form-control" type="number" name="variant_quantity[]">
                                                        <?php if (isset($errors['variant_quantity'])): ?>
                                                            <?php foreach ($errors['variant_quantity'] as $variant_quantity) :  ?>
                                                                <p class="text-danger"><?= $variant_quantity ?></p>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary mt-4" id="add_variant">Thêm biến thể</button>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-danger ps-5 pe-5 me-3" type="submit" name="createProduct">Tạo mới sản phẩm</button>
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
        const container = document.getElementById("variant");
        const newVariant = document.createElement("div");
        newVariant.innerHTML = `
            <div class="border rounded-3 p-2 mb-2 cow">
                <div class="mb-4">
                    <div class="d-flex justify-content-evenly">
                        <div class="mt-3 me-5">
                            <h5 class="text-dark fw-medium mb-1">Dung lượng </h5>
                            <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                <?php foreach ($list_sizes as $size): ?>
                                    <input type="checkbox" class="form-check-input" id="size-<?= $size["variant_size_id"] ?>-${container.children.length}" value="<?= $size["variant_size_id"] ?>" name="variant_size[]">
                                    <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="size-<?= $size["variant_size_id"] ?>-${container.children.length}"><?= $size["size_name"] ?></label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="mt-3 me-5">
                            <h5 class="text-dark fw-medium mb-1">Màu :</h5>
                            <div class="d-flex flex-wrap gap-2" role="group" aria-label="Basic checkbox toggle button group">
                                <?php foreach ($list_color as $color): ?>
                                    <input type="checkbox" class="form-check-input" id="color-<?= $color["variant_color_id"] ?>-${container.children.length}" value="<?= $color["variant_color_id"] ?>" name="variant_color[]">
                                    <label class="btn btn-light avatar-sm rounded d-flex justify-content-center align-items-center" for="color-<?= $color["variant_color_id"] ?>-${container.children.length}"><span class="rounded-circle p-2" style="background-color: <?= $color["color_code"] ?>;"></span></label>
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
        // attachCheckboxHandlers(); // Gắn lại sự kiện cho các checkbox mới
    });

    // const maxCheckboxes = 1; // Số lượng checkbox tối đa được chọn 

    // function attachCheckboxHandlers() {
    //     const checkboxes1 = document.querySelectorAll('input[name="variant_size[]"]');
    //     const checkboxes2 = document.querySelectorAll('input[name="variant_color[]"]');

    //     checkboxes1.forEach((checkbox) => {
    //         checkbox.addEventListener('change', () => {
    //             const checkedCheckboxes = document.querySelectorAll('input[name="variant_size[]"]:checked').length;
    //             if (checkedCheckboxes > maxCheckboxes) {
    //                 checkbox.checked = false;
    //                 alert(`Bạn chỉ được chọn tối đa ${maxCheckboxes} lựa chọn.`);
    //             }
    //         });
    //     });

    //     checkboxes2.forEach((checkbox) => {
    //         checkbox.addEventListener('change', () => {
    //             const checkedCheckboxes = document.querySelectorAll('input[name="variant_color[]"]:checked').length;
    //             if (checkedCheckboxes > maxCheckboxes) {
    //                 checkbox.checked = false;
    //                 alert(`Bạn chỉ được chọn tối đa ${maxCheckboxes} lựa chọn.`);
    //             }
    //         });
    //     });
    // }

    // // Gắn sự kiện ban đầu cho các checkbox
    // attachCheckboxHandlers();
</script>

<?php
include "../views/admin/layout/footer.php";
?>
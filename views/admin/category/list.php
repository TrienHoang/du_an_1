<?php
include "../views/admin/layout/header.php";
?>
<div class="page-body-wrapper">
    <div class="page-body">
        <!-- All User Table Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title">
                                <h5>Danh sách danh mục</h5>
                                <form class="d-inline-flex">
                                    <a href="index.php?act=category-create"
                                        class="align-items-center btn btn-theme d-flex">
                                        <i data-feather="plus-square"></i>Thêm danh mục
                                    </a>
                                </form>
                            </div>

                            <div class="table-responsive category-table">
                                <div>
                                    <table class="table all-package theme-table" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>Tên danh mục</th>
                                                <th>ID</th>
                                                <th>Ảnh</th>
                                                <th>Trạng thái</th>
                                                <th>Hành động </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php foreach ($listCategories as $cate) : ?>

                                            <tr>

                                                <td> <?= $cate['name'] ?></td>

                                                <td><?= $cate['category_id'] ?></td>

                                                <td>
                                                    <div class="table-image">
                                                        <img src="images/category/<?= $cate['image']; ?>"
                                                            alt="Category Image" style="width: 80px; ">
                                                    </div>
                                                </td>

                                                <td><?= $cate['status'] ?></td>

                                                <td>
                                                    <ul>
                                                        <li>
                                                            <a
                                                                href="index.php?act=category-detail&id=<?= $cate['category_id'] ?>">
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a
                                                                href="index.php?act=category-edit&id=<?= $cate['category_id'] ?>">
                                                                <i class="ri-pencil-line"></i>
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a onclick="return confirm('ban co chac chan muon xoa')"
                                                                href="index.php?act=category-delete&id=<?= $cate['category_id'] ?>">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </a>
                                                        </li>
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
                <!-- All User Table Ends-->
            </div>
        </div>
        <?php
        include "../views/admin/layout/footer.php";
        ?>

    </div>
</div>
<!-- All User Table Ends-->
</div>
</div>
<?php
include "../views/admin/layout/footer.php";
?>
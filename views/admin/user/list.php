<?php
include "../views/admin/layout/header.php";
?>

<div class="page-body">
    <!-- All User Table Start -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>Danh sách người dùng</h5>
                            <form class="d-inline-flex">
                                <a href="index.php?act=user-create" class="align-items-center btn btn-theme d-flex">
                                    <i data-feather="plus"></i>Thêm người dùng
                                </a>
                            </form>
                        </div>

                        <div class="table-responsive table-product">
                            <table class="table all-package theme-table" id="table_id">
                                <thead>
                                    <tr>
                                        <th>Ảnh</th>
                                        <th>Tên người dùng</th>
                                        <th>Số điện thoại</th>
                                        <th>Vai trò</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($listUsers as $user): ?>
                                        <tr>
                                            <td>
                                            <div class="table-image">
                                                        <img src="images/user/<?= $user['avatar']; ?>"
                                                            alt="User Avatar" style="width: 80px; ">
                                                    </div>
                                            </td>

                                            <td>
                                                <div class="user-name">
                                                    <span><?= $user['name'] ?></span>
                                                </div>
                                            </td>
                                            <td><?= $user['phone'] ?></td>

                                            <td><?= $user['role_id'] ==1 ? "Admin": "Customer" ?></td>
                                            <td><?= $user['active'] == 1 ? "Hoạt động" : "Không hoạt động" ?></td>

                                            <td>
                                                <ul>
                                                    <li>
                                                        <a href="index.php?act=user-detail&id=<?=$user["user_id"]?>">
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                    </li>

                                                    <li>
                                                        <a href="index.php?act=user-edit&id=<?=$user["user_id"]?>">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <!-- <tr>
                                                    <td>
                                                        <div class="table-image">
                                                            <img src="assets/images/users/2.jpg" class="img-fluid"
                                                                alt="">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="user-name">
                                                            <span>Caroline L. Harris</span>
                                                            <span>Davis Lane</span>
                                                        </div>
                                                    </td>

                                                    <td>+ 720 - 276 - 9403</td>

                                                    <td>CarolineLHarris@rhyta.com</td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="order-detail.html">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javascript:void(0)">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>
                                                        <div class="table-image">
                                                            <img src="assets/images/users/3.jpg" class="img-fluid"
                                                                alt="">
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="user-name">
                                                            <span>Lucy j. Morile</span>
                                                            <span>Clifton</span>
                                                        </div>
                                                    </td>

                                                    <td>+ 351 - 756 - 6549</td>

                                                    <td>LucyMorile456@gmail.com</td>

                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a href="order-detail.html">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javascript:void(0)">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModalToggle">
                                                                    <i class="ri-delete-bin-line"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr> -->

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All User Table Ends-->
</div>

<?php
include "../views/admin/layout/footer.php";
?>
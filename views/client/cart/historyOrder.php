<?php
include "../views/client/layout/header.php";
?>
<div class="conainer">
    <div class="col-8 m-4 ">
        <h4 class="m-4">Lịch sử mua hàng</h4>
        <div class="table d-flex justify-content-center">
        <table class="table border-4 ">
            <thead>
                <tr>
                    <th scope="col">Ảnh sản phẩm</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Loại sản phẩm</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($historyOrder as $order): ?>
                <tr>
                    <th>
                        <img src="./images/product/<?=$order['order_product_image'] ?>" width="100px" alt="">
                    </th>
                    <td><?= $order['order_product_name'] ?></td>
                    <td>
                    <?= $order['order_product_color'] ?> / <?= $order['order_product_size'] ?>
                    </td>
                    <td><?= $order['order_product_quantity'] ?></td>
                    <td>
                        <?php if($order['order_status'] == 'pending') :?>
                            <span class="text-primary">Chờ xử lý</span>
                        <?php elseif($order['order_status'] == 'confirmed'): ?>
                            <span class="text-primary">Đã xác nhận</span>
                        <?php elseif($order['order_status'] == 'shiping'): ?>
                            <span class="text-primary">Đang giào hàng</span>
                        <?php else: ?>
                            <span class="text-primary">Giao hành thành công</span>
                        <?php endif ?>
                    </td>
                    <td><?= number_format($order['order_total'] * 1000, 0, '.', '.') ?>đ</td>
                    <td><?= $order['order_create_at'] ?></td>

                    <td>
                        <button class="btn btn-danger" <?=($order['order_status'] == 'pending' || $order['order_status'] == 'confirmed') ?'disable': "" ?>>Hủy hơn hàng</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div></div>
<?php
include "../views/client/layout/footer.php";
?>
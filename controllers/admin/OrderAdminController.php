<?php
require_once "../models/order.php";

class OrderAdminController extends Order
{

    public function list()
    {
        $listOrder = $this->allOrderDetail();
        include "../views/admin/order/list.php";
    }
    
    public function edit()
    {
        $getOrderDetail = $this->getOrderDetailById();
        $getOrder = $this->getOrderById();
        $getCoupon = $this->getCouponById();
        $getShip = $this->getShipById();
        $handleCoupon = $this->handleCoupon($getCoupon, $getOrderDetail['amount']);
        // echo '<pre>';
        // var_dump($getOrder);
        // echo '</pre>';

        include "../views/admin/order/edit.php";
    }

    public function handleCoupon($coupon, $total)
    {
        if ($coupon['coupon_type'] == 'percentage') {
            $totalCoupon = ($total * ($coupon['coupon_value'] / 100));
        } elseif ($coupon['coupon_type'] == 'fixed amount') {
            $totalCoupon = $coupon['coupon_value'];
        }

        return $totalCoupon ?? 0;
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['updateOrder'])) {
            $updateOrder = $this->updatedOrder($_POST['status']);
            if ($updateOrder) {
                $_SESSION['success'] = "Cập nhật đơn hàng thành công";
                header('location:?act=order-list');
                exit;
            }
            $_SESSION['error'] = "Cập nhật đơn hàng thất bại. Hãy thử lại";
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public function delete()
    {
        try {
            $this->detelteOrder();
            $_SESSION['success'] = 'Xoa đơn hàng thành công';
            header('Location: index.php?act=order-list');
            exit();
        } catch (\Throwable $th) {
            $_SESSION['error'] = 'Xoa đơn hàng that bai';
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}

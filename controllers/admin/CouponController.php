<?php
require_once "../models/coupon.php";

class CouponController extends Coupon
{
    public function index()
    {
        $listCoupons = $this->listCaupon();

        include "../views/admin/coupon/list.php";
    }

    public function create()
    {
        if (isset($_SERVER['REQUEST_METHOD']) == 'PORT' && isset($_POST['createCoupon'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên danh mục';
            }
            if (empty($_POST['coupon_code'])) {
                $errors['coupon_code'] = 'Vui lòng nhập coupon_code';
            }
            if (empty($_POST['coupon_value'])) {
                $errors['coupon_value'] = 'Vui lòng nhập giá trị giảm';
            }
            if (!isset($_POST['coupon_type'])) {
                $errors['coupon_type'] = 'Vui lòng chọn loại giảm giá';
            }
            if (empty($_POST['quantity'])) {
                $errors['quantity'] = 'Vui lòng nhập số lượng mã ';
            } elseif ($_POST['quantity'] <= 0) {
                $errors['quantity'] = 'Số lượng mã lớn hơn 1';
            }
            if (!isset($_POST['status'])) {
                $errors['status'] = 'Vui lòng chọn trạng thái';
            }
            if (empty($_POST['start_date']) && $_POST['start_date'] < date('Y-m-d')) {
                $errors['start_date'] = 'Vui lòng chọn ngày bắt đầu và ngày bắt đầu phải lớn hơn hoặc bằng hiện tại';
            }
            if (empty($_POST['end_date'])) {
                $errors['end_date'] = 'Vui lòng chọn ngày kết thúc và ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu';
            }

            if (empty($errors)) {
                $coupon = $this->addCoupon($_POST['name'], $_POST['coupon_type'], $_POST['coupon_value'], $_POST['coupon_code'], $_POST['start_date'], $_POST['end_date'], $_POST['quantity'], $_POST['status']);
                if ($coupon) {
                    $_SESSION['success'] = 'Thêm mới giảm giá thành công';
                    header('location: ?act=coupon');
                    exit();
                } else {
                    $_SESSION['error'] = 'Thêm mới giảm giá thất bại';
                    header('location:' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }
        include "../views/admin/coupon/create.php";
    }

    public function update()
    {

        $coupon = $this->getCoupon($_GET["coupon_id"]);
        if (isset($_SERVER['REQUEST_METHOD']) == 'PORT' && isset($_POST['updateCoupon'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên danh mục';
            }
            if (empty($_POST['coupon_code'])) {
                $errors['coupon_code'] = 'Vui lòng nhập coupon_code';
            }
            if (empty($_POST['coupon_value'])) {
                $errors['coupon_value'] = 'Vui lòng nhập giá trị giảm';
            }
            if (!isset($_POST['coupon_type'])) {
                $errors['coupon_type'] = 'Vui lòng chọn loại giảm giá';
            }
            if (empty($_POST['quantity'])) {
                $errors['quantity'] = 'Vui lòng nhập số lượng mã ';
            } elseif ($_POST['quantity'] <= 0) {
                $errors['quantity'] = 'Số lượng mã lớn hơn 1';
            }
            if (!isset($_POST['status'])) {
                $errors['status'] = 'Vui lòng chọn trạng thái';
            }
            // Kiểm tra ngày bắt đầu
            if (empty($_POST['start_date'])) {
                $errors['start_date'] = 'Vui lòng chọn ngày bắt đầu';
            } elseif ($_POST['start_date'] < date('Y-m-d')) {
                $errors['start_date'] = 'Ngày bắt đầu phải lớn hơn hoặc bằng hiện tại';
            } // Kiểm tra ngày kết thúc 
            if (empty($_POST['end_date'])) {
                $errors['end_date'] = 'Vui lòng chọn ngày kết thúc';
            } elseif ($_POST["end_date"] <= $_POST["start_date"]) {
                $errors['end_date'] = 'Ngày kết thúc phải lớn hơn hoặc bằng ngày bắt đầu';
            }

            if (empty($errors)) {
                $updateCoupon = $this->updateCoupon($_POST['name'], $_POST['coupon_type'], $_POST['coupon_value'], $_POST['coupon_code'], $_POST['start_date'], $_POST['end_date'], $_POST['quantity'], $_POST['status'], $_GET["coupon_id"]);
                if ($updateCoupon) {
                    $_SESSION['success'] = 'Chỉnh sửa giảm giá thành công';
                    header('location: ?act=coupon');
                    exit();
                } else {
                    $_SESSION['error'] = 'Chỉnh sửa giảm giá thất bại';
                    header('location:' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }
        include "../views/admin/coupon/edit.php";
    }
    public function detail()
    {
        $coupon = $this->getCoupon($_GET["coupon_id"]);
        include "../views/admin/coupon/detail.php";
    }
    public function delete()
    {
        if (isset($_GET["coupon_id"])) {
            try {
                $this->deleteCoupon($_GET["coupon_id"]);
                $_SESSION['success'] = 'Xóa mã giảm giá thành công';
                header('location: ?act=coupon');
                exit();
            } catch (\Throwable $th) {
                $_SESSION['error'] = 'Xóa mã giảm giá thất bại thất bại';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }
}

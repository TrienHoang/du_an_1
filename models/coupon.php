<?php

require_once "../connect/connect.php";

class Coupon extends connect
{
    public function listCaupon()
    {
        $sql = "SELECT * from coupons";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addCoupon($name, $coupon_type, $coupon_value, $coupon_code, $start_date, $end_date, $quantity, $status)
    {
        $sql = " INSERT INTO coupons(name,coupon_type,coupon_value,coupon_code,start_date,end_date,quantity,status,created_at,updated_at) VALUES(?,?,?,?,?,?,?,?,now(),now())";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $coupon_type, $coupon_value, $coupon_code, $start_date, $end_date, $quantity, $status]);
    }

    public function getCoupon($coupon_id)
    {
        $sql = "SELECT * FROM coupons WHERE coupon_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$coupon_id]); // Truyền giá trị dưới dạng mảng
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateCoupon($name, $coupon_type, $coupon_value, $coupon_code, $start_date, $end_date, $quantity, $status)
    {
        $sql = "UPDATE coupons set name = ? ,coupon_type = ?,coupon_value = ? ,coupon_code = ? ,start_date = ? ,end_date = ? ,quantity = ? ,status = ? ,updated_at = now() where coupon_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $coupon_type, $coupon_value, $coupon_code, $start_date, $end_date, $quantity, $status, $_GET['coupon_id']]);
    }

    public function deleteCoupon()
    {
        $sql = "DELETE from coupons where coupon_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['coupon_id']]);
    }
};

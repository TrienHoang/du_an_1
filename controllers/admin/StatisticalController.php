<?php
require_once "../models/statistical.php";


class StatisticalController  extends Statistical {
    public function show (){
        $getCountUser = $this->getCountUser();
        $getCountProduct = $this->getCountProduct();
        $getCountOrder = $this->getCountOrder();
        $getRevenue = $this->getRevenue();
// var_dump($getCountUser);
        include "../views/admin/index.php";
    }
}
?>
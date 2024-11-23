<?php
require_once('../models/product.php');
class ProductAdminController extends Product
{
    public function index()
    {
        $listProduct = $this->listProduct();

        include "../views/admin/product/list.php";
    }


    public function create()
    {
        $list_color = $this->getAllColor();
        $list_sizes = $this->getAllSize();
        $list_categoris = $this->getAllCategory();

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["createProduct"])) {
            $errors = [];

            if (empty($_POST['product_name'])) {
                $errors["product_name"] = "Vui lòng nhập tên";
            } else if (strlen(trim($_POST["product_name"])) < 3) { // Kiểm tra độ dài tên
                $errors["product_name"] = "Tên phải có ít nhất 3 ký tự";
            }

            if (empty($_POST['category_id'])) {
                $errors["category_id"] = "Vui lòng chọn danh mục";
            }


            if (empty(trim($_POST['description']))) {
                $errors["description"] = "Vui lòng nhập mô tả";
            }
            // Ảnh sản phẩm
            // if (!isset($_FILES['gallery_image']) || $_FILES['gallery_image']['error'] !== UPLOAD_ERR_OK) {
            //     $errors['gallery_image'] = "Chọn ít nhất một hình ảnh ";
            // }
            if (!isset($_FILES['product_image']) || $_FILES['product_image']['error'] !== UPLOAD_ERR_OK) {
                $errors['product_image'] = "Ảnh sản phẩm không được bỏ trống!";
            }

            if (empty($_POST['product_price'])) {
                $errors["product_price"] = "Vui lòng nhập giá sản phẩm";
            } elseif ($_POST['product_price'] < 0) {
                $errors["product_price"] = "Giá sản phẩm không âm";
            }
            if (empty($_POST['product_sale_price'])) {
                $errors["product_sale_price"] = "Vui lòng nhập giá sản phẩm khuyến mãi";
            } elseif ($_POST['product_sale_price'] < 0) {
                $errors["product_sale_price"] = "Giá sản phẩm khuyến mãi không âm";
            }

            if (empty($_POST['variant_size'])) {
                $errors["variant_size"] = "Vui lòng chọn dung lượng";
            }

            if (empty($_POST['variant_color'])) {
                $errors["variant_color"] = "Vui lòng chọn màu";
            }

            foreach ($_POST["variant_price"] as $key => $variant_price) {
                if (!$variant_price) {
                    $errors["variant_price"][$key] = "Vui lòng nhập giá biến thể" . $key + 1;
                } else if ($variant_price < 0) {
                    $errors["variant_price"][$key] = "Giá biến thể không âm";
                }
            }

            foreach ($_POST["variant_sale_price"] as $key => $variant_sale_price) {
                if (!$variant_sale_price) {
                    $errors["variant_sale_price"][$key] = "Vui lòng nhập giá biến thể khuyến mãi" . $key + 1;
                } else if ($variant_sale_price < 0) {
                    $errors["variant_sale_price"][$key] = "Giá biến thể không khuyễn mãi âm ";
                }
            }

            foreach ($_POST["variant_quantity"] as $key => $variant_quantity) {
                if (!$variant_quantity) {
                    $errors["variant_quantity"][$key] = "Vui lòng nhập số lượng sản phẩm biến thể" . $key + 1;
                } else if ($variant_quantity < 0) {
                    $errors["variant_quantity"][$key] = "số lượng sản phẩm biến thể không âm ";
                }
            }
            // echo "<pre>";
            // var_dump($_POST['variant_size']);
            // var_dump($_POST['variant_color']);
            // echo "</pre>";
            if (!empty($errors)) {
            } else {
                $file = $_FILES["product_image"];
                $product_image = uniqid() . '-' . preg_replace('/[^a-zA-Z0-9\-_\.]+/', '', basename($file["name"]));
                if (move_uploaded_file($file["tmp_name"], './images/product/' . $product_image)) {
                    $addProduct = $this->addProduct($_POST["product_name"], $product_image, $_POST["product_price"], $_POST['product_sale_price'], $_POST['product_slug'], $_POST['description'], $_POST['status'], $_POST['category_id']);
                    if ($addProduct) {
                        $product_id = $this->getProductIDNew();
                        if (isset($_POST["variant_size"]) && isset($_POST['variant_color'])) {
                            foreach ($_POST['variant_size'] as  $key => $size) {
                                $addProductVariant = $this->addVariant($_POST['variant_price'][$key], $_POST['variant_sale_price'][$key], $_POST['variant_quantity'][$key], $product_id["product_id"], $_POST['variant_color'][$key], $_POST['variant_size'][$key]);
                            }
                        }
                        if (!empty($_FILES['gallery_image']['name'][0])) {
                            $file = $_FILES['gallery_image'];
                            for ($i = 0; $i < count($file['name']); $i++) {
                                $fileName = basename($file['name'][$i]);
                                $product_gallery =  uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', $fileName);
                                move_uploaded_file($file['tmp_name'][$i], './images/product_gallery/' . $product_gallery);
                                $this->addGallery($product_id["product_id"], $product_gallery);
                            }
                        }
                        $_SESSION["success"] = "Tạo sản phẩm thành công";
                        header('Location:?act=product');
                        exit();
                    } else {
                        $_SESSION["error"] = "Tạo sản phẩm thất bại";
                        header('Location:' . $_SERVER['HTTP_REFERER']);
                        exit();
                    }
                }
            }
        }
        include "../views/admin/product/create.php";
    }

    public function edit()
    {
        $list_color = $this->getAllColor();
        $list_sizes = $this->getAllSize();
        $list_categoris = $this->getAllCategory();
        $product =  $this->getProductById($_GET['id']);
        $variants = $this->getProductVariant($_GET['id']);
        $gallery = $this->getProductGalleryById($_GET['id']);

        if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["updateProduct"])) {
            $errors = [];
        
            // Validate form fields
            if (empty($_POST['product_name'])) {
                $errors["product_name"] = "Vui lòng nhập tên";
            } elseif (strlen(trim($_POST["product_name"])) < 3) {
                $errors["product_name"] = "Tên phải có ít nhất 3 ký tự";
            }
        
            if (empty($_POST['category_id'])) {
                $errors["category_id"] = "Vui lòng chọn danh mục";
            }
        
            if (empty(trim($_POST['description']))) {
                $errors["description"] = "Vui lòng nhập mô tả";
            }
        
            if (empty($_POST['product_price'])) {
                $errors["product_price"] = "Vui lòng nhập giá sản phẩm";
            } elseif ($_POST['product_price'] < 0) {
                $errors["product_price"] = "Giá sản phẩm không âm";
            }
        
            if (empty($_POST['product_sale_price'])) {
                $errors["product_sale_price"] = "Vui lòng nhập giá sản phẩm khuyến mãi";
            } elseif ($_POST['product_sale_price'] < 0) {
                $errors["product_sale_price"] = "Giá sản phẩm khuyến mãi không âm";
            }
        
            if (empty($_POST['variant_size'])) {
                $errors["variant_size"] = "Vui lòng chọn dung lượng";
            }
        
            if (empty($_POST['variant_color'])) {
                $errors["variant_color"] = "Vui lòng chọn màu";
            }
        
            foreach ($_POST["variant_price"] as $key => $variant_price) {
                if (!$variant_price) {
                    $errors["variant_price"][$key] = "Vui lòng nhập giá biến thể" . ($key + 1);
                } elseif ($variant_price < 0) {
                    $errors["variant_price"][$key] = "Giá biến thể không âm";
                }
            }
        
            foreach ($_POST["variant_sale_price"] as $key => $variant_sale_price) {
                if (!$variant_sale_price) {
                    $errors["variant_sale_price"][$key] = "Vui lòng nhập giá biến thể khuyến mãi" . ($key + 1);
                } elseif ($variant_sale_price < 0) {
                    $errors["variant_sale_price"][$key] = "Giá biến thể khuyến mãi không âm";
                }
            }
        
            foreach ($_POST["variant_quantity"] as $key => $variant_quantity) {
                if (!$variant_quantity) {
                    $errors["variant_quantity"][$key] = "Vui lòng nhập số lượng sản phẩm biến thể" . ($key + 1);
                } elseif ($variant_quantity < 0) {
                    $errors["variant_quantity"][$key] = "Số lượng sản phẩm biến thể không âm";
                }
            }
        
            if (empty($errors)) {
                $file = $_FILES["product_image"];
                $product_image = uniqid() . '-' . preg_replace('/[^a-zA-Z0-9\-_\.]+/', '', basename($file["name"]));
                if ($file["size"] > 0) {
                    if (move_uploaded_file($file["tmp_name"], "./images/product/" . $product_image)) {
                        if (isset($_POST["old_product_image"]) && file_exists('./images/product/' . $_POST["old_product_image"])) {
                            unlink("./images/product/" . $_POST["old_product_image"]);
                        }
                    }
                } else {
                    $product_image = $_POST["old_product_image"];
                }
        
                $updateProduct = $this->updateProduct($_GET['id'],$_POST["product_name"], $product_image, $_POST["product_price"], $_POST['product_sale_price'], $_POST['product_slug'], $_POST['description'], $_POST['status'], $_POST['category_id']);
                
                if ($updateProduct) {
                    $product_id = $_POST["product_id"];
                    if (isset($_POST["variant_size"]) && isset($_POST["variant_color"])) {
                        foreach ($_POST['variant_size'] as $key => $size) {
                            if (isset($_POST["product_variant_id"][$key]) && !empty($_POST["product_variant_id"][$key])) {
                                $this->updateProductVariant(
                                    $_POST["product_variant_id"][$key],
                                    $_POST['variant_price'][$key],
                                    $_POST['variant_sale_price'][$key],
                                    $_POST['variant_quantity'][$key],
                                    $product_id,
                                    $_POST['variant_color'][$key],
                                    $_POST['variant_size'][$key]
                                );
                            } else {
                                $this->addVariant(
                                    $_POST['variant_price'][$key], 
                                    $_POST['variant_sale_price'][$key], 
                                    $_POST['variant_quantity'][$key], 
                                    $product_id, 
                                    $_POST['variant_color'][$key], 
                                    $_POST['variant_size'][$key]
                                );
                            }
                        }
                    }
        
                    if (!empty($_FILES["gallery_image"]['name'][0])) {
                        if (!empty($_FILES['gallery_image']['name'][0])) {
                            $file = $_FILES['gallery_image'];
                            for ($i = 0; $i < count($file['name']); $i++) {
                                $fileName = basename($file['name'][$i]);
                                $product_gallery =  uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', $fileName);
                                move_uploaded_file($file['tmp_name'][$i], './images/product_gallery/' . $product_gallery);
                                $this->addGallery($_GET["id"], $product_gallery);
                            }
                        }
                    } else {
                        $product_gallery = $_POST["old_gallery_image"];
                    }
        
                    $_SESSION["success"] = "Sửa sản phẩm thành công";
                    header('Location:?act=product');
                    exit();
                } else {
                    $_SESSION["error"] = "Sửa sản phẩm thất bại";
                    header('Location:' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }
        
        include "../views/admin/product/edit.php";
    }

    public function deleteGallery(){
        try {
            $gallery = $this->getGallery();
            if (file_exists('./images/product_gallery.' . $gallery["image"])) {
                unlink('./images/product_gallery.' . $gallery["image"]);
            }
            $this->removeGallery();
            $_SESSION["success"] = "Xóa thành công";
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
                echo $th->getMessage();
                $_SESSION["error"] = "Xóa thất bại";
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
        }
    }
    public function deleteProductVariant(){
        try {
            $this->removeProductVariant();
            $_SESSION["success"] = "Xóa biến thể thành công";
            header('Location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
                echo $th->getMessage();
                $_SESSION["error"] = "Xóa biến thể thất bại";
                header('Location:' . $_SERVER['HTTP_REFERER']);
                exit();
        }
    }

    public function productDetail(){
        $list_color = $this->getAllColor();
        $list_sizes = $this->getAllSize();
        $list_categoris = $this->getAllCategory();
        $product_id = $_GET['id'];
        $product =  $this->getProductById($_GET['id']);
        $variants = $this->getProductVariant($_GET['id']);
        $gallery = $this->getProductGalleryById($_GET['id']);
        include "../views/admin/product/detail.php";
    }

}

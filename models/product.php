<?php
require_once '../connect/connect.php';
class Product extends connect
{
    public function getAllColor()
    {
        $sql = "SELECT * from variant_colors";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllSize()
    {
        $sql = "SELECT * from variant_size";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCategory()
    {
        $sql = "SELECT * from categories";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduct($name, $image, $price, $sale_price, $slug, $description, $status, $category_id)
    {
        $sql = "INSERT into products(name,image,price,sale_price,slug,description,status,category_id) values (?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        return  $stmt->execute([$name, $image, $price, $sale_price, $slug, $description, $status, $category_id]);;
    }
    public function addGallery($product_id, $image)
    {
        $sql = "INSERT into product_galleries(product_id,image) values (?,?)";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$product_id, $image]);
    }
    public function addVariant($price, $sale_price, $quantity, $product_id, $variant_color_id, $variant_size_id)
    {
        $sql = "INSERT into product_variants(price,sale_price,quantity,product_id,variant_color_id,variant_size_id,created_at,updated_at) values (?,?,?,?,?,?,now(),now())";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$price, $sale_price, $quantity, $product_id, $variant_color_id, $variant_size_id]);
    }

    public function getProductIDNew()
    {
        $sql = "SELECT product_id FROM products ORDER BY product_id DESC LIMIT 1;";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listProduct()
    {
        $sql = "SELECT 
        products.product_id as product_id,
        products.name as product_name,
        products.price as product_price,
        products.sale_price as product_sale_price,
        products.image as product_image,
        products.status as product_status,
        categories.category_id as category_id,
        categories.name as category_name,
        product_variants.product_id as product_variant_id,
        variant_colors.color_name as variant_color_name,
        variant_size.size_name as variant_size_name

        from products
        left join categories on products.category_id=categories.category_id
        left join product_variants on products.product_id=product_variants.product_id
        left join variant_colors on product_variants.variant_color_id=variant_colors.variant_color_id
        left join variant_size on product_variants.variant_size_id=variant_size.variant_size_id

        ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $listProduct = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $groupedProducts = [];
        // Lập qua từng sản phâm trong danh sách ListProduct
        foreach ($listProduct as $product) {
            if (!isset($groupedProducts[$product['product_id']])) {
                $groupedProducts[$product['product_id']] = $product;
                $groupedProducts[$product['product_id']]['variants'] = [];
            }
            // Thêm các biến thể color size variants[]
            $groupedProducts[$product['product_id']]['variants'][] =
                [
                    'product_id' => $product['product_id'],
                    'product_variant_color' => $product['variant_color_name'],
                    'product_variant_size' => $product['variant_size_name']
                ];
        }
        return $groupedProducts;
    }

    public function getProductById($product_id)
    {
        $sql = "SELECT 
        products.product_id as product_id,
        products.name as product_name,
        products.price as product_price,
        products.sale_price as product_sale_price,
        products.image as product_image,
        products.status as product_status,
        products.slug as product_slug,
        products.description as product_description,
        categories.category_id as category_id,
        categories.name as category_name

        FROM products
        left join categories on products.category_id=categories.category_id

        WHERE products.product_id = ?";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductVariant($product_id)
    {
        $sql = "SELECT
        product_variants.product_variant_id as product_variant_id,
        product_variants.price as product_price,
        product_variants.sale_price as product_sale_price,
        product_variants.quantity as product_quantity,
        variant_colors.variant_color_id as variant_color_id,
        variant_size.variant_size_id as variant_size_id,
        variant_colors.color_name as variant_color_name,
        variant_size.size_name as variant_size_name
              
    from product_variants
    left join variant_colors on product_variants.variant_color_id=variant_colors.variant_color_id
    left join variant_size on product_variants.variant_size_id=variant_size.variant_size_id

    WHERE product_variants.product_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$product_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductGalleryById($product_id){
        $sql = "SELECT * from product_galleries WHERE product_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //Cập nhật 
    public function updateProduct($product_id, $name, $image, $price, $sale_price, $slug, $description, $status, $category_id){
        $sql = "UPDATE products set name=?, image=?, price=?, sale_price=?, slug=?,description=?,status=?,category_id=? WHERE product_id=? ";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$name, $image, $price, $sale_price, $slug, $description, $status, $category_id,$product_id]);
    }

    public function updateProductVariant($product_variant_id,$price, $sale_price, $quantity, $product_id,$variant_color_id,$variant_size_id){
        $sql = "UPDATE product_variants SET product_id = ?, price = ?, sale_price = ?, quantity = ?, variant_color_id = ?, variant_size_id = ? WHERE product_variant_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$product_id ,$price, $sale_price, $quantity,$variant_color_id,$variant_size_id,$product_variant_id]);

    }

    // Xóa ảnh 
    public function removeGallery(){
        $sql = "DELETE from product_galleries where product_gallery_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['gallery_id']]);
    }

    public function getGallery(){
        $sql = "SELECT image from product_galleries where product_gallery_id = ?";
        $stmt = $this->connect()->prepare($sql);
         $stmt->execute([$_GET["gallery_id"]]);
         return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    // Xóa biến thể 
    public function removeProductVariant(){
        $sql = "DELETE from product_variants where product_variant_id = ?";
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([$_GET['variant_id']]);
    }
}
    
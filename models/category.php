<?php 
    require_once '../connect/connect.php';
    
    class Category extends connect
    {
        public function listCategory() {
            $sql =  'select * from categories';
            $stmt = $this->connect()->prepare( $sql);
            $stmt->execute();
            return $stmt->fetchAll();
        }
        
        public function create($name, $image, $status, $description){
            $sql = 'insert into categories(name,image,status,description) values(?,?,?,?)';
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$name,$image,$status,$description]);
        }
        
        public function edit($id, $name, $image, $status, $description) {
            $sql = 'update categories set name=?, image=?, status=?, description=? where category_id=?';
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$name, $image, $status, $description, $id]);
        }
        
        
        public function delete($id) {
            $sql = 'delete from categories where category_id=?';
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$id]);
        }
        
        
        public function detail($id) {
            $sql = 'select * from categories where category_id=?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
        public function update($id, $name, $image, $status, $description)
        {
            $sql = "UPDATE categories SET name = ?, image = ?, status = ?, description = ? WHERE category_id = ?";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$name, $image, $status, $description, $id]);
        }
        

        
 
        
        
}


?>
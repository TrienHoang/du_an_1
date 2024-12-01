<?php
require_once '../connect/connect.php';

class User extends connect
{
    public function listUser()
    {
        $sql =  'select * from users';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function create($name, $avatar, $address, $email, $phone, $password, $role, $active)
    {
        $sql = 'insert into users (name, avatar, address, email, phone, password, role_id, active) values (?,?,?,?,?,?,?,?)';
        $stmt = $this->connect()->prepare(query: $sql);
        return $stmt->execute([$name, $avatar, $address, $email, $phone, $password, $role, $active]);
    }

    public function edit($id, $name, $avatar, $address, $email, $phone, $password, $role, $active)
    {
        $sql = 'UPDATE users SET name = ?, avatar =?, address = ?, email = ?, phone = ?, password = ?, role_id = ?, active = ? WHERE user_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([ $name, $avatar, $address, $email, $phone, $password, $role, $active ,$id]);
    }

    public function detail($id) {
        $sql = 'SELECT * from users where user_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUsers( $name, $address, $email, $phone, $password, $render) {
        $sql = 'UPDATE users SET name=?,  address=?, email=?, phone=?, password=?, render=? WHERE user_id=?';
        $stmt = $this->connect()->prepare($sql);
        return $stmt->execute([ $name,  $address, $email, $phone, $password, $render, $_SESSION['user']['user_id']]);
    }
    

    public function getUserById($id){
        $sql= 'SELECT * from users where user_id = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

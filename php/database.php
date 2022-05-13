<?php

namespace app;
use app\models\product;
use PDO;
class database
{
    public \PDO $pdo;
    public static Database $db;
    public function __construct(){
        $this->pdo= new PDO('mysql:host=localhost;port=4306;dbname=footballdb','root','');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$db=$this;
    }
    public function getProducts($search=''){
        $search=$_GET['search']??'';
        if($search){
            $statement=$this->pdo -> prepare('Select * from player where title like :title');
            $statement->bindValue(':title',"%$search%");
        }else {
            $statement=$this->pdo -> prepare('Select * from player');
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
    /*public function createProducts(product $product){
        $statement = $this->pdo->prepare("insert into products(title,image,description,price,create_date) value (:title,:image,:description,:price,:date)");
        $statement->bindvalue(':title', $product->title);
        $statement->bindvalue(':image', $product->imagePath);
        $statement->bindvalue(':description', $product->description);
        $statement->bindvalue(':price', $product->price);
        $statement->bindvalue(':date', date('Y-m-d H:i:s'));
        $statement->execute();
    }
    public function getProductsByID($id){
        $statement = $this->pdo->prepare('select * from products where id = :id');
        $statement ->bindValue(':id',$id);
        $statement ->execute();
        return $statement ->fetch(PDO::FETCH_ASSOC);
    }
    public function updateProduct(product $product){
        $statement = $this->pdo->prepare("update products set title=:title, image=:image, description=:description, price=:price where id=:id");
        $statement->bindvalue(':title', $product->title);
        $statement->bindvalue(':image', $product->imagePath);
        $statement->bindvalue(':description', $product->description);
        $statement->bindvalue(':price', $product->price);
        $statement->bindValue(':id',$product->id);
        $statement->execute();
    }
    public function deleteProduct($id){
        $statement=$this->pdo->prepare('delete from products where id = :id');
        $statement->bindValue(':id',$id);
        $statement->execute();
    }*/
}
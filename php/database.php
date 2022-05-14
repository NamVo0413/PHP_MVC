<?php

namespace app;
use app\models\product;
use app\models\Club;
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
            $statement=$this->pdo -> prepare('Select * from player where FullName like :FullName');
            $statement->bindValue(':FullName',"%$search%");
        }else {
            $statement=$this->pdo -> prepare('Select * from player');
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);

    }
    public function createProducts(product $product){
        $statement = $this->pdo->prepare("insert into player(`PlayerID`,`FullName`,`ClubID`,`DOB`,`Position`,`Nationality`,`Number`) values (:PlayerID,:FullName,:ClubID,:DOB,:Position,:Nationality,:Num)");
        $statement->bindvalue(':PlayerID', $product->PlayerID);
        $statement->bindvalue(':FullName', $product->FullName);
        $statement->bindvalue(':ClubID', $product->ClubID);
        $statement->bindvalue(':DOB', $product->DOB);
        $statement->bindvalue(':Position', $product->Position);
        $statement->bindvalue(':Nationality', $product->Nationality);
        $statement->bindvalue(':Num', $product->Number);
        $statement->execute();
    }
    public function getProductsByID($id){
        $statement = $this->pdo->prepare('select * from player where PlayerID = :id');
        $statement ->bindValue(':id',$id);
        $statement ->execute();
        return $statement ->fetch(PDO::FETCH_ASSOC);
    }
    public function updateProduct(product $product){
        $statement = $this->pdo->prepare("update player set FullName=:FullName, ClubID=:ClubID, DOB=:DOB,Position=:Position,Nationality=:Nationality,Number=:Num where PlayerID=:PlayerID");
        $statement->bindValue(':PlayerID', $product->PlayerID);
        $statement->bindValue(':FullName', $product->FullName);
        $statement->bindValue(':ClubID', $product->ClubID);
        $statement->bindValue(':DOB', $product->DOB);
        $statement->bindValue(':Position', $product->Position);
        $statement->bindValue(':Nationality', $product->Nationality);
        $statement->bindValue(':Num', $product->Number);
        $statement->execute();
    }
    public function deleteProduct($id){
        $statement=$this->pdo->prepare('delete from player where PlayerID = :id');
        $statement->bindValue(':id',$id);
        $statement->execute();
    }
    public function getClub($search=''){
        $search=$_GET['search']??'';
        if($search){
            $statement=$this->pdo->prepare('Select * from club where ClubName like :ClubName');
            $statement->bindValue(':ClubName',"%$search%");
        }
        else{
            $statement=$this->pdo -> prepare('Select * from club');
        }
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getClubByID($id){
        $statement = $this->pdo->prepare('select * from club where ClubID = :id');
        $statement ->bindValue(':id',$id);
        $statement ->execute();
        return $statement ->fetch(PDO::FETCH_ASSOC);
    }
    public function createClub(Club $club){
        $statement=$this->pdo->prepare('insert into club (ClubID,ClubName,Shortname,StadiumID,CoachID) values (:ClubID,:ClubName,:Shortname,:StadiumID,:CoachID)');
        $statement->bindValue(':ClubID',$club->ClubID);
        $statement->bindValue(':ClubName',$club->ClubName);
        $statement->bindValue(':Shortname',$club->Shortname);
        $statement->bindValue(':StadiumID',$club->StadiumID);
        $statement->bindValue(':CoachID',$club->CoachID);
        $statement->execute();
    }
    public function updateClub(Club $club){
        $statement=$this->pdo->prepare('update club set ClubName=:ClubName,Shortname=:Shortname,StadiumID=:StadiumID,CoachID=:CoachID where ClubID=:ClubID');
        $statement->bindValue(':ClubID',$club->ClubID);
        $statement->bindValue(':ClubName',$club->ClubName);
        $statement->bindValue(':Shortname',$club->Shortname);
        $statement->bindValue(':StadiumID',$club->StadiumID);
        $statement->bindValue(':CoachID',$club->CoachID);
        $statement->execute();
    }
    public function deleteClub($id){
        $statement=$this->pdo->prepare('delete from club where ClubID = :id');
        $statement->bindValue(':id',$id);
        $statement->execute();
    }
    public function getPlayerList($id){
        $statement=$this->pdo->prepare('Select * from player where ClubID=:id');
        $statement->bindValue(':id',$id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllClubID(){
        $statement=$this->pdo -> prepare('Select * from club');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
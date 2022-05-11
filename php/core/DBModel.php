<?php

namespace app\core;

abstract class DBModel extends Model
{
    abstract public function tableName():string;
    abstract public function columnsList():array;
    abstract public function primaryKey():string;
    #Function that help to Save the data from web to db through variable (table name and columns of that table)
    public function save(){
        $tableName=$this->tableName();
        $columnsList=$this->columnsList();
        $params=array_map(fn($attr)=>":$attr",$columnsList);
        $statement=self::prepare
        ("insert into $tableName (email,pass) values (".implode(',',$params).")");
        /*echo '<pre>';
        var_dump($statement,$params,$columnsList);
        echo '</pre>';
        exit;*/
        #Bind the data to sql statement
        foreach ($columnsList as $columnsList){
            $statement->bindValue(":$columnsList",$this->{$columnsList});
        }
        #execute the sql statement
        $statement->execute();
        return true;
    }
    public function findOne($where){
        $tableName=static::tableName();
        $columnsList=array_keys($where);
        #Create a variable that will replace sql statement Select From Where, it will replace for content after where (ex: Select * from where $something)
        $filter=implode("AND ",array_map(fn($attr)=>"$attr=:$attr",$columnsList));
        $statement=self::prepare("Select * from user where $filter");
        #This code will bind the value of email and pass from where to filter variable
        foreach ($where as $key=>$item){
            $statement->bindValue(":$key",$item);
        }
        $statement->execute();
        #This code will fetch the class that you create in login function in loginForm
        return $statement->fetchObject(static::class);

    }
    #function to ready load the data from db, you will put sql query command to this function to load data from db
    public static function prepare($sql){
        return Application::$app->db->pdo->prepare($sql);
    }
}
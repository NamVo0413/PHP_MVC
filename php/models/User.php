<?php

namespace app\models;

#Define all attribute of that model you are going to use it
use app\core\DBModel;
use app\core\Model;

class User extends DBModel
{
    public string $email ='';
    public string $pass ='';
    public function tableName(): string
    {
        // TODO: Implement tableName() method.
        // return the name of table that will be using
        return  'user';
    }
    public function primaryKey(): string
    {
        // TODO: Implement primaryKey() method.
        return 'id';
    }

    #return function save
    public function save(){
        return parent::save();
    }
    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
            'pass'=>[self::RULE_REQUIRED]
        ];
    }
    public function columnsList(): array
    {
        return ['email','pass'];
    }
}
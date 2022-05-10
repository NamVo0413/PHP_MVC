<?php

namespace app\models;

#Define all attribute of that model you are going to use it
use app\core\Model;

class RegisterModel extends Model
{
    public string $email;
    public string $pass;
    public function register(){
        echo "Creating new user";
    }
    public function rules(): array
    {
        // TODO: Implement rules() method.
        return [
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
            'pass'=>[self::RULE_REQUIRED]
        ];
    }
}
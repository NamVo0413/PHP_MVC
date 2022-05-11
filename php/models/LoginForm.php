<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class LoginForm extends Model
{
    public string $email ='';
    public string $pass ='';
    #validate the input in login form
    public function rules(): array
    {
        return [
            'email'=>[self::RULE_REQUIRED,self::RULE_EMAIL],
            'pass'=>[self::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        #find and return email of the user to $user variable, go to dbModel to define findOne function
        $user= (new User)->findOne(['email'=>$this->email]);
        if(!$user){
            $this->addError('email','User does not exists with this email');
            return false;
        }
        if(!($this->pass===$user->pass)){
            $this->addError('pass','Password not correct');
            return false;
        }
        return Application::$app->login($user);
    }
}
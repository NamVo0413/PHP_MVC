<?php

namespace app\core;

abstract class Model
{
    #Validate data
    public const RULE_REQUIRED='required';
    public const RULE_EMAIL='email';
    public const RULE_PASSWORD='pass';
    public const RULE_MIN='min';
    public const RULE_MAX='max';
    public const RULE_MATCH='match';
    public function loadData($data){
        foreach ($data as $key=>$value){
            if(property_exists($this,$key)){
                $this->{$key}=$value;
            }
        }
    }
    #Create a abstract function rules for validate
    abstract public function rules(): array;
    public array $errors=[];
    public function validate(){
        foreach ($this->rules() as $attribute=>$rules){
            $value=$this->{$attribute};
            foreach ($rules as $rule){
                $ruleName=$rule;
                if(!is_string($ruleName)){
                    $ruleName=$rule[0];
                }
                if($ruleName===self::RULE_REQUIRED&&!$value){
                    $this->addErrorForRule($attribute,self::RULE_REQUIRED);
                }
                if($ruleName===self::RULE_EMAIL&&!filter_var($value,FILTER_VALIDATE_EMAIL)){
                    $this->addErrorForRule($attribute,self::RULE_EMAIL);
                }
            }
        }
        return empty($this->errors);
    }
    private function addErrorForRule(string $attribute, string $rule, $params=[]){
        $message=$this->errorMessages()[$rule]??'';
        foreach ($params as $key=>$value){
            $message=str_replace("{{$key}}",$value,$message);
        }
        $this->errors[$attribute][]=$message;
    }
    public function addError(string $attribute, string $message){
        $this->errors[$attribute][]=$message;
    }
    public function errorMessages(){
        return [
            self::RULE_REQUIRED=>'This field is required',
            self::RULE_EMAIL=>'Please put an email',
            self::RULE_PASSWORD=>'Please put an password'
        ];
    }
    public function hasError($attribute){
        return $this->errors[$attribute]??false;
    }
    public function getFirstError($attribute){
        return $this->errors[$attribute][0]??false;
    }
    #end of validate function
}
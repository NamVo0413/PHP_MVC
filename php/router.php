<?php

namespace app;

class router
{
    public array $getRoutes=[];
    public array $postRoutes=[];
    public Database $db;
    public function __construct(){
        $this->db=new Database();
    }

    public  function get($url,$fn){
        $this->getRoutes[$url]=$fn;
    }
    public  function post($url,$fn){
        $this->postRoutes[$url]=$fn;
    }
    public function resolve(){
        /*echo '<pre>';
        var_dump($_SERVER);
        echo '</pre>';*/
        $currentUrl=$_SERVER['PATH_INFO']??'/';
        $method=$_SERVER['REQUEST_METHOD'];

        if($method==='GET'){
            $fn=$this->getRoutes[$currentUrl] ??null;
        }else{
            $fn=$this->postRoutes[$currentUrl]??null;
        }
        if($fn){
            /*echo '<pre>';
            var_dump($fn);
            echo '</pre>';*/
            call_user_func($fn,$this);
        }else{
            echo "";
        }
    }
    public function renderView($view,$param=[]){
        foreach($param as $key=>$value){
            $$key = $value;
        }
        ob_start();
        include_once __DIR__."/views/$view.php";
        $content=ob_get_clean();
        include_once __DIR__.'/views/layouts.php';
    }
}
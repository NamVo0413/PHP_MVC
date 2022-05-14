<?php
namespace app\controllers;
use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home(){
        $params=[
          'name'=>"Nam"
        ];
        return $this->render('home',$params);
    }
    public function handleContact(Request $request){
        $body=$request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        exit;
    }
    public function contact(){
        return $this->render('contact');
    }
    public function login(){
        return $this->render('login');
    }
    public function register(){
        return $this->render('register');
    }
    public function index(){
        return $this->render('index');
    }
    public function fake(){
        return $this->render('fake');
    }
}
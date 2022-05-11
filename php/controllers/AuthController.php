<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function login(Request $request,Response $response){
        $loginForm= new LoginForm();
        if($request->isPost()){
            $loginForm->loadData($request->getBody());
            if($loginForm->validate()&&$loginForm->login()){
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');
        return $this->render('login',[
            'model'=>$loginForm
        ]);
    }
    public function register(Request $request){
        $user=new User();
        if($request->isPost()){
            $user->loadData($request->getBody());
            /*echo '<pre>';
            var_dump($user);
            echo '</pre';
            exit;*/
            if($user->validate()&& $user->save()){
                #After register completed return to home page
                Application::$app->response->redirect('/');
            }
            /*echo '<pre>';
            var_dump($user->errors);
            echo '</pre';
            exit;*/
            return $this->render('register',[
                'model'=>$user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register',[
            'model'=>$user
        ]);
    }
}
<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\core\Response;
use app\models\product;
use app\router;

class ProductController extends Controller
{
    public function indexFalse(Request $request){
        $product=new product();
        if($request->isGet()){
            //To do something
        }
        $this->setLayout('auth');
        return $this->render('index',[
            'model'=>$product
        ]);
    }
    public function index(router $router){
        $search=$_GET['search']??'';
        $products=$router->db->getProducts($search);
        /*echo '<pre>';
        var_dump($products);
        echo '</pre>';*/
        $router->renderView('products/index',
        [
            'products'=>$products,
            'search'=>$search
        ]);
        /*echo '<pre>';
        var_dump($products);
        echo '</pre>';*/
    }
    public function createFalse(Request $request){
        $product=new product();
        if($request->isGet() or $request->isPost()){
        }
        $this->setLayout('auth');
        return $this->render('index',[
            'model'=>$product
        ]);
    }
    public function create(router $router){
        $errors=[];
        $productData=[
          'PlayerID'=>'',
          'FullName'=>'',
          'ClubID'=>'',
          'DOB'=>'',
            'Position'=>'',
            'Nationality'=>'',
            'Number'=>''
        ];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $productData['PlayerID']=$_POST['PlayerID'];
            $productData['FullName']=$_POST['FullName'];
            $productData['ClubID']=$_POST['ClubID'];
            $productData['DOB']=$_POST['DOB'];
            $productData['Position']=$_POST['Position'];
            $productData['Nationality']=$_POST['Nationality'];
            $productData['Number']=$_POST['Number'];


            $product =new product();
            $product->load($productData);
            $errors=$product->save_Create();
            /*echo '<pre>';
            var_dump($errors);
            echo '</pre>';*/
            if(empty($errors)){
                header('Location: /index');
                exit;
            }
        }
        $router->renderView('products/create',
            [
                'product'=>$productData,
                'errors'=>$errors
            ]);
    }
    public function updateFalse(Request $request){
        $product=new product();
        if($request->isGet() or $request->isPost()){
        }
        $this->setLayout('auth');
        return $this->render('index',[
            'model'=>$product
        ]);
    }
    public function update(router $router){
        $id= $_GET['id']??null;
        /*if(!$id){
            header('Location:/index');
            exit;
        }*/
        $errors=[];
        $productData=$router->db->getProductsByID($id);
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $productData['FullName']=$_POST['FullName'];
            $productData['ClubID']=$_POST['ClubID'];
            $productData['DOB']=$_POST['DOB'];
            $productData['Position']=$_POST['Position'];
            $productData['Nationality']=$_POST['Nationality'];
            $productData['Number']=$_POST['Number'];
            $product =new product();
            $product->load($productData);
            $errors=$product->save_Update();
            if(empty($errors)){
                header('Location: /index');
                exit;
            }
        }
        $router->renderView('products/update',[
            'product'=>$productData,
            'errors'=>$errors
        ]);

    }
    public function DeleteFalse(Request $request){
        $product=new product();
        if($request->isGet() or $request->isPost()){
        }
        $this->setLayout('auth');
        return $this->render('index',[
            'model'=>$product
        ]);
    }
    public function delete(router $router){
        $id=$_POST['id']??null;
        if(!$id){
            header('Location:/index');
            exit;
        }
        $router->db->deleteProduct($id);
        header('Location:/index');
    }
    public function info(router $router){
        $id= $_GET['id']??null;
        if(!$id){
            header('Location:/index');
            exit;
        }
        $productData=$router->db->getProductsByID($id);
        $router->renderView('products/info',[
            'product'=>$productData
        ]);
    }
    public function infoFalse(Request $request){
        $product=new product();
        if($request->isGet() or $request->isPost()){
        }
        $this->setLayout('auth');
        return $this->render('index',[
            'model'=>$product
        ]);
    }
}
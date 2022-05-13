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
    /*public function create(router $router){
        $errors=[];
        $productData=[
          'title'=>'',
          'description'=>'',
          'image'=>'',
          'price'=>''
        ];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $productData['title']=$_POST['title'];
            $productData['description']=$_POST['description'];
            $productData['imageFile']=$_FILES['image']??null;
            $productData['price']=(float)$_POST['price'];


            $product =new product();
            $product->load($productData);
            $errors=$product->save();
            if(empty($errors)){
                header('Location: /products');
                exit;
            }
        }
        $router->renderView('products/create',
            [
                'product'=>$productData,
                'errors'=>$errors
            ]);
    }
    public function update(router $router){
        $id= $_GET['id']??null;
        if(!$id){
            header('Location:/products');
            exit;
        }
        $errors=[];
        $productData=$router->db->getProductsByID($id);
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $productData['title']=$_POST['title'];
            $productData['description']=$_POST['description'];
            $productData['imageFile']=$_FILES['image']??null;
            $productData['price']=(float)$_POST['price'];
            $product =new product();
            $product->load($productData);
            $errors=$product->save();
            if(empty($errors)){
                header('Location: /products');
                exit;
            }
        }
        $router->renderView('products/update',[
            'product'=>$productData,
            'errors'=>$errors
        ]);

    }
    public function delete(router $router){
        $id=$_POST['id']??null;
        if(!$id){
            header('Location:/products');
            exit;
        }
        $router->db->deleteProduct($id);
        header('Location:/products');
    }
    public function info(router $router){
        $id= $_GET['id']??null;
        if(!$id){
            header('Location:/products');
            exit;
        }
        $productData=$router->db->getProductsByID($id);
        $router->renderView('products/info',[
            'product'=>$productData
        ]);
    }*/
}
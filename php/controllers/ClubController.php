<?php

namespace app\controllers;
use app\models\Club;
use app\core\Controller;
use app\core\Request;
//use app\core\Response;
use app\router;

class ClubController extends Controller
{
    public function clubList(router $router){
        $search=$_GET['search']??'';
        $clubList=$router->db->getClub($search);
        /*echo '<pre>';
        var_dump($products);
        echo '</pre>';*/
        $router->renderView('products/clublist',
            [
                'clubList'=>$clubList,
                'search'=>$search
            ]);
    }
    public function clubListFalse(Request $request){
        $club=new Club();
        if($request->isGet() or $request->isPost()){
        }
        $this->setLayout('auth');
        return $this->render('index',[
            'model'=>$club
        ]);
    }
    public function createClub(router $router){
        $errors=[];
        $clubData=[
            'ClubID'=>'',
            'ClubName'=>'',
            'Shortname'=>'',
            'StadiumID'=>'',
            'CoachID'=>''
        ];
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $clubData['ClubID']=$_POST['ClubID'];
            $clubData['ClubName']=$_POST['ClubName'];
            $clubData['Shortname']=$_POST['Shortname'];
            $clubData['StadiumID']=$_POST['StadiumID'];
            $clubData['CoachID']=$_POST['CoachID'];


            $club =new club();
            $club->load($clubData);
            $errors=$club->save_Create();
            /*echo '<pre>';
            var_dump($errors);
            echo '</pre>';*/
            if(empty($errors)){
                header('Location: /clublist');
                exit;
            }
        }
        $router->renderView('products/createClub',
            [
                'club'=>$clubData,
                'errors'=>$errors
            ]);
    }
    public function createClubFalse(Request $request){
        $club=new Club();
        if($request->isGet() or $request->isPost()){
        }
        $this->setLayout('auth');
        return $this->render('index',[
            'model'=>$club
        ]);
    }
    public function updateClub(router $router){
        $id= $_GET['id']??null;
        /*if(!$id){
            header('Location:/index');
            exit;
        }*/
        $errors=[];
        $ClubData=$router->db->getClubByID($id);
        if($_SERVER['REQUEST_METHOD']==='POST'){
            $ClubData['ClubName']=$_POST['ClubName'];
            $ClubData['Shortname']=$_POST['Shortname'];
            $ClubData['StadiumID']=$_POST['StadiumID'];
            $ClubData['CoachID']=$_POST['CoachID'];
            $club =new Club();
            $club->load($ClubData);
            $errors=$club->save_Update();
            if(empty($errors)){
                header('Location: /clublist');
                exit;
            }
        }
        $router->renderView('products/updateClub',[
            'club'=>$ClubData,
            'errors'=>$errors
        ]);
    }
    public function updateClubFalse(Request $request){
        $club=new Club();
        if($request->isGet() or $request->isPost()){
        }
        $this->setLayout('auth');
        return $this->render('index',[
            'model'=>$club
        ]);
    }
    public function deleteClub(router $router){
        $id=$_POST['id']??null;
        if(!$id){
            header('Location:/clublist');
            exit;
        }
        $router->db->deleteClub($id);
        header('Location:/clublist');
    }
    public function deleteClubFalse(Request $request){
        $club=new Club();
        if($request->isGet() or $request->isPost()){
        }
        $this->setLayout('auth');
        return $this->render('index',[
            'model'=>$club
        ]);
    }
    public function getAllClub(router $router){
        $clubList=$router->db->getAllClubID();
        /*echo '<pre>';
        var_dump($products);
        echo '</pre>';*/
        $router->renderView('products/create',
            [
                'clubList'=>$clubList
            ]);
    }
}
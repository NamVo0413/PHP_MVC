<?php

namespace app\core;

class Application
{
    public Database $db;
    public ?DBModel $user;
    public static string $ROOT_DIR;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public static Application $app;
    public Controller $controller;
    public string $userClass;
    public function __construct($rootPath,array $config)
    {
        self::$ROOT_DIR=$rootPath;
        self::$app=$this;
        $this->request=new Request();
        $this->response=new Response();
        $this->router = new Router($this->request,$this->response);
        $this->session=new Session();
        $this->db=new Database($config['db']);
        $this->userClass=$config['userClass'];
        $primaryValue=$this->session->get('user');
        if($primaryValue){
            $primaryKey=$this->userClass::primaryKey();
            $this->user=$this->userClass::findOne([$primaryKey=>$primaryValue]);
        }
        else{
            $this->user=null;
        }

    }

    public static function isGuest()
    {
        return !self::$app->user;
    }

    public function run(){
        echo $this->router->resolve();
    }
    public function getController(): Controller
    {
        return $this->controller;
    }
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }
    public function login(DBModel $user){
        $this->user=$user;
        $primaryKey=$user->primaryKey();
        $primaryValue=$user->{$primaryKey};
        $this->session->set('user',$primaryValue);
        return true;
    }
    public function logout(){
        $this->user=null;
        $this->session->remove('user');
    }
}
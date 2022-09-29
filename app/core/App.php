<?php
class App{

    protected $controller = "home";
    protected $method= "index";
    protected $params= [];

    public function __construct()
    {
        $url=$this->parseUrl();
        if(!isset($url))$url="/";

        if(isset($url)){
            require_once "Url.php";
            if(isset(Url::$url[$url])){
                // call_user_func_array(Url::$url[$url], []);
                require_once "app/controllers/".Url::$url[$url][0].".php";
                $classname=Url::$url[$url][0];
                $method=Url::$url[$url][1];
                $object=new $classname();
                $object->$method();
            }
        }
 
        // if(isset($url[1])){
        //     if(method_exists($this->controller, $url[1])){
        //         $this->method=$url[1];
        //         unset($url[1]);
        //     }
        // }

        // $this->params=$url?array_values($url):[];

        // call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl(){
        if(isset($_GET["url"])){
            $url=filter_var(rtrim($_GET["url"], '/'), FILTER_SANITIZE_URL);
            return $url;
        }
    }
}
?>
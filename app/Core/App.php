<?php 

class App {
    protected $controller = "HomeController";
    protected $action = "index";

    protected $params = [];

    public function __construct()
    {
       $this->prepareURL();
       $this->render();
 
    }

    private function prepareURL()
    {
        $url = $_SERVER['QUERY_STRING'];

        if (!empty($url)) {
            $url = trim($url , "/");
            $url = explode("/",$url);

            //define the controller
            $this->controller = isset($url[0]) ? ucwords($url[0])."Controller":"HomeController";
            // echo $this->controller;
     
            //definr the action
            $this->action = isset($url[1]) ? $url[1] : "index";
            // echo $this->action;
            unset($url[0], $url[1]); 
        // localhost->pulic-
            $this->params = !empty($url) ? array_values($url):[];
            // var_dump($this->params);

        }
    }

    private function render()
    {
        if (class_exists($this->controller)) {
            $controller = new $this->controller;

            if (method_exists($controller , $this->action)) {
                call_user_func_array([$controller,$this->action],$this->params);
            }else{
                echo "Method Not Exists";
            }
        }else{
            echo "This Controller :".$this->controller . "Not Exist";
        }
    }
}

?>
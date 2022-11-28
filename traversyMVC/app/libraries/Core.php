<?php
    /*
     *   App Core Class
     *   Creates URL & loads core controller
     *   URL format - /controller/method/params
    */ 

    class Core{
        protected $currentController = "Pages";
        protected $currentMethod = "index";
        protected $params = [];

        public function __construct(){
            // print_r($this->getUrl());

            $url = $this->getUrl();

            // look controller for the first value of the array
            if(file_exists('../app/controller/' . ucwords($url[0]) . '.php')){
                $this->currentController = ucwords($url[0]);

                //unset the first element from the array
                unset($url[0]);
            }

            //require the controller
            require_once('../app/controller/' . $this->currentController . '.php');

            //instatiate controller class
            $this->currentController = new $this->currentController;
            unset($url[0]);

            //check the second part of the url
            if(method_exists($this->currentController, $url[1])){
                $this->currentMethod = $url[1];

                //unset the second element of the array (method)
                unset($url[1]);
            }

            //get the parameters
            $this->params =  $url ? array_values($url) : [];

            //call a back with a array of params
            call_user_func_array([$this->currentController,$this->currentMethod], $this->params);


        }

        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'],'/');
                $url = filter_var($url,FILTER_SANITIZE_URL);
                $url = explode('/',$url);
                return $url;
            }
        }

    }






?>
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
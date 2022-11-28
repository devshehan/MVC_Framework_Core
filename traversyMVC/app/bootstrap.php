<?php
    // Load configuration file
    require_once('config/config.php');
    echo APPROOT;


    //load libraries
    // require_once 'libraries/Controller.php';
    // require_once 'libraries/Core.php';
    // require_once 'libraries/Database.php';

    spl_autoload_register(function($className){
        require_once('libraries/' . $className . '.php');
    });











?>
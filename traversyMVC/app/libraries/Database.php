<?php
    /*
        PDO Database class
        Connect to the database
        Create prepared statements
        Bind values
        Retrun rows and results    
    */

    class Database{

        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;

        private $dbh;
        private $stmt;
        private $error;

        public function __construct(){
            // set DSN(database source name)
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
            $option = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try{
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
                echo "connected";
            }catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
            
        }

    }


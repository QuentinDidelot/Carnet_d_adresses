
<?php

class DBConnect {

    
    public static $instance = null;
    public $pdo;

    public function __construct() 
    {
        $this->pdo = new PDO('mysql:host=127.0.0.1:3306;dbname=carnet;charset=utf8', 'root', '');
    }

    public static function getInstance(): DBConnect
    {
        if (self::$instance == null) {
            self::$instance = new DBConnect();
        }
        return self::$instance;
    }

    public function getPDO() : PDO 
    {
        return $this->pdo;
    }

}

?>
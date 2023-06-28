<?php

namespace App;
use PDO;

class Connect{
    public $conn;
    function __construct()
    {
        try{
            $this->conn = new \PDO($_ENV['DSN'].":host=".$_ENV['HOST'].";dbname=".$_ENV['DBNAME']."; user=".$_ENV['USER']."; password=".$_ENV['PASSWORD']."; port=".$_ENV['PORT']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch (\PDOException $e){
            print_r($e->getMessage());
        }
    }
}

// PDO::ATTR_EMULATE_PREPARES, PDO::MYSQL_ATTR_INIT_COMMAND, PDO::ATTR_DEFAULT_FETCH_MODE, PDO::ATTR_PERSISTENT

?>

<?php
namespace App;

use \PDO;

class Connection {


    public static function getPDO (): PDO 
    {
        return new PDO('mysql:dbname=blog;host=127.0.0.1', 'root', 'David1234', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

}


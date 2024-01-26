<?php

class Database{
    public static $connection;

    public static function setupConnection() {
        if(!isset(Database::$connection)){
            Database::$connection=new mysqli("localhost","root","Corei3diluna09","admin_db","3306");

        }
    }
    public static function iud($q){
        Database::setupConnection();
        Database::$connection->query($q);

    }
    public static function serch($q){
        Database::setupConnection();
        $results = Database::$connection->query($q);
        return $results;
    }
}

// balloooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo















?>
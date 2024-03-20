<?php

class Database{

    public static $connection;
    public static function connection(){
        if(!isset(Database::$connection)){
            Database::$connection = new mysqli("htcdistributors.com","htcdistr_htcdb","@2005Thinuka20","htcdistr_admin_db","3306");
        }
    }

    public static function iud($q){
        Database::connection();
        Database::$connection->query($q);
    }

    public static function serch($q){
        Database::connection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }

}
?>
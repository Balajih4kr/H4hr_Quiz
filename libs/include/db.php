<?php

class Database{
    public static $conn = null;
    public static function get_connection(){

        if(Database::$conn == null){
            $servername = get_config('db_server');
            $username = get_config('db_user');
            $password = get_config('db_password');
            $dbname = get_config('db_name');
            /* $servername = "mysql.selfmade.ninja";
            $username = "balaji";
            $password = "balaji123";
            $dbname = "balaji_quizdb"; */
    
            $connection = new mysqli($servername, $username, $password, $dbname);
    
    
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }else{
                    Database::$conn = $connection;
                    return Database::$conn;
                }
        }
        else{
            return Database::$conn;
        }
        
        
    }

}





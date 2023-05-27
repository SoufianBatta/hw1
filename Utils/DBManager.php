<?php
    class DBManager
    {
        static private $host = null;
        static private $user = null;
        static private $password = null;
        static private $database = null;
        static $conn = null;
        static $init = false;

        static function init($p_host = 'localhost', $p_user = 'root', $p_password = '', $p_database = 'homework1')
        {
            if(!self::is_init()){
                self::$user = $p_user;
                self::$password = $p_password;
                self::$database = $p_database;
                self::$init = true;
                self::$host = $p_host;
                return self::$conn = mysqli_connect(self::$host, self::$user, self::$password,self::$database);
            }
        }
        static function is_init(){
            return self::$init;
        }
        static function close(){
            if (self::is_init()) {
                self::$init = !mysqli_close(self::$conn);
            }
        }
        static function exe($query){
            if (self::is_init()) {
                return mysqli_query(self::$conn,$query);
            }
        }
        static function prevent_injection($variables){
            if (self::is_init()) {
                $correct_escape_variables = array();
                foreach ($variables as $key => $value) {
                    $correct_escape_variables[$key] = mysqli_real_escape_string(self::$conn,$value);
                }
                return $correct_escape_variables;
            }
        }
        static function segregate($result){
            $rows = array();
            while($row = mysqli_fetch_assoc($result)){
                $rows[] = $row;
            }
            return $rows;
        }
        static function count($result){
            return mysqli_num_rows($result);
        }
    }
    
?>
<?php
class Conexion {
    public $mysql;
    public static $instance;
    //Singleton
    public static function  getInstance(){
        if(!self::$instance instanceof self){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public function fetchAll($sql){
        $result = $this->mysql->query($sql);
        $entries = array();
        if($result){
            while ($row = $result->fetch_array()){
                $entries[] = $row;
            }
        }
        return $entries;
    }
}
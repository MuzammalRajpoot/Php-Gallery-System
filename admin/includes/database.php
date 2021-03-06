<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of database
 *
 * @author Administrator
 */

class Database {
  
    public $connection;
    
    public function __construct() {
        $this->open_db_connection();
    }
    public function open_db_connection() {
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($this->connection->connect_errno){
            die("Database Connection Faild" .$this->connection->connect_error);
        }
    }
   public function query($sql) {
    $result = $this->connection->query($sql);
    $this->confirm_query($result);
    return $result;
    }
    public function confirm_query($result) {
        if(!$result){
            die("Opps Query Faild " . $this->connection->error);
        }
    }
    public function escape_string($string) {
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
    }
    public function the_insert_id() {
       return mysqli_insert_id($this->connection);
        //return $this->connection->insert_id;
    }
    
}

$database = new Database();

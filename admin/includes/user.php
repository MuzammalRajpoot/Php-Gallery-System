<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of user
 *
 * @author Administrator
 */
class User extends Db_object {
    protected static  $db_table = "users";
    protected static  $db_table_fields = array('username','password','first_name','last_name','user_image');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory = "images";
    public $placeholder_image = "https://placehold.it/62x62";
   
    
     public function set_file($file) {
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "There is not file uploaded";
            return false;
        }elseif($file['error'] !=0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->user_image = basename($file['name']);
            $this->tmp_path =  $file['tmp_name'];
            $this->type     =  $file['type'];
            $this->size     =  $file['size'];
        }
    }
    public function save_user_image_and_data() {
        if ($this->id) {
            $this->update();
        } else {
            
            if(!empty($this->errors)){
                return false;
            }
            
             if(empty($this->user_image) || empty($this->tmp_path)){
                    $this->errors[] = " File is not Available";
                    return false;
                }
                    $target_path = SITE_ROOT .DS. 'admin'.DS.$this->upload_directory. DS. $this->user_image;
//                    var_dump($target_path);
//                    die();
                    if(file_exists($target_path)){
                        $this->errors[] = " The file {$this->user_image} is already exist";
                        return false;
                    }
                     if(move_uploaded_file($this->tmp_path,$target_path)){
                        if ($this->create()) {
                            unset($this->tmp_path);
                            return true;
                        }
                    }else{
                        $this->errorsp[] = "The Folder does't have premission Oops";
                        return false;
                    }
                
             }
        
    }


    public function user_image() {
        return empty($this->user_image)? $this->placeholder_image : $this->upload_directory.DS.$this->user_image;
    }


    public static  function verify_user($username,$password) {
        global  $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);
        
        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
       
        $the_object_array = self::find_by_query($sql);
        return !empty($the_object_array)? array_shift($the_object_array) : FALSE;
   
    }    
   
    
}


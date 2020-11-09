<?php

class Login {

    private $table1 = "owner";
    private $table2 = "reception";
    public $connection;
    
    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $data = "tharindu";

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
    
    public function avoidSqlInjection($data) {
        $data[0] = mysqli_real_escape_string($this->connection,$data[0]);
        $data[1] = mysqli_real_escape_string($this->connection,$data[1]);
        
        return $data;
    }


    public function getOwner($email, $hashed_password) {

        $user = array();
        $query = "SELECT * FROM $this->table1 
                  WHERE email = '{$email}'
                  AND password = '{$hashed_password}'
                  LIMIT 1";

        $result_set = mysqli_query($this->connection, $query);
        if($result_set){
            if(mysqli_num_rows($result_set) == 1) {
                $user = mysqli_fetch_assoc($result_set);
            }
        }
        else {
            echo "Query Error";
        }
        return $user;
    } 

    public function getReception($email, $hashed_password) {
        $user = array();
        $query = "SELECT * FROM $this->table2 
                  WHERE email = '{$email}'
                  AND password = '{$hashed_password}'
                  LIMIT 1";

        $result_set = mysqli_query($this->connection, $query);
        if($result_set){
            if(mysqli_num_rows($result_set) == 1) {
                $user = mysqli_fetch_assoc($result_set);
            }
        }
        else {
            echo "Query Error";
        }
        return $user;
    }
    

    
}
<?php 

class Reception extends Employee{

    private $reception_user_id;
    // private $emp_id ==> Foreign Key
    private $reception_user_level;
    private $reception_username;
    private $reception_password;
    private $reception_is_deleted;
    private $reception_table = "reception";
    // private $table1 = "reception";
    // private $table2 = "employee";
    // private $connection;

    public function __construct() {
        Employee::__construct();

    }

    public function getAllReception() {

        $query = "SELECT $this->reception_table.reception_user_id, $this->reception_table.username, $this->employee_table.email, $this->employee_table.contact_num, $this->employee_table.first_name, $this->employee_table.last_name , $this->employee_table.location
                  FROM  $this->reception_table
                  INNER JOIN $this->employee_table
                  ON $this->reception_table.emp_id = $this->employee_table.emp_id
                  WHERE $this->employee_table.is_deleted=0 AND $this->reception_table.is_deleted=0 ORDER BY $this->reception_table.reception_user_id";

        $users = mysqli_query($this->connection, $query);
        if($users) {
            mysqli_fetch_all($users, MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }

        return $users;
    }

    public function getSearchReception($search) {

        $username = mysqli_real_escape_string($this->connection, $search);

        $query = "SELECT $this->reception_table.reception_user_id, $this->reception_table.username, $this->employee_table.email, $this->employee_table.contact_num, $this->employee_table.first_name, $this->employee_table.last_name  , $this->employee_table.location
                  FROM  $this->reception_table
                  INNER JOIN $this->employee_table
                  ON $this->reception_table.emp_id = $this->employee_table.emp_id
                  WHERE $this->employee_table.is_deleted=0 AND $this->reception_table.is_deleted=0 AND $this->reception_table.username = '{$username}' 
                  ORDER BY $this->reception_table.reception_user_id";
        
        $users = mysqli_query($this->connection, $query);

        if($users) {
            mysqli_fetch_all($users, MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }

    return $users;

    }

    public function getDataReception($reception_user_id) {

        $reception_user_id = mysqli_real_escape_string($this->connection, $reception_user_id);
        
        $query = "SELECT $this->table1.reception_user_id, $this->table1.username, $this->table2.email, $this->table2.contact_num, $this->table2.first_name, $this->table2.last_name  , $this->table2.location
                  FROM  $this->table1
                  INNER JOIN $this->table2
                  ON $this->table1.emp_id = $this->table2.emp_id
                  WHERE $this->table2.is_deleted=0 AND $this->table1.is_deleted=0 AND $this->table1.reception_user_id = '{$reception_user_id}' 
                  LIMIT 1";
        
        $reception = mysqli_query($this->connection, $query);
        if($reception) {
            if(mysqli_num_rows($reception) == 1) {
                $reception = mysqli_fetch_assoc($reception);
            }
        }
        else {
            echo "Query Error";
        }
        return $reception;

    }
    public function getReception($reception_user_id) {
        $reception = array();
        $reception_user_id = mysqli_real_escape_string($this->connection, $reception_user_id);

        $query = "SELECT * FROM $this->table1 
                  WHERE reception_user_id = '{$reception_user_id}' AND is_deleted=0
                  LIMIT 1";

        $result = 0;
        $result_set = mysqli_query($this->connection, $query);
        if($result_set){
            if(mysqli_num_rows($result_set) == 1) {
                $reception = mysqli_fetch_assoc($result_set);
            }
        }
        else {
            echo "Query Error";
        }
        return $reception;


    }

    public function getCreateReception() {

        $this->reception_username = "Reception";
        $this->reception_user_level = 2;
        $password = 1234;
        $this->reception_password = sha1($password);

        $query = "INSERT INTO $this->reception_table (
            emp_id,username, user_level, password, is_deleted) 
            VALUES (
           '{$this->emp_id}', '{$this->reception_username}', '{$this->reception_user_level}', '{$this->reception_password}', 0
            )";
  
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }

        return $value;
    }

    public function getUpdate($reception_user_id, $emp_id, $user_level, $username, $password) {
        $reception_user_id = mysqli_real_escape_string($this->connection, $reception_user_id);
        $emp_id = mysqli_real_escape_string($this->connection, $emp_id);
        $user_level = mysqli_real_escape_string($this->connection, $user_level);
        $username = mysqli_real_escape_string($this->connection, $username);
        $password = mysqli_real_escape_string($this->connection, $password);

        $password = sha1($password);
        $value = 0;
        $query = "UPDATE $this->table1 SET
                reception_user_id = '{$reception_user_id}',
                emp_id = '{$emp_id}',
                user_level = '{$user_level}',
                username = '{$username}',
                password = '{$password}'
                WHERE reception_user_id = {$reception_user_id} LIMIT 1";
        
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }
        else {
            echo "Query Unsuccesful";
        }
        return $value;

    }

    

    public function checkReception() {
        

        $query = "SELECT * FROM $this->reception_table 
                  WHERE emp_id = '{$this->emp_id}' AND is_deleted=0
                  LIMIT 1";

        $result = 0;
        $result_set = mysqli_query($this->connection, $query);
        if($result_set){
            if(mysqli_num_rows($result_set) == 1) {
                $result = 1;
            }
        }
        else {
            echo "Query Error";
        }
        return $result;


    }

    public function removeReception() {

        $query = "UPDATE $this->reception_table SET is_deleted =1 WHERE emp_id = {$this->emp_id} LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        if($result) {
            $value = 1;
        }
        
        return $value;
    }

    public function getCheckDeleteReception() {

        $query = "SELECT * FROM $this->reception_table 
                 WHERE emp_id = '{$this->emp_id}' AND is_deleted=1
                 LIMIT 1";
        $value = 0;
        $result = mysqli_query($this->connection, $query);
        if($result) {
            if(mysqli_num_rows($result) == 1) {
                $value = 1;
            }
        }
        return $value;
    }

    public function getUpdateReception() {

        $query = "UPDATE $this->reception_table SET is_deleted =0 WHERE emp_id = {$this->emp_id} LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        if($result) {
            $value = 1;
        }
        
        return $value;
    }
}

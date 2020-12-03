<?php 

class Reception {

    private $table1 = "reception";
    private $table2 = "employee";
    private $connection;

    public function __construct() {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    }

    public function getAllReception() {

        $query = "SELECT $this->table1.reception_user_id, $this->table1.username, $this->table2.email, $this->table2.contact_num, $this->table2.first_name, $this->table2.last_name , $this->table2.location
                  FROM  $this->table1
                  INNER JOIN $this->table2
                  ON $this->table1.emp_id = $this->table2.emp_id
                  WHERE $this->table2.is_deleted=0 AND $this->table1.is_deleted=0 ORDER BY $this->table1.reception_user_id";

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

        $query = "SELECT $this->table1.reception_user_id, $this->table1.username, $this->table2.email, $this->table2.contact_num, $this->table2.first_name, $this->table2.last_name  , $this->table2.location
                  FROM  $this->table1
                  INNER JOIN $this->table2
                  ON $this->table1.emp_id = $this->table2.emp_id
                  WHERE $this->table2.is_deleted=0 AND $this->table1.is_deleted=0 AND $this->table1.username = '{$username}' 
                  ORDER BY $this->table1.reception_user_id";
        
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

    public function getCreate($emp_id) {
        $emp_id = mysqli_real_escape_string($this->connection, $emp_id);
        $username = "Reception";
        $user_level = 2;
        $password = 1234;
        $password = sha1($password);

        $query = "INSERT INTO $this->table1 (
            emp_id,username, user_level, password, is_deleted) 
            VALUES (
           '{$emp_id}', '{$username}', '{$user_level}', '{$password}', 0
            )";
  
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }

        return $value;
    }

    public function checkReception($emp_id) {
        // echo "<br>This is Employee ID=".$emp_id."<br>";
        $emp_id = mysqli_real_escape_string($this->connection, $emp_id);

        $query = "SELECT * FROM $this->table1 
                  WHERE emp_id = '{$emp_id}' AND is_deleted=0
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

    public function removeReception($emp_id) {
        $emp_id = mysqli_real_escape_string($this->connection, $emp_id);

        $query = "UPDATE $this->table1 SET is_deleted =1 WHERE emp_id = {$emp_id} LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        if($result) {
            $value = 1;
        }
        
        return $value;
    }

    public function getCheckDeleteReception($emp_id) {
        $emp_id = mysqli_real_escape_string($this->connection, $emp_id);

        $query = "SELECT * FROM $this->table1 
                 WHERE emp_id = '{$emp_id}' AND is_deleted=1
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

    public function getUpdateReception($emp_id) {

        $emp_id = mysqli_real_escape_string($this->connection, $emp_id);

        $query = "UPDATE $this->table1 SET is_deleted =0 WHERE emp_id = {$emp_id} LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        if($result) {
            $value = 1;
        }
        
        return $value;
    }
}

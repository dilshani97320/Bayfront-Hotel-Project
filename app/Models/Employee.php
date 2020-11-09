<?php 

class Employee {

    private $table = "employee";
    private $connection;

    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }

    public function getAllEmployee() {

        $query = "SELECT * FROM  $this->table
                  WHERE is_deleted=0 ORDER BY emp_id";
        $users = mysqli_query($this->connection, $query);
        if($users) {
            mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    

    return $users;    
    }

    public function getSearchEmployee($search) {
        $search = mysqli_real_escape_string($this->connection, $search);
        $query = "SELECT * FROM $this->table WHERE 
                (first_name LIKE '%{$search}%' OR last_name LIKE '%{$search}%' OR email LIKE '%{$search}%')
                AND is_deleted=0 ORDER BY first_name";

        $users = mysqli_query($this->connection, $query);

        if($users) {
            mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }        
    
    return $users;  
    }

    public function getEmail($email) {
        $user = array();
        $email = mysqli_real_escape_string($this->connection, $email);
        $query = "SELECT * FROM $this->table 
                  WHERE email = '{$email}'
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

    public function getOwner($owner_user_id) {
        $user = array();
        $owner_user_id = mysqli_real_escape_string($this->connection, $owner_user_id);
        $query = "SELECT * FROM $this->table 
                  WHERE owner_user_id = '{$owner_user_id}'
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

    public function getCreate($data) {
        $value = 0;
        $owner_user_id = mysqli_real_escape_string($this->connection, $data[0]);
        $first_name = mysqli_real_escape_string($this->connection, $data[1]);
        $last_name = mysqli_real_escape_string($this->connection, $data[2]);
        $email = mysqli_real_escape_string($this->connection, $data[3]);
        $salary = mysqli_real_escape_string($this->connection, $data[4]);
        $location = mysqli_real_escape_string($this->connection, $data[5]);
        $contact_num = mysqli_real_escape_string($this->connection, $data[6]);

        $query = "INSERT INTO $this->table (
                  owner_user_id,first_name, last_name, email, salary, location, contact_num, is_deleted) 
                  VALUES (
                 '{$owner_user_id}', '{$first_name}', '{$last_name}', '{$email}', '{$salary}', '{$location}', '{$contact_num}', 0
                  )";
        
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }
        return $value;
    }

    public function getUpdate($data) {
        $value = 0;
        $emp_id = mysqli_real_escape_string($this->connection, $data[0]);
        $owner_user_id = mysqli_real_escape_string($this->connection, $data[1]);
        $first_name = mysqli_real_escape_string($this->connection, $data[2]);
        $last_name = mysqli_real_escape_string($this->connection, $data[3]);
        $email = mysqli_real_escape_string($this->connection, $data[4]);
        $salary = mysqli_real_escape_string($this->connection, $data[5]);
        $location = mysqli_real_escape_string($this->connection, $data[6]);
        $contact_num = mysqli_real_escape_string($this->connection, $data[7]);

        $query = "UPDATE $this->table SET
                owner_user_id = '{$owner_user_id}',
                first_name = '{$first_name}',
                last_name = '{$last_name}',
                email = '{$email}',
                salary = '{$salary}',
                location = '{$location}',
                contact_num = '{$contact_num}'
                WHERE emp_id = {$emp_id} LIMIT 1";
        
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }
        return $value;
    }

    public function remove($emp_id) {
        $emp_id = mysqli_real_escape_string($this->connection, $emp_id);

        $query = "UPDATE $this->table SET is_deleted =1 WHERE emp_id = {$emp_id} LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        if($result) {
            $value = 1;
        }
        
        return $value;
    }

    public function getDataEmployee($emp_id) {

        $emp_id = mysqli_real_escape_string($this->connection, $emp_id);

        $query = "SELECT * FROM $this->table
                  WHERE emp_id = '{$emp_id}'
                  LIMIT 1";
        $employees = mysqli_query($this->connection, $query);
        if($employees){
            if(mysqli_num_rows($employees) == 1) {
                $employee = mysqli_fetch_assoc($employees);
            }
        }
        else {
            echo "Query Error";
        }

        return $employee;
    }

    public function getEmailOther($email, $emp_id) {
        $user = array();
        $email = mysqli_real_escape_string($this->connection, $email);
        $query = "SELECT * FROM $this->table 
                  WHERE email = '{$email}'
                  AND emp_id != '{$emp_id}'
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
}
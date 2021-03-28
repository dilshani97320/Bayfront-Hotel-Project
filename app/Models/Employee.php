<?php 

class Employee extends Owner  {

    protected $emp_id;
    // private $owner_user_id; --->Foreign key
    private $employee_first_name;
    private $employee_last_name;
    private $employee_email;
    private $employee_salary;
    private $employee_location;
    private $employee_contact_num;
    private $employee_post;
    private $employee_is_deleted;
    public $employee_table = "employee";
    // private $connection;
    
    public function __construct() {
        Owner::__construct();
    }
    

    public function setSearchEmployee($search) {
        $search = mysqli_real_escape_string($this->connection, $search);
        $this->employee_first_name = $search;
        $this->employee_last_name =$search;
        $this->employee_email = $search;
    }

    public function setEmailEmployee($email) {
        $this->employee_email = mysqli_real_escape_string($this->connection, $email);
    }

    public function setPhoneNumberEmployee($contact_num) {
        $this->employee_contact_num = mysqli_real_escape_string($this->connection, $contact_num);
    }

    public function setCreateEmployee($data) {
        $this->employee_first_name = mysqli_real_escape_string($this->connection, $data[0]);
        $this->employee_last_name = mysqli_real_escape_string($this->connection, $data[1]);
        $this->employee_email = mysqli_real_escape_string($this->connection, $data[2]);
        $this->employee_salary = mysqli_real_escape_string($this->connection, $data[3]);
        $this->employee_location = mysqli_real_escape_string($this->connection, $data[4]);
        $this->employee_contact_num = mysqli_real_escape_string($this->connection, $data[5]);
        $this->employee_post = mysqli_real_escape_string($this->connection, $data[6]);
    }

    public function setEmployee_id($emp_id) {
        $this->emp_id = mysqli_real_escape_string($this->connection, $emp_id);
    }

    public function setEmailOtherEmployee($email, $emp_id) {
        $this->employee_email = mysqli_real_escape_string($this->connection, $email);
        $this->emp_id = mysqli_real_escape_string($this->connection, $emp_id);
        
    }

    public function setPhoneNumberOtherEmployee($contact_num, $emp_id) {
        $this->employee_contact_num = mysqli_real_escape_string($this->connection, $contact_num);
        $this->emp_id = mysqli_real_escape_string($this->connection, $emp_id);
    }

    public function setUpdateEmployee($data) {
        $this->emp_id = mysqli_real_escape_string($this->connection, $data[0]);
        $this->employee_first_name = mysqli_real_escape_string($this->connection, $data[1]);
        $this->employee_last_name = mysqli_real_escape_string($this->connection, $data[2]);
        $this->employee_email = mysqli_real_escape_string($this->connection, $data[3]);
        $this->employee_salary = mysqli_real_escape_string($this->connection, $data[4]);
        $this->employee_location = mysqli_real_escape_string($this->connection, $data[5]);
        $this->employee_contact_num = mysqli_real_escape_string($this->connection, $data[6]);
        $this->employee_post = mysqli_real_escape_string($this->connection, $data[7]);
    }
    

    //Done
    public function getAllEmployee() {

        $query = "SELECT * FROM  $this->employee_table
                  WHERE is_deleted=0 ORDER BY emp_id";
        $users = mysqli_query($this->connection, $query);
        if($users) {
           mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    
//var_dump($users);
//exit;
    return $users;    
    }



    public function getAllEmployeePdf() {

        $query = "SELECT * FROM  $this->employee_table
                  WHERE is_deleted=0 ORDER BY emp_id";
        $users = mysqli_query($this->connection, $query);
        if($users) {
            $users=mysqli_fetch_all($users,MYSQLI_ASSOC);
        }
        else {
            echo "Database Query Failed";
        }    
    return $users;    
    }


    //Done
    public function getSearchEmployee() {

        $query = "SELECT * FROM $this->employee_table WHERE 
                (first_name LIKE '%{$this->employee_first_name}%' OR last_name LIKE '%{$this->employee_last_name}%' OR email LIKE '%{$this->employee_email}%')
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

    public function checkEmailEmployee() {
    
        $query = "SELECT * FROM $this->employee_table 
                  WHERE email = '{$this->employee_email}' AND is_deleted=0
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

    public function checkPhoneNumberEmployee() {
        
        $query = "SELECT * FROM $this->employee_table 
                  WHERE contact_num = '{$this->employee_contact_num}' AND is_deleted=0
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

    

    //Done
    public function getCreateEmployee() {
        $value = 0;
        $query = "INSERT INTO $this->employee_table (
                  owner_user_id,first_name, last_name, email, salary, location, contact_num, is_deleted, post) 
                  VALUES (
                 '{$this->owner_user_id}', '{$this->employee_first_name}', '{$this->employee_last_name}', '{$this->employee_email}', '{$this->employee_salary}', '{$this->employee_location}', '{$this->employee_contact_num}', 0, '{$this->employee_post}'
                  )";
        
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }
        return $value;
    }

    //Get Employee Detail by using email
    public function getEmployee() {

        $query = "SELECT * FROM $this->employee_table 
                  WHERE email = '{$this->employee_email}'
                  AND is_deleted = 0
                  LIMIT 1";
        
        $result = mysqli_query($this->connection, $query);

        if($result ){
            if(mysqli_num_rows($result ) == 1) {
                $employee = mysqli_fetch_assoc($result );
            }
        }
        else {
            echo "Query Error";
        }

        return $employee;


    }

    //Get Employee Detail by using emp_id
    public function getDataEmployee() {


        $query = "SELECT * FROM $this->employee_table
                  WHERE emp_id = '{$this->emp_id}' AND is_deleted=0
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

    public function getEmailOtherEmployee() {
        
        $query = "SELECT * FROM $this->employee_table 
                  WHERE email = '{$this->employee_email}'
                  AND emp_id != '{$this->emp_id}' AND is_deleted=0
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

    public function getPhoneNumberOtherEmployee() {
        
        $query = "SELECT * FROM $this->employee_table
                  WHERE contact_num = '{$this->employee_contact_num}'
                  AND emp_id != '{$this->emp_id}'
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

    // Done
    public function getUpdateEmployee() {

        $query = "UPDATE $this->employee_table SET
                owner_user_id = '{$this->owner_user_id}',
                first_name = '{$this->employee_first_name}',
                last_name = '{$this->employee_last_name}',
                email = '{$this->employee_email}',
                salary = '{$this->employee_salary}',
                location = '{$this->employee_location}',
                contact_num = '{$this->employee_contact_num}',
                post = '{$this->employee_post}'
                WHERE emp_id = {$this->emp_id} LIMIT 1";
        
        $result = mysqli_query($this->connection, $query);
        if($result) {
            // query successful.. redirecting to users page
            $value = 1;
        }
        return $value;
    }


    public function removeEmployee() {

        $query = "UPDATE $this->employee_table SET is_deleted =1 WHERE emp_id = {$this->emp_id} LIMIT 1";

        $result = mysqli_query($this->connection, $query);
        if($result) {
            $value = 1;
        }
        
        return $value;
    }

    public function getCountEmployees() {

        $query = "SELECT COUNT(DISTINCT $this->employee_table.emp_id) as count
                FROM $this->employee_table
                WHERE $this->employee_table.is_deleted = 0 LIMIT 1";
        
        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        
        if($result){
            if(mysqli_num_rows($result) == 1) {
                $result = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "Query Error";
        }

        return $result;
    }

    public function getCountAllEmployee() {

        $query = "SELECT SUM(DISTINCT $this->employee_table.salary) as sum
                FROM $this->employee_table
                WHERE $this->employee_table.is_deleted = 0 LIMIT 1";
        
        // var_dump($query);
        $result = mysqli_query($this->connection, $query);
        
        if($result){
            if(mysqli_num_rows($result) == 1) {
                $result = mysqli_fetch_assoc($result);
            }
        }
        else {
            echo "Query Error";
        }

        return $result;
    }

    

    
}
<?php 

class User extends Connection{
    private $user_id;
    private $user_name;
    private $user_email;
    private $user_verified;
    private $user_token; 
    private $user_password; 
    private $owner_userType;
    private $user_table = "user";

    public function __construct() {        
        Connection::__construct();
    }

    public function getUserEmail($id) {
        $this->user_id = mysqli_real_escape_string($this->connection, $id); 

        $user = array();
        $query = "SELECT email FROM $this->user_table 
                  WHERE id = '{$this->user_id}'
                  LIMIT 1";

        $result = 0;
        $result_set = mysqli_query($this->connection, $query);
        if($result_set){
            $user = mysqli_fetch_assoc($result_set);
        }
        else {
            echo "Query Error";
        }
        return $user;
    }
}
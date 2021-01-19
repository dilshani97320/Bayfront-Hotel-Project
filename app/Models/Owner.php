<?php 

class Owner extends Connection{
    protected $owner_user_id;
    protected $owner_username;
    protected $owner_email;
    protected $owner_password;
    protected $owner_user_level;
    private $owner_table = "owner";


    public function __construct() {        
        Connection::__construct();
    }

    public function setOwnerId($owner_user_id) {
        $this->owner_user_id = mysqli_real_escape_string($this->connection, $owner_user_id);     
    }

    public function checkOwner() {
        $user = array();
        $query = "SELECT * FROM $this->owner_table 
                  WHERE owner_user_id = '{$this->owner_user_id}'
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
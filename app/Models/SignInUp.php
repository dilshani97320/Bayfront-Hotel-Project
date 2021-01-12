<?php 

class SignInUp {

    private $table = "customer";
    private $connection;

    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }

    public function getCustomer($email, $password) {

        $eamil = mysqli_real_escape_string($this->connection, $eamil);
        $password = mysqli_real_escape_string($this->connection, $password);
        $result = 0;
        $emailQuery = "SELECT * FROM $this->table WHERE email=? LIMIT 1";
        $stmt = $this->connection->prepare($emailQuery);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result= $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            return $user;
        }

    }



    



    public function getEmail($email) {
        // $user = array();
        $email = mysqli_real_escape_string($this->connection, $email);
        $result = 0;
        $emailQuery = "SELECT * FROM $this->table WHERE email=? LIMIT 1";
        $stmt = $this->connection->prepare($emailQuery);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result= $stmt->get_result();
        $userCount = $result->num_rows;
        $stmt->close();

        if($userCount > 0){
		    $result = 1;
	    }
        return $result;
    }

    public function getCreate($data) {
        $value = 0;
        $username = mysqli_real_escape_string($this->connection, $data[0]);
        $email = mysqli_real_escape_string($this->connection, $data[1]);
        $password= mysqli_real_escape_string($this->connection, $data[2]);
        $token = mysqli_real_escape_string($this->connection, $data[3]);
        $verified = mysqli_real_escape_string($this->connection, $data[4]);
        
        $sql = "INSERT INTO $this->table (name, email, verified, token, password) VALUES  (?,?,?,?,?)";
		$stmt = $this->connection->prepare($sql);

        $stmt->bind_param('ssiss',$username, $email, $verified, $token, $password);
        
        if ($stmt->execute()) {
            $value = 1;
        }

        return $value;
    }

    
}
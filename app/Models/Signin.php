<?php

class Signin {

    private $table = "user";
    public $conn;
    
    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
    
    
    public function getUser($email, $password) {
        // echo $email;
		// echo $password;

        $email = mysqli_real_escape_string($this->conn, $email);
        $password = mysqli_real_escape_string($this->conn, $password);

        $emailQuery = "SELECT * FROM $this->table WHERE email=? LIMIT 1";
        // echo $emailQuery;
        // exit;
        $result = 0;
		$stmt = $this->conn->prepare($emailQuery);
		$stmt->bind_param('s',$email);
		$stmt->execute();
        $result= $stmt->get_result();
        // var_dump($result);
		$user = $result->fetch_assoc();
        
        // exit;
        if (password_verify($password, $user['password'])) {
        
            return $user;
        }else{
            return null;
        }

    }

    public function findEmail($email)
    {
        $emailQuery = "SELECT * FROM $this->table WHERE email=? LIMIT 1";
		$stmt = $this->conn->prepare($emailQuery);
		$stmt->bind_param('s',$email);
		$stmt->execute();
		$result= $stmt->get_result();
		$userCount = $result->num_rows;
        $stmt->close();
        // var_dump($result);
        // echo $userCount;
        // exit;
        if($userCount > 0){
            return $userCount;
           
	    }
        return 0;
    }

    public function createUSer($data)
    {
        $value = 0;
        $username = mysqli_real_escape_string($this->conn, $data[0]);
        $email = mysqli_real_escape_string($this->conn, $data[1]);
        $password= mysqli_real_escape_string($this->conn, $data[2]);
        $token = mysqli_real_escape_string($this->conn, $data[3]);
        $verified = mysqli_real_escape_string($this->conn, $data[4]);
        
        $sql = "INSERT INTO $this->table (name, email, verified, token, password) VALUES  (?,?,?,?,?)";
		$stmt = $this->conn->prepare($sql);

        $stmt->bind_param('ssiss',$username, $email, $verified, $token, $password);
        
        if ($stmt->execute()) {
            $value = 1;
        }

        return $value;
    }
    
    public function verify($token)
    {
        $sql= "SELECT * FROM $this->table WHERE token ='$token' LIMIT 1";
		$result = mysqli_query($this->conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			
			$user = mysqli_fetch_assoc($result);
			$update_query="UPDATE user SET verified=1 WHERE token='$token'";

			if (mysqli_query($this->conn, $update_query)) {
                
				return $user;
			}
		}else{
			return 0;
		}
    }

    public function frogot($email)
    {
        // echo $email;
        $sql= "SELECT * FROM $this->table WHERE email= ? LIMIT 1";
		$stmt = $this->conn->prepare($sql);
		$stmt->bind_param('s',$email);
		$stmt->execute();
		$result= $stmt->get_result();
		$user = $result->fetch_assoc();
        return $user;
        // echo $mysqli_stmt->error;
        

    }

   public function resetPw($password , $token)
   {
    $sql="UPDATE $this->table SET password ='$password' WHERE token='$token'";
    $result = mysqli_query($this->conn, $sql);
    
    if ($result) {
        return 1;
    }else{
        return 0;
    }
   }
}
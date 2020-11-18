<?php 

class Image{

    private $table = "room_image";
    public $conn;
    
    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
    public function upload($room_number, $fileNewName , $path)
    {
        // echo $path;
        // exit();
        $sql = "INSERT INTO $this->table (room_number, image_name, image_path) VALUES('$room_number', '$fileNewName', '$path')";
        // echo $sql;
        // exit();
         if (mysqli_query($this->conn, $sql)) {
             return 1;
            echo "New record created successfully";
        } else {
            return 0;
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
            exit();
        }
    }

    public function view($room_number)
    {
        $sql = "SELECT * FROM $this->table WHERE $this->table.room_number = '{$room_number}'";
        $result = mysqli_query($this->conn, $sql);
        $room_img= mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        // echo '<pre>' , var_dump($room_img) , '</pre>';
        // exit();


        if(!count($room_img)==0) {
            return $room_img;
            
        }
        else {
            // echo "Database Query Failed";
            return $room_img;
        }  
        
    }

    public function viewRoom()
    {
        $sql = "SELECT * FROM $this->table ";
        $result = mysqli_query($this->conn, $sql);
        $room_img= mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        // echo '<pre>' , var_dump($room_img) , '</pre>';
        // exit();


        if(!count($room_img)==0) {
            return $room_img;
            
        }
        else {
            // echo "Database Query Failed";
            return $room_img;
        }  
        
    }

    public function imageExists($room_number, $image_name)  
    {
        $sql = "DELETE FROM $this->table WHERE room_number ='$room_number' AND image_name = '$image_name' ";
        if (mysqli_query($this->conn, $sql)) {
            return 1;
           echo "New record created successfully";
       } else {
           return 0;
           echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
           exit();
       }
    }


    
}


?>
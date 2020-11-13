<?php 

class Image{

    private $table = "img";
    public $conn;
    
    public function __construct() {
        
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname = 'bayfront_hotel';

        $this->conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
    public function upload($fileNewName , $path)
    {
        echo $path;
        // exit();
        $sql = "INSERT INTO $this->table (name, dir) VALUES('$fileNewName' , '$path')";
        // echo $sql;
        // exit();
         if (mysqli_query($this->conn, $sql)) {
             return 1;
            echo "New record created successfully";
        } else {
            return 0;
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    public function view()
    {
        $sql = "SELECT * FROM img ";
        $result = mysqli_query($this->conn, $sql);
        while($room= mysqli_fetch_row($result)){
            // echo '<pre>' , var_dump($room) , '</pre>';
            $list = $room;
       
        }
        // exit();
        // echo '<pre>' , var_dump($list) , '</pre>';
        return $list;


        if($result) {
            
            mysqli_fetch_row($result);
        }
        else {
            echo "Database Query Failed";
        }  
        $imageList =array();
        $i=0;
        while ( $room = mysqli_fetch_assoc($result)) {
            // var_dump($room);
            // exit();
            // return $room;
            // echo "<img src='{$room['dir']}'  width='40%'>";
            

        }
       
        exit();
    }
}


?>
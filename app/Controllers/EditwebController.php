<?php 
session_start();
class EditwebController{

    public function index() {
        

        //Checking if a user is logged in
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();      
        }
        else {
            $data = array();
            // $db = new Employee;
            $db = new RoomEdit();

            if(isset($_POST['search'])) {
                $search = $_POST['search'];
                $data['rooms'] = $db->getSearchRoom($search);
                //echo 'Error1';
                view::load('dashboard/editweb/index', $data);
            }
            else {
                $data['rooms'] = $db->getAllRoom();
        
                view::load('dashboard/editweb/index', $data);
            }
            
            
        }



    }

    public function selectChange($room_number) {
    
        
        $data['room_number']= $room_number;
        // exit();
        view::load('dashboard/editweb/selectChange', $data);
    }




    public function changeDetails($room_number) {
    
        $db = new RoomDetails();
        $result = $db->getOneRoomView($room_number);
        // var_dump($result);
        $data['room_details'] = $result; 
        view::load('dashboard/editweb/changeDetails', $data);
    }

    public function createNew() {
       
        if(!isset($_SESSION['user_id'])) {
            view::load('dashboard/dashboard');    
        }

        else {
            

            $data['room'] = array("room_number"=>"", "room_name"=>"", "type_id"=>"", "room_desc"=>"", "price"=>"", "room_view"=>"", "floor_type"=>"", "room_size"=>"", "air_condition"=>"", "free_canseleration"=>"", "hot_water"=>"", "breakfast_included"=>"");
            view::load('dashboard/editweb/newRoom', $data);

        }
    }

    public function create() {

        if(!isset($_SESSION['user_id'])) {
            view::load('dashboard/dashboard');    
        }
        else {

            if(isset($_POST['submit'])){
                // echo '<pre>', print_r($_POST) ,'</pre>';
                // exit();
                $room_number= $_POST['room_number'];
                $room_name = $_POST['room_name'];
                $type_name = $_POST['type_name'];
                $room_desc = "SDfdsfsf";
                $room_view = $_POST['room_view'];
                $floor_type = $_POST['floor_type'];
                $room_size = $_POST['room_size'];
                $price = floatval($room_size);
                $price = $_POST['price'];
                $price = floatval($price);
                $air_condition = $_POST['air_condition'];
                $free_canseleration = $_POST['free_canseleration'];
                $hot_water = $_POST['hot_water'];
                $breakfast_included = $_POST['breakfast_included'];

                
                // var_dump($air_condition);
                // exit();
    
                
                //  if(isset($_POST['air_condition'])){
                //     $air_condition =1;
                //  }else{
                //     $air_condition = 0;
                //  }
    
                // if(isset($_POST['free_canseleration'])){
                //     $free_canseleration =1;
                // }else{
                //     $free_canseleration = 0;
                // }
    
                // if(isset($_POST['hot_water'])){
                //     $hot_water =1;
                // }else{
                //     $hot_water = 0;
                // }
    
                // if(isset($_POST['breakfast_included'])){
                //     $breakfast_included =1;
                // }else{
                //     $breakfast_included = 0;
                // }
    
                //validate room number
                if (preg_match( "/[A-Z][0-9]{3}/", $room_number)) {
    
                    if($floor_type == $room_number[1]){
                        
                        $floor_type = $floor_type + 65;
                        $floor_letter =chr( $floor_type);
                        // var_dump($floor_type);
                        // echo $floor_type;
                        // exit();
                        if (($room_number[0] == $floor_letter)  ) {
                            $db = new RoomEdit;
                            if ($db->serchRoom($room_number) == 1) {

                                $errors['room_number'] = 'Room number already exist';
                                
                            }
    
                        }else{
                            $errors['room_number'] = 'Floor type not match';
                            
                        }
                    }else{
                        $errors['room_number'] = 'Floor type not match';
                        
                    }
                }else{
                    $errors['room_number'] = 'Invalid room number';
                    
                }
                
                if(preg_match("/^\d+(\.\d{2})?$/" , $price)){
                    $errors['price'] = 'Entered Price is Invalid';
                }
                if(preg_match("/^\d+(\.\d{2})?$/" , $room_size)){
                    $errors['room_size'] = 'Entered Room Size is Invalid';
                }


                // $errors = array_filter( $errors ); 
            
                if(count( $errors ) == 0) {

                    $file = $_FILES['imgfile'];
                    // print_r($file);
                    // exit();
                
                    $filename = $_FILES['imgfile']['name'];
                    $filetmp_name = $_FILES['imgfile']['tmp_name'];
                    // echo  $filetmp_name;
                    // exit();
                    $filesize = $_FILES['imgfile']['size'];
                    $fileerror = $_FILES['imgfile']['error'];
                    $filetype = $_FILES['imgfile']['type'];
                
                    $fileExt = explode('.', $filename);
                    $fileActualExt = strtolower(end($fileExt));
                    // echo $fileActualExt;
                    $allowed = array('jpg', 'jpeg', 'png' );
                
                    if (in_array($fileActualExt, $allowed)) {
                        if ($fileerror === 0) {
                            if ($filesize < 1000000) {
                                $fileNewName = "image_01".".".$fileActualExt;
                                if (!file_exists(__DIR__.'/../../public/uploads/'.$room_number)) {
                                    mkdir(__DIR__.'/../../public/uploads/'.$room_number, 0777, true);
                                    // rmdir(__DIR__.'/../../public/uploads/A006');
                                }
                                $path =   __DIR__.'/../../public/uploads/'.$room_number.'/'.$fileNewName;
                                // echo $path;
                                // exit();
                                $db = new RoomEdit;
                
                                $updateDetails = $db->createRoom( $room_number, $type_name, $room_name, $room_desc, $floor_type, $room_size, $price, $room_view,  $air_condition, $free_canseleration, $hot_water ,$breakfast_included);
                    
                                $db = new Image();
                                if ($db->upload($room_number, "image_01" ,  $path)){
                                    move_uploaded_file($filetmp_name, $path);
                                    $data['errors'] = $errors;
                                    $db = new RoomEdit;
                                    $data['rooms'] = $db->getAllRoom();
                                    view::load('dashboard/editweb/index', $data);
        
                                }else{
                                    echo "noo";
                                }
                            }else{
                                echo "Your file too big";
                            }
                        }else{
                            echo "There was an error";
                        }
                    }else{
                        echo "Cant allowed";
                    }
                    

                }

                else {
                    $data['errors'] = $errors;
                    $data['room'] = array("room_number"=>$room_number, "room_name"=>$room_name, "type_id"=>$type_name, "room_desc"=>$room_desc, "price"=>$price, "room_view"=>$room_view, "floor_type"=>$floor_type, "room_size"=>$room_size, "air_condition"=>$air_condition, "free_canseleration"=>$free_canseleration, "hot_water"=>$hot_water, "breakfast_included"=>$breakfast_included);
                    view::load('dashboard/editweb/newRoom', $data);
                }
                
            }
        }

    }


    public function update() {
        if(!isset($_SESSION['user_id'])) {
            view::load('dashboard/dashboard');    
        }
        else {

            if(isset($_POST['submit'])) {
                $errors = array();
            
            //$errors = $this->validation();

                $room_number= $_POST['room_number'];
                $room_name = $_POST['room_name'];
                $type_name = $_POST['type_name'];
                $room_desc = "SDfdsfsf";
                $room_view = $_POST['room_view'];
                $floor_type = $_POST['floor_type'];
                $room_size = $_POST['room_size'];
                $price = floatval($room_size);
                $price = $_POST['price'];
                $price = floatval($price);
                $air_condition = $_POST['air_condition'];
                $free_canseleration = $_POST['free_canseleration'];
                $hot_water = $_POST['hot_water'];
                $breakfast_included = $_POST['breakfast_included'];

            // Checking max length
            $max_len_fields = array('room_number' => 50, 'room_name' => 100, 'type_name' => 100, 'room_view' => 20, 'floor_type' => 2, 'room_size' => 10, 'price' => 5);
            $errors = array_merge($errors, $this->check_max_len($max_len_fields));
            // echo "Tharindu";

            if($room_size == 0.00) {
                // echo "Tharindu";
                $errors['room_size'] = "Room Size is empty";
            }
            if($price == 0.00) {
                $errors['price'] = "Room Price is empty";
            }

            $errors = array_filter( $errors ); 
            
            if(count( $errors ) == 0) {
                $db1 = new RoomDetails();
                $room_datails = $db1->getOneRoomView($room_number);
                // var_dump($room_datails);
                $room_id = $room_datails[0]['room_id'];

                $db = new RoomEdit;
            
                $updateDetails = $db->updateRoom($room_id, $room_number, $type_name, $room_name, $room_desc, $floor_type, $room_size, $price,  $air_condition, $free_canseleration, $hot_water);


                if($updateDetails == 1){

                    $data['room_details'] = $db1->getOneRoomView($room_number); 
                    // $errors['email'] = 'Email address already use other';
                    // $data['errors'] = $errors['email'];
                    $data['success'] = array("success"=> "Update Success"); 
                    view::load("dashboard/editweb/changeDetails", $data);
                }
                else {
                    // Query failed
                }
            }
            else {
                $db1 = new RoomDetails();
                $data['room_details'] = $db1->getOneRoomView($room_number); 
                $data['errors'] = $errors;
                    view::load("dashboard/editweb/changeDetails", $data);
            }

            
            }
        }    

    }

    public function delete($room_id , $room_number)
    {
        
        $db = new RoomEdit;
        if($db->deleteRoom($room_id)){
            $db = new RoomEdit;
            $data['rooms'] = $db->getAllRoom();
            if (file_exists(__DIR__.'/../../public/uploads/'.$room_number)) {
                // mkdir(__DIR__.'/../../public/uploads/'.$room_number, 0777, true);
                array_map('unlink', glob(__DIR__.'/../../public/uploads/'.$room_number.'/*.*'));
                rmdir(__DIR__.'/../../public/uploads/'.$room_number);
            }
            // $_POST = array();
            view::load('dashboard/editweb/index', $data);
        }

    }

    private function check_req_fields($req_fields) {
        
        $errors = array();

        foreach($req_fields as $field) {
            if(empty(trim($_POST[$field]))) {
                $errors[$field] = ' is required';
            }
        }

        return $errors;
    }

    private function check_max_len($max_len_fields) {
        // Check max lengths
        $errors = array();
    
        foreach($max_len_fields as $field => $max_len) {
            if(strlen(trim($_POST[$field])) > $max_len ) {
                $errors[$field] = ' must be less than ' . $max_len . ' characters';
            }
        }
    
        return $errors;
    }
    
    private function is_email($email) {
        return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i" ,$email));
    }

    private function is_valid($text) {
        return(preg_match("/^([a-zA-Z' ]+)$/", $text));
    }

    private function is_num($num) {
        return(preg_match('/^[0-9]+$/', $num));

    }
    
}

?>
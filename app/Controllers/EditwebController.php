<?php 
session_start();
class EditwebController{

    public function index()
    {
   
        $db = new RoomEdit;
        
        $data['rooms'] = $db->getAllRoom();
        
        view::load('dashboard/editweb/index', $data);

    }

    public function selectChange($roomId)
    {
        
        $data['room_id']= $roomId;
        // exit();
        view::load('dashboard/editweb/selectChange', $data);
    }

    public function changeDetails($room_number)
    {
        $db = new RoomDetails();
        $data['room_details'] = $db->getOneRoomView($room_number); 
        
        view::load('dashboard/editweb/changeDetails', $data);
    }

    public function createNew()
    {
        view::load('dashboard/editweb/newRoom');
    }

    public function create()
    {
        if(isset($_POST['submit'])){
            // echo '<pre>', print_r($_POST) ,'</pre>';
            // exit();
            $room_number= $_POST['room_number'];
            $room_name = $_POST['room_name'];
            $type_name = $_POST['type_name'];
            $room_desc = $_POST['room_desc'];
            $room_view = $_POST['room_view'];
            $floor_type = $_POST['floor_type'];
            $room_size = $_POST['room_size'];
            $price = floatval($room_size);
            $price = $_POST['price'];
            $price = floatval($price);
            // var_dump($price);
            // exit();

            
             if(isset($_POST['air_condition'])){
                $air_condition =1;
            }else{
                $air_condition = 0;
            }

            if(isset($_POST['free_canseleration'])){
                $free_canseleration =1;
            }else{
                $free_canseleration = 0;
            }

            if(isset($_POST['hot_water'])){
                $hot_water =1;
            }else{
                $hot_water = 0;
            }

            if(isset($_POST['breakfast_included'])){
                $breakfast_included =1;
            }else{
                $breakfast_included = 0;
            }

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
                        if ($db->serchRoom($room_number)) {
                            $errors['room_number'] = 'Room number already exist';
                        }

                    }else{
                        $errors['room_number'] = 'Room number and Floor number not match';
                    }
                }else{
                    $errors['room_number'] = 'Room number and Floor number not match';
                }
            }else{
                $errors['room_number'] = 'Invalid room number';
            }
            // $price = floatval($price);
            // echo $price;
            // if (preg_match("/^\s*[+\-]?(?:\d+(?:\.\d*)?|\.\d+)\s*$/", $price)) {
            //     echo "feds";
               
            // }
            // var_dump($_FILES["imgfile"]);
            // exit;
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
            echo "fedssssssssssssssss";
            exit;
            $a = !file_exists(__DIR__.'/../../public/uploads/A006');
            echo  $a;
            if (file_exists(__DIR__.'/../../public/uploads/A006')) {
                // mkdir(__DIR__.'/../../public/uploads/A006', 0777, true);
                rmdir(__DIR__.'/../../public/uploads/A006');
            }
            
        }
    }
    public function update($room_id)
    {
        if(isset($_POST['submit'])){
            
            // echo '<pre>', print_r($_POST) ,'</pre>';
            // exit();
            // Validation
            $errors = array();
            
            //$errors = $this->validation();

            $room_number= $_POST['room_number'];
            $room_name = $_POST['room_name'];
            $type_name = $_POST['type_name'];
            $room_desc = $_POST['room_desc'];
            $floor_type = $_POST['floor_type'];
            $room_size = $_POST['room_size'];
            $room_size = floatval($room_size);
            $price = $_POST['price'];
            $price = floatval($price);
            // var_dump($price);
            // exit();

             // Check input is empty
            //  $req_fields = array('room_number', 'room_name', 'room_desc', 'floor_type', 'room_size', 'price');
            //  $errors = array_merge($errors, $this->check_req_fields($req_fields));
            
             if(isset($_POST['air_condition'])){
                $air_condition =1;
            }else{
                $air_condition = 0;
            }

            if(isset($_POST['free_canseleration'])){
                $free_canseleration =1;
            }else{
                $free_canseleration = 0;
            }

            if(isset($_POST['hot_water'])){
                $hot_water =1;
            }else{
                $hot_water = 0;
            }

            // Checking max length
            // $max_len_fields = array('room_number' => 4, 'floor_type' => 1);
            // $errors = array_merge($errors, $this->check_max_len($max_len_fields));

            
          
            $db = new RoomEdit;
        
            $updateDetails = $db->updateRoom($room_id, $room_number, $type_name, $room_name, $room_desc, $floor_type, $room_size, $price,  $air_condition, $free_canseleration, $hot_water);

            if($updateDetails){
                $db = new RoomDetails();
                $data['room_details'] = $db->getOneRoomView($room_number); 
                $errors['email'] = 'Email address already use other';
            $data['errors'] = $errors['email'];
            
;                view::load("dashboard/editweb/changeDetails", $data);
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
            view::load('dashboard/editweb/index', $data);
        }
    }
    
}

?>
<?php 

session_start();
class ImageController {

    public function uploadImg($image_name , $room_number) {

        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();      
        }
        else {
            if(isset($_POST['submit'])){
                $file = $_FILES['file'];
                // print_r($file);
                // exit();
            
                $filename = $_FILES['file']['name'];
                $filetmp_name = $_FILES['file']['tmp_name'];
                // echo  $filetmp_name;
                // exit();
                $filesize = $_FILES['file']['size'];
                $fileerror = $_FILES['file']['error'];
                $filetype = $_FILES['file']['type'];
            
                $fileExt = explode('.', $filename);
                $fileActualExt = strtolower(end($fileExt));
                // echo $fileActualExt;
                $allowed = array('jpg', 'jpeg', 'png' );
            
                if (in_array($fileActualExt, $allowed)) {
                    if ($fileerror === 0) {
                        if ($filesize < 1000000) {
                            $fileNewName = $image_name.".".$fileActualExt;
                            $path =   __DIR__.'/../../public/uploads/'.$room_number.'/'.$fileNewName;
                            // echo $path;
                            // exit();
                            if (file_exists(__DIR__.'/../../public/uploads/'.$room_number.'/'.$fileNewName)) {
                                $db = new Image();
                                if ($db->imageExists($room_number, $image_name)) {
                                    unlink(__DIR__.'/../../public/uploads/'.$room_number.'/'.$fileNewName);
                                    unset($db);
                                }
                                
                            }
                            $db = new Image();
                            if ($db->upload($room_number, $image_name ,  $path)){
                                move_uploaded_file($filetmp_name, $path);
                                $this->viewImg($room_number);
    
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
        }    

        
        
        
    }

    public function viewImg($room_number)
    {
     
        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();      
        }
        else {
            $db = new Image();
            $imageRoom =$db->view($room_number);
            // var_dump($imageRoom);
            $data['room_number'] = $room_number;
            $data['img_details'] = $imageRoom;

            // echo '<pre>' , var_dump($data['img_details']) , '</pre>';
            // exit();
            view::load('dashboard/editweb/changeImage', $data);
            // exit();
            if(!count($imageRoom)== 0){
                //  echo "fbjk";
                // echo $imageRoom['dir'];
                // echo $data['path'];
                // exit();     

                // view::load('dashboard/editweb/changeImage');
            }
        }    
        

            
        // $data['room_id']= $roomId;
        
    }

    public function deleteImg( $room_number , $image_name) {

        if(!isset($_SESSION['user_id'])) {
            $dashboard = new DashboardController();
            $dashboard->index();      
        }
        else {
            if (file_exists(__DIR__.'/../../public/uploads/'.$room_number.'/'.$image_name)) {
                $img = explode('.',$image_name);
                $img= current($img);
                $db = new Image();
                if ($db->imageExists($room_number, $img)) {
                    unlink(__DIR__.'/../../public/uploads/'.$room_number.'/'.$image_name);
                    unset($db);
                    $this->viewImg($room_number);
                }
            }
        }    
        
        

    }
}

?>
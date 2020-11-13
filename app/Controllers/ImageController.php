<?php 

class ImageController {

    public function uploadImg()
    {

        
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
                        $fileNewName = uniqid('', true).".".$fileActualExt;
                        $path =   __DIR__.'/../../public/uploads/'.$fileNewName;
                        // echo $path;
                        // exit();
        
                        $db = new Image();
                        if ($db->upload($fileNewName ,  $path)){
                            move_uploaded_file($filetmp_name, $path);
                            echo "ss";
                            exit();

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

    public function index($roomId)
    {
     

        $db = new Image();
        $imageRoom =$db->view();
        // var_dump($imageRoom);
       
        // exit();
        if(!count($imageRoom)== 0){
            //  echo "fbjk";
            // echo $imageRoom['dir'];
            // echo $data['path'];
            // exit();     

            view::load('dashboard/editweb/changeImage');
        }

            
        // $data['room_id']= $roomId;
        
    }
}

?>
<?php 
session_start();

class LoginController {

    public function log() {
        
        if(isset($_POST['submit'])) {
            // Validation
            $errors = array();
            
            $errors = $this->validation();

            if(empty($errors)) {
                
                $db = new login();
                // avoid sql injection
                $data = array();
                $data2 = array();
                $data[] = $_POST['email'];
                $data[] = $_POST['password'];
                
                $data2 = $db->avoidSqlInjection($data);
                
                $email = $data2[0];
                $password = $data2[1];

                $hashed_password = sha1($password);
                $user = $db->getOwner($email, $hashed_password); 

                if(empty($user)) {
                    $emp_user = $db->getUserID($email);
                    if(empty($emp_user)) {
                        $errors[] = "Invaild User";
                        $dashboard = new DashboardController();
                        $dashboard->index2($errors);
                    }
                    else {
                        $emp_id = $emp_user['emp_id'];
                        $user = $db->getReception($emp_id, $hashed_password);

                        if(empty($user)) {
                            // echo "Invalid User";
                            $errors[] = "Invaild User";
                            // $data['errors'] = $errors;
                            $dashboard = new DashboardController();
                            $dashboard->index2($errors);
                            // view::load('dashboard/dashboard', $data);
                        }
                        else {
                            $_SESSION['user_id'] = $user['reception_user_id'];
                            $_SESSION['username'] = $user['username'];
                            $_SESSION['user_level'] = "Reception";
                            $dashboard = new DashboardController();
                            $dashboard->index();
                            // view::load('dashboard/dashboard');
                        }
                    }

                }
                else {
                    $_SESSION['user_id'] = $user['owner_user_id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['user_level'] = "Owner";
                    $dashboard = new DashboardController();
                    $dashboard->index();
                    // view::load('dashboard/dashboard');
                    
                }    
            }
            else {
                // echo "Error";
                
                // view::load('dashboard/dashboard');
                // $data['errors'] = $errors;
                // view::load('dashboard/dashboard', $data);
                $dashboard = new DashboardController();
                $dashboard->index2($errors);
            }
        }
        // var_dump($errors);
        
        // var_dump($data);
        
        // view::load('dashboard/inc/test', $data);
    }

    public function logout() {
        if(isset($_POST['submit'])) {
            if(isset($_COOKIE[session_name()])) {
                //setcookie(session name, value, expired time, affect side)
                setcookie(session_name(), '', time()-86400, '/');  //86400s and / mean root folder
            }
            session_unset();
            session_destroy();
        
            // view::load('dashboard/dashboard');
            $dashboard = new DashboardController();
            $dashboard->index();
        
        }
    }

    private function validation() {
        $errors = array();
        if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
            $errors[] = 'Email is Missing';  
        }

        if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
            $errors[] = 'Password is Missing';    
        }

        if(!$this->is_email($_POST['email'])) {
            $errors[] = 'Email address is Invalid';
        }

        return $errors;
    }
    
    private function is_email($email) {
        return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i" ,$email));
    }
    
}
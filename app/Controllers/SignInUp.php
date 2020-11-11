<?php 
session_start();

class SignInUpController {

    public function index() {
        view::load('login');
    }

    public function signin() {
        if(isset($_POST['signin-btn'])) {
            // Validation
            $errors = array();
            
            $errors = $this->validation();

            if(empty($errors)) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                $db = new loginWeb();

                // $hashed_password = sha1($password);

                $user = $db->getCustomer($email, $password); 

                if(!empty($user)) {

                    $_SESSION['id']= $user['id'];
					$_SESSION['username']= $user['name'];
					$_SESSION['email']= $user['email'];
					$_SESSION['verified']= $user['verified'];
					$_SESSION['usertype']= $user['userType'];
					$_SESSION['message']= "You are now logged in";
                    $_SESSION['alert-class']= "alert-succes";
                    $data['errors'] = $errors;
                    // view::load('home',$data);
                }

                else {
                    $errors['login_fail']= "wrong credentials";
                    $data['errors'] = $errors;
                    // view::load('home',$data);
                }    
            }
            else {
                $data['errors'] = $errors;
                // view::load('home',$data);
            }
        }
    }

    public function signup() {
        if(isset($_POST['signin-btn'])) {
            // Validation
            $errors = array();
            
            $errors = $this->validationUp();

            //Check email address is already exists
            $db = new LoginWeb();
            $result = $db->getEmail($_POST['email']);

            if($result == 1) {
                $errors['email'] = 'Email address already exists';
            }


            if(empty($errors)) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $passwordConf = $_POST['passwordConf'];
                $password = password_hash($password, PASSWORD_DEFAULT);
                $token = bin2hex(random_bytes(50));
                $verified = false;
                $db = new loginWeb();
                
                $data = array($username, $email, $password, $token, $verified);
                $result = $db->getCreate($data);

                if($result == 1) {
                    //$user_id = $conn->insert_id;
                    //$_SESSION['id']= $user_id;
                    $_SESSION['username']= $username;
                    $_SESSION['email']= $email;
                    $_SESSION['verified']= $verified;

                    // have to do 
                }
                
               
            }
            else {
                echo "Error";
                var_dump($errors);
            }
        }
        view::load('dashboard/dashboard');
    }
    
    private function validation() {

        $errors = array();
        if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
            $errors['email'] = 'Email is Missing';  
        }

        if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
            $errors['password'] = 'Password is Missing';    
        }

        if(!$this->is_email($_POST['email'])) {
            $errors['email'] = 'Email address is Invalid';
        }
        

        return $errors;
    }

    private function validationUp() {

        if(!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1 ) {
            $errors['username'] = 'Password is Missing';    
        }

        $errors = array();
        if(!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
            $errors['email'] = 'Email is Missing';  
        }

        if(!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
            $errors['password'] = 'Password is Missing';    
        }

        if(!$this->is_email($_POST['email'])) {
            $errors['email'] = 'Email address is Invalid';
        }
        // if(!filter_var($_POST['email']), FILTER_VALIDATE_EMAIL)){
        //     $errors['email']= "Email adress is invalid";
        // }  
        // this is done by above methods
        if(!$this->checkpassword($_POST['password'])) {
            $errors['password'] = 'password required capital, simple 8 letter';
        }

        if($_POST['password'] === $_POST['passwordConf']) {
            $errors['password'] = 'password doesn\'t match';
        }

        return $errors;
    }
    
    private function is_email($email) {
        return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i" ,$email));
    }

    private function checkpassword($password) {
        return((preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,}$/',$password)));
    }
    
}
<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
// session_start();


class AuthController {

	

	public function signinUser(){
		
		$errors =array();
		$username= "";
		$email= "";
		
		if (isset($_POST['signin-btn'])){
			// var_dump($_POST);

			$email = $_POST['email'];
			$password = $_POST['password'];
			
			$errors = $this->validationSignin();
		
			// var_dump($errors);
			// exit;
			if(empty($errors)){

				$db = new Signin();
				
				$user = $db->getUser($email, $password); 
				
				if(!empty($user)) {

					$_SESSION['id']= $user['id'];
					$_SESSION['nameuser']= $user['name'];
					$_SESSION['email']= $user['email'];
					$_SESSION['verified']= $user['verified'];
					$_SESSION['usertype']= $user['userType'];
					$_SESSION['message']= "You are now logged in";
					$_SESSION['alert-class']= "alert-succes";

					$data['errors'] = $errors;
					// setcookie('email', $user['email'], time()+60*60*7 );
					view::load('home', $data);
					exit();

				}else{
					$errors['login_fail']= "You have entered an invalid username or password";
					$data['errors'] = $errors;
                    view::load('login/login',$data);
				}
			}else{
				$data['errors'] = $errors;
			
				// var_dump($data);
				
                view::load('login/login',$data);
			}
		}
	}
	private function validationSignin() {

        $errors = array();
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$errors['email']= "Email adress is invalid";
		}
		if(empty($_POST['email'])){
			$errors['email']="email required";
		}
		if(empty($_POST['password'])){
			$errors['password']="password required";
		}

		return $errors;
        
	}

	public function signupUser()
	{
		if (isset($_POST['signup-btn'])){
			
			$errors = $this->validationSignup();

			
			if(count($errors)== 0){

				$username = $_POST['username'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$passwordConf = $_POST['passwordConf'];

				$password = password_hash($password, PASSWORD_DEFAULT);
				$token = bin2hex(random_bytes(50));
				$verified = false;

				$data =array($username, $email, $password, $token ,$verified);

				$db = new Signin();
		   
				$result = $db->createUser($data);
				
				if ($result == 1) {
					
					// $user_id = $conn->insert_id;
					// $_SESSION['id']= $user_id;
					$_SESSION['username']= $username;
					$_SESSION['email']= $email;
					$_SESSION['verified']= $verified;

					$sendMail = new EmailController;
		
					$sendMail->sendVerificationEmail($email, $token, $username);
		
					$_SESSION['message']= "You are now logged in";
					$_SESSION['alert-class']= "alert-succes";
					// echo $_SESSION['username'];
					view::load('login/email-verify');
					unset($sendMail);
					exit();
					 
		
				}else{
					// echo $stmt->error;
					$errors['db_error']= "Database error: faild to register";
				}
			}else{
				// var_dump($errors);
				// $data['id'] = 1;	
				$data['errors'] = $errors;
				view::load('login/signup', $data);
			}
		
		}
		
	}

	
	
	private function validationSignup() {
		$errors =array();

        if(empty($_POST['username'])){
			$errors['username']="username required";
		}
	
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$errors['email']= "Email adress is invalid";
		}
		if(empty($_POST['email'])){
			$errors['email']="email required";
		}
	
		if(empty($_POST['password'])){
			$errors['password']="password required";
		}
		if(!(preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,}$/',$_POST['password']))){
			$errors['password']="A minimum 8 characters password contains a combination of uppercase and lowercase letter and number are required.";
		}
		if($_POST['password'] !== $_POST['passwordConf']){
			$errors['password']="password does not match";
		}
		$db = new Signin();
		   
		$result = $db->findEmail($_POST['email']);

            if($result == 1) {
                $errors['email'] = 'that email is already registered!';
			}
		unset($db);
		return $errors;
	}
	
	public function logout()
	{
		
		
			unset($_SESSION['id']);
			unset($_SESSION['nameuser']);
			unset($_SESSION['email']);
			unset($_SESSION['verified']);
			view::load('home');
			exit();
		
	}

	public function verifyUser($token)
	{
		

			$db = new Signin();
			$user = $db->verify($token);
			// var_dump($user);

			if (!empty($user)) {
				$_SESSION['id']= $user['id'];
				$_SESSION['username']= $user['name'];
				$_SESSION['username']= $user['name'];
				
				$_SESSION['verified']= 1;

				$_SESSION['message']= "You are now verified user";
				$_SESSION['alert-class']= "alert-succes";
				

			}else{
				echo "not found";
			}

			unset($db);
	}

	public function frogotUser()
	{
		if (isset($_POST['frogot-password'])) {
			
			$errors =array();
			$email = $_POST['email'];
		
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors['email']= "Invalid Email Address";
			}
			if(empty($email)){
				$errors['email']="That address is not a verified primary email or is not associated with a personal user account. Organization billing emails are only for notifications";
			}

			$db = new Signin();
		   
			$result = $db->findEmail($_POST['email']);

				if($result == 0) {
					$errors['email'] = 'that email is not registered!';
				}
			unset($db);
		
			if(count($errors)== 0){
				
				$db = new Signin();
				$user = $db->frogot($email);

				$token= $user['token'];
				$userName = $user['name'];

				$sendMail = new EmailController;
				
				$sendMail->sendPasswordResultLink($email, $token, $userName);
				$data['email']= $email;
				view::load('login/password_message', $data);
				unset($sendMail);
				exit();
		
			}else{
				$data['errors'] = $errors;
            	View::load('login/frogot', $data);
			}

				
			
		
		}
	}

	public function resetPassword($token)
	{
		
		$db = new Signin();
		$user = $db->verify($token);
		$data['errors']= [];
		$data['token'] =$token;
		View::load('login/reset_password',$data);
	}

	public function resetUserPassword($token)
	{
		// echo $token;
		// exit;
		if (isset($_POST['reset-btn'])) {
			$errors =array();
			$password= $_POST['password'];
			$passwordConf= $_POST['passwordConf'];
		
			if(empty($password)){
				$errors['password']="password required";
			}
			if(!(preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,}$/',$password))){
				$errors['password']="A minimum 8 characters password contains a combination of uppercase and lowercase letter and number are required";
			}
			if($password !== $passwordConf){
				$errors['password']="password does not match";
			}
			$password = password_hash($password, PASSWORD_DEFAULT);
			$email= $_SESSION['email'];
		
			if(count($errors)== 0){
				$db = new Signin();
				$result =$db->resetPw($password , $token);
				if ($result) {
					$data['errors'] =[];
					View::load('login/login',$data);
					exit();
				}
			}else{
				$data['errors'] = $errors;
				View::load('login/reset_password',$data);
			}
		}
		
	}


}
?>
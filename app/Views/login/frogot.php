<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/login.css">
	<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous" ></script>
	<title>Document</title>
</head>
<style>
	ul {
  margin: 0;
  padding: 0;
}
ul li {
  padding: 0;
}

.multi-steps {
  display: table;
  table-layout: fixed;
  width: 800px;
  margin: 30px auto;
}
.multi-steps > li {
  text-align: center;
  display: table-cell;
  position: relative;
  font-size: 18px;
  color: #000;
  letter-spacing: 1px;
  font-weight: 600;
}
.multi-steps > li:before {
  content: "\26AC";
  display: block;
  margin: 0 auto;
  background-color: #fff;
  font-size: 30px;
  font-weight: 600;
  width: 60px;
  height: 60px;
  color: #737272;
  line-height: 60px;
  text-align: center;
  font-weight: bold;
  border-width: 7px;
  border-style: solid;
  border-color: #0088ff;
  border-radius: 50%;
  z-index: 500;
}
.multi-steps > li:after {
  content: "";
  height: 10px;
  width: 250px;
  background-color: #0088ff;
  position: absolute;
  top: 30px;
  z-index: -1;
}
.multi-steps > li:last-child:after {
  display: none;
}
.multi-steps > li.select:before {
  background-color: #000;
  border-color: #000;
  font-family: FontAwesome;
  content: "\f0c1";
  color: #fff;
}
.multi-steps > li.first:before {
  font-family: FontAwesome;
  content: "\f674";
}
.multi-steps > li.second:before {
  font-family: FontAwesome;
  content: "\f0c1";
}
.multi-steps > li.third:before {
  font-family: FontAwesome;
  content: "\f00c";
}

.card {
  /*background: #fff;*/
  border-radius: 2px;
  height: auto;
  padding-top: 20px;
  padding-bottom: 50px;
  margin: 50px auto;
  text-align: center;
  position: relative;
  width: 800px;
  /*z-index: -10;*/
}

.card-3 {
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
}

.btn {
  max-width: 380px;
  width: 100%;
  background-color: #5995fd;
  border: none;
  outline: none;
  height: 49px;
  border-radius: 15px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 600;
  margin: 10px 0;
  cursor: pointer;
  transition: 0.5s;
}

.btn:hover {
  background-color: #4d84e2;
}

.input-field {
  max-width: 380px;
  width: 100%;
  background-color: #fff;
  margin: 10px auto;
  height: 55px;
  border: 2px solid #000;
  border-radius: 10px;
  display: grid;
  grid-template-columns: 15% 85%;
  padding: 0 0.4rem;
  position: relative;
}

.input-field i {
  text-align: center;
  line-height: 55px;
  color: #acacac;
  transition: 0.5s;
  font-size: 1.1rem;
}

.input-field input {
  background: transparent;
  outline: none;
  border: none;
  line-height: 1;
  font-weight: 500;
  font-size: 1.1rem;
  color: #333;
}
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
  -webkit-background-color: transparent;
  transition: background-color 5000s ease-in-out 0s;
}

.alert {
  width: 350px;
  height: auto;
  justify-content: left;
  align-items: center;
  color: red;
  border-radius: 5px;
  padding-left: 10px;
  padding-right: 40px;
  font-size: 15px;
  margin: 0 auto;
  box-shadow: rgba(0, 0, 0, 0.06) 0px 0px 15px;
}
.error.alert {
  border-left: 6px solid #ff0000;
  background: white;
  text-align: left;
}
.error p{
  margin: 5px 2px;
  text-transform: capitalize;
  letter-spacing: 1px;
}


.image {
  width: 300px;
  height: 200px;
  overflow: hidden;
  object-fit: cover;
  margin: 0 auto;
}
.image img {
  width: 500px;
  height: 400px;
  margin: 0 auto;
  margin-left: -100px;
  margin-top: -100px;
}
</style>
<body>

	<div class="card card-3">
		<div class="raw">
			<ul class="list-unstyled multi-steps">
			    <li class="first select"></li>
          <li class="second"></li>
          <li class="third"></li>
			 </ul>
	  </div>
			<form action="<?php url("auth/frogotUser"); ?>" method="post">
          <h1>Reset Your Password</h1>
          <p>Enter your user account's verified email address and we will send you a password reset link.</p>
          
          <?php if(count($errors)>0): ?>
          <?php foreach($errors as $error): ?>
          <div class="alert error" role="alert"><p><i class="fas fa-exclamation-circle"></i><?php echo $error;  ?></p></div>
          <?php endforeach; ?>
          <?php endif;  ?>
         
          <div class="input-field">
	          <i class="fas fa-envelope"></i>
	          <input type="email" name="email" value="<?php //echo $email; ?>" placeholder="Email" />
	          </div>
				  <div class="form-group">
					<button type="submit" name="frogot-password" class="btn">Send Link Reset Email</button>
				  </div>
			</form>
	</div>
	
</body>
</html>
<?php //require_once 'controllers/authControllers.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo BURL.'assets/css/login.css'; ?>">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <title>Sign in & Sign up Form</title>
  </head>
  <body>

    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!-- signin -->
          <form action="<?php url("auth/signinUser"); ?>" method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>

        

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="password"  placeholder="Password" />
            </div>
            <input type="submit" value="Login" name="signin-btn" class="btn solid" />
             <a  class="social-text" href="frogot.php">Frogot Your Password?  </a>  
          
          <!-- signup -->
          </form>
          
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <a href="signup.php"><button class="btn transparent" id="sign-up-btn">
            
              Sign up
            </button></a>
         
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
    </div>
    </div>



  </body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo BURL.'assets/css/login.css'; ?>">
    <script type="text/javascript" src="<?php echo BURL.'assets/js/validateLogin.js'; ?>"></script>
    <title>BAYFRONT SIGNIN</title>
</head>

<body>

    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <!-- signin -->
                <form action="<?php url("auth/signinUser"); ?>" method="post" class="sign-in-form">
                    <h2 class="title">Sign in</h2>


                    <?php //var_dump($errors); ?>
                    <?php if(count($errors)>0): ?>
                    <?php if(isset($errors['email'])): ?>
                    <div class="alert error" id="alert01" role="alert">
                        <p><i class="fas fa-exclamation-circle"></i><?php echo $errors['email'];  ?></p>
                    </div>
                    <?php else:  ?>
                    <div class="alert error" id="alert01" role="alert" style="display:none">
                        <p><i class="fas fa-exclamation-circle"></i></p>
                    </div>
                    <?php endif; ?>
                    <?php else:  ?>
                    <div class="alert error" id="alert01" role="alert" style="display:none">
                        <p><i class="fas fa-exclamation-circle"></i></p>
                    </div>
                    <?php endif;  ?>

                    <div class="input-field" id="input-field-01">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" value="<?php if(isset($email)){ echo $email;} ?>"
                            placeholder="Email" oninput="validateEmail(this, 0,254)" />
                    </div>

                    <?php if(count($errors)>0): ?>
                    <?php if(isset($errors['password'])): ?>
                    <div class=" alert error" id="alert02" role="alert">
                        <p><i class="fas fa-exclamation-circle"></i><?php echo $errors['password'];  ?></p>
                    </div>
                    <?php else:  ?>
                    <div class="alert error" id="alert02" role="alert" style="display:none">
                        <p><i class="fas fa-exclamation-circle"></i></p>
                    </div>
                    <?php endif; ?>
                    <?php else:  ?>
                    <div class="alert error" id="alert02" role="alert" style="display:none">
                        <p><i class="fas fa-exclamation-circle"></i></p>
                    </div>
                    <?php endif;  ?>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" value="<?php if(isset($email)){ echo $password;} ?>"
                            placeholder="Password" oninput="validatePassword(this, 0,50)" />
                    </div>

                    <input type="submit" value="Sign In" name="signin-btn" class="btn solid" />
                    <a class="social-text" href="<?php url('Home/frogetPassword'); ?>">Frogot Your Password? </a>


                    <!-- signup -->
                </form>

            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here BayFront Hotel?</h3>

                    <a href="<?php url('Home/signup'); ?>"><button class="btn transparent" id="sign-up-btn">


                            Sign up
                        </button></a>

                </div>

                <img src="<?php echo BURL.'assets/img/log.svg'; ?>" class="image" alt="" />

            </div>
        </div>
    </div>
    <script>

    </script>
</body>

</html>
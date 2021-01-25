<?php 
   // Header
   $title = "Edit-Reception page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Edit Reception Page";
            $search = 0;
            $search_by = '#';
       
            include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
            include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
    ?>
    
    <!-- Table design -->
    <div class="content">
        <div class="tablecard">
            <div class="card">

                <div class="cardheader">
                    <div class="options">
                        <h4>Edit Reception Details
                        <span>
                            <a href="<?php url("reception/index"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Reception has Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("reception/update"); ?>" method="post" class="addnewform">

                    <div class="section1">

                        <input type="text" name="reception_user_id" value ="<?php echo $reception['reception_user_id']; ?>" hidden  >
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField"
                                    <?php 
                                        if(isset($reception['first_name'])){
                                            echo 'value="' . $reception['first_name'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['first_name'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Last Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="last_name" class="inputField"
                                    <?php 
                                        if(isset($reception['last_name'])){
                                            echo 'value="' . $reception['last_name'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['last_name'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Email Address:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="email" class="inputField"
                                    <?php 
                                        if(isset($reception['email'])){
                                            echo 'value="' . $reception['email'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['email'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Contact Number:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="contact_num" class="inputField"
                                    <?php 
                                        if(isset($reception['contact_num'])){
                                            echo 'value="' . $reception['contact_num'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['contact_num'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">public</i>Address:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="location" class="inputField"
                                    <?php 
                                        if(isset($reception['location'])){
                                            echo 'value="' . $reception['location'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['location'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Username:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="username" class="inputField" 
                                    <?php 
                                        if(isset($reception['username'])){
                                            echo 'value="' . $reception['username'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="WTGihan"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['username'])) && (isset($reception['username']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['username']; ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">enhanced_encryption</i>New Password:</label>
                                <div class="animate-form">
                                    <input type="password"  autocomplete="off" name="password" id="password" class="inputField" 
                                    <?php 
                                        if(isset($reception['password'])){
                                            echo 'value="' . $reception['password'] . '"';
                                        }
                                        else {
                                            echo 'placeholder=""';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['password'])) && (isset($reception['password']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['password']; ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#" class="showpassword"><i class="material-icons">enhanced_encryption</i>Show Password:</label>
                               <input type="checkbox" name="showpassword" id="showpassword">
                        </div>

                        

                        
                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Update</button>
                            </div>
                        </div>
                    </div>

                    <div class="section2"> 

                    </div>


                    </form>
                </div>  <!--End Card Body -->
            </div>  <!--End Card -->

            
        </div>
    </div>   <!-- End Table design -->
    
</div>

<script>
        $(document).ready(function() {
            $('#showpassword').click(function() {
                // Check whether check box is clicked
                if( $('#showpassword').is(':checked')) {
                    $('#password').attr('type', 'text');  // Change the input type password to text
                }
                else {
                    $('#password').attr('type', 'password'); //Change the input type text to password
                }

            });

        });

</script>
    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>




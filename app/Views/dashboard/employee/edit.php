<?php 
   // Header
   $title = "Edit-Employee page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Edit Employee Page";
            $search = 0;
            $search_by = '#';
       
            include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
            include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
    ?>

    <?php 
        if(isset($errors['post'])) {
            echo '<script>alert("'.$errors['post'].'")</script>';
          }
    ?>
    
    <!-- Table design -->
    <div class="content">
        <div class="tablecard">
            <div class="card">

                <div class="cardheader">
                    <div class="options">
                        <h4>Edit Employee 
                        <span>
                            <a href="<?php url("employee/index"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Employee has Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("employee/update/".$employee['emp_id']); ?>" method="post" class="addnewform">

                    <div class="section1">

                        <input type="text" name="owner_user_id" value ="<?php echo $_SESSION['user_id']; ?>" hidden  >
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField" minlength="4" maxlength="20" id="first_name" oninput="validationFirstName()"
                                    <?php 
                                        if(isset($employee['first_name'])){
                                            echo 'value="' . $employee['first_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must Start with Capital letter Min length 4 and Max length 20"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['first_name'])) && (isset($employee['first_name']))){ ?>
                                                <span class="content-name" id="msg_first_name"><i class="material-icons">info</i><?php echo $errors['first_name']; ?></span>
                                            <?php }elseif(isset($success)){ ?>
                                                <span class="content-success" id="msg_first_name"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php } else { ?>
                                                <!-- Real time validation -->
                                                <span class="content-name" id="msg_first_name"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Last Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="last_name" class="inputField" maxlength="20" minlength="4" id="last_name" oninput="validationLastName()"
                                    <?php 
                                        if(isset($employee['last_name'])){
                                            echo 'value="' . $employee['last_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must Start with Capital letter Min length 4 and Max length 20"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['last_name'])) && (isset($employee['last_name']))){ ?>
                                                <span class="content-name" id="msg_last_name"><i class="material-icons">info</i><?php echo $errors['last_name']; ?></span>
                                            
                                            <?php } elseif(isset($success)){ ?>
                                                <span class="content-success" id="msg_last_name"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php } else { ?>
                                                <!-- Real time validation -->
                                                <span class="content-name" id="msg_last_name"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Email Address:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="email" class="inputField" maxlength="30" minlength="10" id="email" oninput="validationEmail()"
                                    <?php 
                                        if(isset($employee['email'])){
                                            echo 'value="' . $employee['email'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must GMAIL Min length 12 and Max length 30"';
                                        } 
                                    
                                    ?>
                                    required
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['email'])) && (isset($employee['email']))){ ?>
                                                <span class="content-name" id="msg_email"><i class="material-icons">info</i><?php echo $errors['email']; ?></span>
                                            
                                            <?php } elseif(isset($success)){ ?>
                                                <span class="content-success" id="msg_email"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php }else { ?>
                                                <!-- Real time validation -->
                                                <span class="content-name" id="msg_email"></span>
                                        <?php } ?>
                                        </label>    
                                </div>     
                        </div>
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">payment</i>Salary:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="salary" class="inputField" maxlength="6" minlength="4" id="salary" oninput="validationSalary()"
                                    <?php 
                                        if(isset($employee['salary'])){
                                            echo 'value="' . $employee['salary'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must Min length 4 and Max length 6"';
                                        } 
                                    
                                    ?>
                                    required
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['salary'])) && (isset($employee['salary']))){ ?>
                                                <span class="content-name" id="msg_salary"><i class="material-icons">info</i><?php echo $errors['salary']; ?></span>
                            
                                            <?php }elseif(isset($success)){ ?>
                                                <span class="content-success" id="msg_salary"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php }else { ?>
                                            <!-- Real time validation -->
                                                    <span class="content-name" id="msg_salary"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">public</i>Address:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="location" class="inputField" maxlength="40" minlength="20" id="location" oninput="validationLocation()"
                                    <?php 
                                        if(isset($employee['location'])){
                                            echo 'value="' . $employee['location'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must Contain Village State and City Min length 20 and Max length 30"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['location'])) && (isset($employee['location']))){ ?>
                                                <span class="content-name" id="msg_location"><i class="material-icons">info</i><?php echo $errors['location']; ?></span>
                                            <?php }elseif(isset($success)){ ?>
                                                <span class="content-success" id="msg_location"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php }else { ?>
                                            <!-- Real time validation -->
                                                    <span class="content-name" id="msg_location"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        

                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Contact Number:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="contact_num" class="inputField" maxlength="10" minlength="10" id="contact_number" oninput="validationContactNumber()"
                                    <?php 
                                        if(isset($employee['contact_num'])){
                                            echo 'value="' . $employee['contact_num'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Must Min length and Max length 10"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['contact_num'])) && (isset($employee['contact_num']))){ ?>
                                                <span class="content-name" id="msg_contact_number"><i class="material-icons">info</i><?php echo $errors['contact_num']; ?></span>
                                           
                                            <?php }elseif(isset($success)){ ?>
                                                <span class="content-success" id="msg_contact_number"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php }else { ?>
                                            <!-- Real time validation -->
                                                <span class="content-name" id="msg_contact_number"></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">military_tech</i>Post:</label>
                                <div class="animate-form">
                                    <select name="post" class="inputField" selected="<?php echo $employee['post']; ?>" required>
                                    <option value="" <?php if ($employee['post'] == "" ) echo ' selected="selected"'; ?> style="border: none">-Select Post-</option>    
                                    <option value="Waiter" <?php if ($employee['post'] == "Waiter" ) echo ' selected="selected"'; ?> style="border: none">Waiter</option> 
                                    <option value="Chef" <?php if ($employee['post'] == "Chef" ) echo ' selected="selected"'; ?> style="border: none">Chef</option> 
                                    <option value="Reception" <?php if ($employee['post'] == "Reception" ) echo ' selected="selected"'; ?> style="border: none">Reception</option> 
                                    <option value="Other" <?php if ($employee['post'] == "Other" ) echo ' selected="selected"'; ?> style="border: none">Other</option> 
                                    </select>    
                                </div>     

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
<script src="<?php echo BURL.'assets/js/main.js'; ?>"></script>
    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>




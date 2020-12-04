<?php 
   // Header
   $title = "Edit-Reception Post page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Edit Post Page";
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
                        <h4>Edit Reception Employee Post 
                        <span>
                            <!-- when new Post isn't similar to Reception -->
                            <?php if($employee['post'] != "Reception") { ?>
                                <a href="<?php url("reception/index"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                            <?php }else { ?>       
                                <a href="<?php url("reception/delete/".$reception['reception_user_id']); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                            <?php }; ?>
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Reception Employee has Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("reception/updatePost/".$employee['emp_id']."/".$reception['reception_user_id']); ?>" method="post" class="addnewform">

                    <div class="section1">

                        <input type="text" name="owner_user_id" value ="<?php echo $_SESSION['user_id']; ?>" hidden  >
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField"
                                    <?php 
                                        if(isset($employee['first_name'])){
                                            echo 'value="' . $employee['first_name'] . '"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($employee['first_name'] == ""){ ?>
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
                                        if(isset($employee['last_name'])){
                                            echo 'value="' . $employee['last_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Gihan"';
                                        } 
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($employee['last_name'] == ""){ ?>
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
                                        if(isset($employee['email'])){
                                            echo 'value="' . $employee['email'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="wtgihan@gmail.com"';
                                        } 
                                    
                                    ?>
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($employee['email'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">public</i>Address:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="location" class="inputField" 
                                    <?php 
                                        if(isset($employee['location'])){
                                            echo 'value="' . $employee['location'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Sri Lanka Galle"';
                                        } 
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($employee['location'] == ""){ ?>
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
                                        if(isset($employee['contact_num'])){
                                            echo 'value="' . $employee['contact_num'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="0778522736"';
                                        } 
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($employee['contact_num'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>     
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">military_tech</i>Post:</label>
                                <div class="animate-form">
                                    <select name="post" class="inputField" selected="<?php echo $employee['post']; ?>" >
                                    <option value="" <?php if ($employee['post'] == "" ) echo ' selected="selected"'; ?> style="border: none">-Select Post-</option>    
                                    <option value="Waiter" <?php if ($employee['post'] == "Waiter" ) echo ' selected="selected"'; ?> style="border: none">Waiter</option> 
                                    <option value="Chef" <?php if ($employee['post'] == "Chef" ) echo ' selected="selected"'; ?> style="border: none">Chef</option> 
                                    <option value="Reception" <?php if ($employee['post'] == "Reception" ) echo ' selected="selected"'; ?> style="border: none">Reception</option> 
                                    <option value="Other" <?php if ($employee['post'] == "Other" ) echo ' selected="selected"'; ?> style="border: none">Other</option> 
                                    </select>    
                                </div>     

                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">payment</i>Salary:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="salary" class="inputField"
                                    <?php 
                                        if(isset($employee['salary'])){
                                            echo 'value="' . $employee['salary'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="xxxxxxx"';
                                        } 
                                    
                                    ?>
                                    required
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['salary'])) && (isset($employee['salary']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['salary']; ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                        </label>    
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
    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>




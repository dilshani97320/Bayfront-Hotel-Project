<?php 
   // Header
   $title = "Add-Employee page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Employee Page";
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
                        <h4>Add New Employee 
                        <span>
                            <a href="<?php url("employee/index"); ?>" class="addnew"><i class="material-icons">arrow_back</i>Back To Employee Table</a>  
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("employee/create"); ?>" method="post" class="addnewform">

                    <div class="section1">

                        <div class="row">
                        <label for="#"><i class="material-icons">perm_identity</i>Owner ID:</label>
                        <input type="text" name="owner_user_id"
                        <?php 
                            if(!empty($employee)) {
                                echo 'value="' . $employee[0] . '"';
                            } 
                            else if(isset($success)){
                                echo 'placeholder="###"';
                            }
                            else {
                                echo 'placeholder="###"';
                            }
                            
                        ?>
                        >
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                            <input type="text" name="first_name" 
                            <?php 

                            if(!empty($employee)) {
                                echo 'value="' . $employee[1] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="Tharindu"';
                            }
                            else {
                                echo 'placeholder="Tharindu"';
                            }
                            
                            ?>
                            
                            >
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Last Name:</label>
                            <input type="text" name="last_name"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[2] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="Gihan"';
                            }
                            else {
                                echo 'placeholder="Gihan"';
                            }
                            
                            
                            ?>
                            >
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Email Address:</label>
                            <input type="text" name="email"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[3] . '"';
                            } 
                            else if(isset($success)){
                                echo 'placeholder="gihan@gmail.com"';
                            }
                            else {
                                echo 'placeholder="gihan@gmail.com"';
                            }
                            
                            
                            ?>
                            > 
                        </div>
                        
                        <div class="row">
                            <label for="#"><i class="material-icons">payment</i>Salary:</label>
                            <input type="text" name="salary"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[4] . '"';
                            } 
                            else if(isset($success)){
                                echo 'placeholder="000000"';
                            }
                            else {
                                echo 'placeholder="000000"';
                            }
                            
                            
                            ?>
                            > 
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">location_on</i>Location:</label>
                            <input type="text" name="location"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[5] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="57/A Galle Road"';
                            }
                            else {
                                echo 'placeholder="57/A Galle Road"';
                            }
                            
                            ?>
                            > 
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Contact Number:</label>
                            <input type="text" name="contact_num"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[6] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="0777456123"';
                            }
                            else {
                                echo 'placeholder="0777456123"';
                            }
                            
                            ?>
                            > 
                        </div>
                        
                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Save</button>
                            </div>
                        </div>
                    </div>

                    <div class="section2">
                        <?php if(!empty($error)) { ?>
                            <div class="errmsg">
                            <b>There was error(s) on your form</b><br>

                            <?php $len = sizeof($error);
                                foreach(array_slice($error, 0, $len) as $error1){
                                    $error = ucfirst(str_replace("_", " ", $error1));
                                    echo $error . '<br>';
                                }    
                            ?>
                            </div>
                        <?php }

                        else if(isset($success)) {?>
                            <div class="errmsg">
                            <b>There was Message  your you</b><br>
                            <?php echo $success; ?>
                            </div>
                        <?php } 

                        else if(isset($newerror)) { ?>
                            <div class="errmsg">
                            <b>Sorry!!There was Message  your you</b><br>
                            <?php echo $newerror; ?>
                            </div>
                        <?php } 

                        else { ?>
                            <div class="errphoto">
                            <!-- <b>Welcome Sir</b><br> -->
                            <h4>Welcome to Employee Forms</h4>
                            <img src="<?php echo BURL.'assets/img/employee2.jpg'; ?>" alt="">
                            <!-- <?php echo $newerror; ?> -->
                            </div>
                        <?php } ?>



                         

                    </div>

                    </form>
                </div>  <!--End Card Body -->
            </div>  <!--End Card -->

            
        </div>
    </div>   <!-- End Table design -->
    
</div>
    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>





<?php 

// Header
   $title = "Employee page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Employee Page";
       $search = 1;
       $search_by = 'name';
       $url = "employee/index";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>
<div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Employee Page   
                       <span>
                            <?php if($_SESSION['user_level'] == "Owner"): ?>
                                <a href="<?php url("employee/add"); ?>" class="addnew"><i class="material-icons">add</i>Add New</a> 
                            <?php endif; ?>
                            <a href="<?php url("employee/index"); ?>" class="refresh"><i class="material-icons">refresh</i>Refresh</a> 
                       </span> 
                       </h4>
                   </div>
                   <p class="textfortabel">Employee View Following Table</p>
               </div>

               <div class="cardbody">  
                    <form action="<?php url("employee/update/".$employee['emp_id']); ?>" method="post" class="addnewform">

                    <div class="section1">
                     
                        <div class="row">
                        <label for="#"><i class="material-icons">perm_identity</i>Room Number</label>
                        <input type="text" name="owner_user_id"
                        <?php 
                            if(isset($employee)) {
                                echo 'value="' . $employee['owner_user_id'] . '"';
                            } 
                               
                        ?>
                        >
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Room name</label>
                            <input type="text" name="first_name" 
                            <?php 

                            if(isset($employee)) {
                                echo 'value="' . $employee['first_name'] . '"';
                            } 

                             
                            
                            ?>
                            
                            >
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Floor Type</label>
                            <input type="text" name="first_name" 
                            <?php 

                            if(isset($employee)) {
                                echo 'value="' . $employee['first_name'] . '"';
                            } 

                             
                            
                            ?>
                            
                            >
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Room Size</label>
                            <input type="text" name="last_name"
                            <?php 
                            
                            if(isset($employee)) {
                                echo 'value="' . $employee['last_name'] . '"';
                            } 
                            
                            
                            
                            ?>
                            >
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Price</label>
                            <input type="text" name="email"
                            <?php 
                            
                            if(isset($employee)) {
                                echo 'value="' . $employee['email'] . '"';
                            } 
                            
                            
                            
                            ?>
                            > 
                        </div>
                        
                        <div class="row">
                            <label for="#"><i class="material-icons">payment</i>Air Condition</label>
                            <!-- <input type="text" name="salary"> -->
                            <input type="radio" id="male" name="gender" value="A/C">
                            <label for="male">A/C</label><br>
                            <input type="radio" id="female" name="gender" value="Non A/C">
                            <label for="female">Non A/C</label><br>
                            <?php 
                            
                            if(isset($employee)) {
                                echo 'value="' . $employee['salary'] . '"';
                            } 
                            
                            
                            
                            ?>
                            > 
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">location_on</i>Hot Water</label>
                            <!-- <input type="text" name="location"> -->
                            <input type="radio" id="male" name="gender" value="A/C">
                            <label for="male">Yes</label><br>
                            <input type="radio" id="female" name="gender" value="Non A/C">
                            <label for="female">No</label><br>
                            <?php 
                            
                            if(isset($employee)) {
                                echo 'value="' . $employee['location'] . '"';
                            } 
                             
                            
                            ?>
                            > 
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Free Canseleration</label>
                            <input type="radio" id="male" name="gender" value="A/C">
                            <label for="male">Yes</label><br>
                            <input type="radio" id="female" name="gender" value="Non A/C">
                            <label for="female">No</label><br>
                            <!-- <input type="text" name="contact_num" -->
                            <?php 
                            
                            if(isset($employee)) {
                                echo 'value="' . $employee['contact_num'] . '"';
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
                            <b>Congratulation!!</b><br>
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
                            <!-- <h4>Welcome to Employee Edit Forms</h4>
                            <!-- <?php echo $newerror; ?> -->
                            </div>
                        <?php } ?>
    

                    </div>

                    </form>
                </div>  <!--End Card Body -->

           </div> 
       </div>
   </div>

</div>   

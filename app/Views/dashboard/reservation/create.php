<?php 
   // Header
   $title = "Add-Reservation page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Reservation Page";
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
                        <h4>New Reservation 
                        <!-- <span>
                            <a href="<?php //url("employee/index"); ?>" class="addnew"><i class="material-icons">arrow_back</i>Back To Employee Table</a>  
                        </span> -->
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("reservation/create"); ?>" method="post" class="addnewform">

                    <div class="section1">

                        <!-- Customer Part -->
                        
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
                        <label for="#"><i class="material-icons">location_on</i>Location:</label>
                        <input type="text" name="location"
                        <?php 
                            if(!empty($employee)) {
                                echo 'value="' . $employee[0] . '"';
                            } 
                            else if(isset($success)){
                                echo 'placeholder="Gonapura Poddala"';
                            }
                            else {
                                echo 'placeholder="Gonapura Poddala"';
                            }
                            
                        ?>
                        >
                        </div>

                        <div class="row">
                        <label for="#"><i class="material-icons">contacts</i>Contact Number:</label>
                        <input type="text" name="contact_number"
                        <?php 
                            if(!empty($employee)) {
                                echo 'value="' . $employee[0] . '"';
                            } 
                            else if(isset($success)){
                                echo 'placeholder="0778522736"';
                            }
                            else {
                                echo 'placeholder="0778522736"';
                            }
                            
                        ?>
                        >
                        </div>
                        
                        <div class="row">
                        <label for="#"><i class="material-icons">account_box</i>Date of Birth:</label>
                        <input type="text" name="date_of_birth"
                        <?php 
                            if(!empty($employee)) {
                                echo 'value="' . $employee[0] . '"';
                            } 
                            else if(isset($success)){
                                echo 'placeholder="1998-03-17"';
                            }
                            else {
                                echo 'placeholder="1998-03-17"';
                            }
                            
                        ?>
                        >
                        </div>

                        <div class="row">
                        <label for="#"><i class="material-icons">account_box</i>Age:</label>
                        <input type="text" name="age"
                        <?php 
                            if(!empty($employee)) {
                                echo 'value="' . $employee[0] . '"';
                            } 
                            else if(isset($success)){
                                echo 'placeholder="22"';
                            }
                            else {
                                echo 'placeholder="22"';
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
                        <!-- End of Customer Details Part  -->

                        <!-- Reservation Details -->
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Room Number:</label>
                            <input type="text" name="room_number"
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
                            <label for="#"><i class="material-icons">group_add</i>No of Guest:</label>
                            <input type="text" name="no_of_guest"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[5] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="5"';
                            }
                            else {
                                echo 'placeholder="5"';
                            }
                            
                            ?>
                            > 
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">today</i>Check-In Day:</label>
                            <input type="text" name="check_in_date"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[6] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="2020-00-00"';
                            }
                            else {
                                echo 'placeholder="2020-00-00"';
                            }
                            
                            ?>
                            > 
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">today</i>Check-Out Day:</label>
                            <input type="text" name="check_out_date"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[6] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="2020-00-00"';
                            }
                            else {
                                echo 'placeholder="2020-00-00"';
                            }
                            
                            ?>
                            > 
                        </div>

                        <!-- End of Reservation Details -->
                          
                        <!-- Payment Details -->

                        <div class="row">
                            <label for="#"><i class="material-icons">credit_card</i>Name of Card:</label>
                            <input type="text" name="name_of_card"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[6] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="VISA"';
                            }
                            else {
                                echo 'placeholder="VISA"';
                            }
                            
                            ?>
                            > 
                        </div> 
                        <div class="row">
                            <label for="#"><i class="material-icons">card_membership</i>Credit Card Number:</label>
                            <input type="text" name="credit_card_number"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[6] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="XXXX-XXXX-XXXX-XXXX"';
                            }
                            else {
                                echo 'placeholder="XXXX-XXXX-XXXX-XXXX"';
                            }
                            
                            ?>
                            > 
                        </div> 

                        <div class="row">
                            <label for="#"><i class="material-icons">date_range</i>Expire Month:</label>
                            <input type="text" name="expire_month"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[6] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="January"';
                            }
                            else {
                                echo 'placeholder="January"';
                            }
                            
                            ?>
                            > 
                        </div> 

                        <div class="row">
                            <label for="#"><i class="material-icons">date_range</i>Expire Year:</label>
                            <input type="text" name="expire_year"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[6] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="2022"';
                            }
                            else {
                                echo 'placeholder="2022"';
                            }
                            
                            ?>
                            > 
                        </div> 

                        <div class="row">
                            <label for="#"><i class="material-icons">receipt</i>CVV:</label>
                            <input type="text" name="name_of_card"
                            <?php 
                            
                            if(!empty($employee)) {
                                echo 'value="' . $employee[6] . '"';
                            }  
                            else if(isset($success)){
                                echo 'placeholder="XXX"';
                            }
                            else {
                                echo 'placeholder="XXX"';
                            }
                            
                            ?>
                            > 
                        </div> 
                        <!-- End of Payment Details -->

                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Booking</button>
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




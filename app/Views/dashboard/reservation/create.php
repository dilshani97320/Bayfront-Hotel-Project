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
                        <span>
                        <?php if(isset($discount['value'])){ ?>
                            <!-- <a href="<?php //url("room/preview/".$details['check_in_date'].'/'.$details['check_out_date'].'/'.$details['type_name']) ?>" class="addnew"><i class="material-icons">reply_all</i></a>   -->
                            <a href="<?php url("room/preview/".$reservation['check_in_date'].'/'.$reservation['check_out_date'].'/'.$reservation['type_name']) ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        <?php } else { ?>
                            <a href="<?php url("reservation/details"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        <?php } ?>
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Following Details</p>
                </div>

                <div class="cardbody">  
                <?php if(isset($discount['value'])){ ?>
                    <form action="<?php url("reservation/create/".$discount['value'].'/'.$reservation['check_in_date'].'/'.$reservation['check_out_date'].'/'.$reservation['type_name']); ?>" method="post" class="addnewform">
                <?php } else { ?>
                    <form action="<?php url("reservation/create"); ?>" method="post" class="addnewform">
                <?php } ?>    
                    <div class="section1">

                        <!-- Customer Part -->
                        <?php
                        //  $reservation= array('first_name' => "Tharindu", 'credit_card_number'=>"1234-4567-2589-5634"); 
                        //  $errors= array('first_name' => "less than 100 characters", 'credit_card_number'=>"Must be required"); 
                        ?>
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField"
                                    <?php 
                                        if(isset($reservation['first_name'])){
                                            echo 'value="' . $reservation['first_name'] . '"';
                                        }
                                        if(isset($customer['first_name'])) {
                                            echo 'value="' . $customer['first_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Tharindu"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['first_name'])) && (isset($reservation['first_name']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['first_name']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Last Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="last_name" class="inputField"
                                    <?php 
                                        if(isset($reservation['last_name'])){
                                            echo 'value="' . $reservation['last_name'] . '"';
                                        }
                                        if(isset($customer['last_name'])) {
                                            echo 'value="' . $customer['last_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Gihan"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['last_name'])) && (isset($reservation['last_name']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['last_name']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">perm_contact_calendar</i>Age:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="age" class="inputField"
                                    <?php 
                                        if(isset($reservation['age'])){
                                            echo 'value="' . $reservation['age'] . '"';
                                        }
                                        if(isset($customer['age'])) {
                                            echo 'value="' . $customer['age'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="22"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['age'])) && (isset($reservation['age']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['age']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">public</i>Country:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="location" class="inputField" 
                                    <?php 
                                        if(isset($reservation['location'])){
                                            echo 'value="' . $reservation['location'] . '"';
                                        }
                                        if(isset($customer['location'])) {
                                            echo 'value="' . $customer['location'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Sri Lanka Galle"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['location'])) && (isset($reservation['location']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['location']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        
                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Contact Number:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="contact_number" class="inputField"
                                    <?php 
                                        if(isset($reservation['contact_number'])){
                                            echo 'value="' . $reservation['contact_number'] . '"';
                                        }
                                        if(isset($customer['contact_number'])) {
                                            echo 'value="' . $customer['contact_number'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="0778522736"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['contact_number'])) && (isset($reservation['contact_number']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['contact_number']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        

                        

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Email Address:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="email" class="inputField"
                                    <?php 
                                        if(isset($reservation['email'])){
                                            echo 'value="' . $reservation['email'] . '"';
                                        }
                                        if(isset($customer['email'])) {
                                            echo 'value="' . $customer['email'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="wtgihan@gmail.com"';
                                        } 
                                    
                                    ?>
                                    required
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['email'])) && (isset($reservation['email']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['email']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <!-- End of Customer Details Part  -->

                        <!-- Reservation Details -->

                        <div class="row">
                            <label for="#"><i class="material-icons">room</i>Room Number:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_number" class="inputField"
                                    <?php 
                                        if(isset($reservation['room_number'])){
                                            echo 'value="' . $reservation['room_number'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="A001"';
                                        } 
                                    
                                    ?>
                                    
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['room_number'])) && (isset($reservation['room_number']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['room_number']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">group_add</i>No of Guest:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="max_guest" class="inputField"
                                    <?php 
                                        if(isset($reservation['max_guest'])){
                                            echo 'value="' . $reservation['max_guest'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="5"';
                                        } 
                                    
                                    ?>
                                    
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['max_guest'])) && (isset($reservation['max_guest']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['max_guest']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">today</i>Check-In Date:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="check_in_date" class="inputField"
                                    <?php 

                                        date_default_timezone_set("Asia/Colombo");
                                        $current_date = date('Y-m-d');
                                        if(isset($reservation['check_in_date'])){
                                            echo 'value="' . $reservation['check_in_date'] . '"';
                                        }
                                        else {
                                            echo 'value="'.$current_date .'"';
                                        } 
                                    
                                    ?>
                                    
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['check_in_date'])) && (isset($reservation['check_in_date']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['check_in_date']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">today</i>Check-Out Date:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="check_out_date" class="inputField"
                                    <?php 
                                        if(isset($reservation['check_out_date'])){
                                            echo 'value="' . $reservation['check_out_date'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="2020-11-20"';
                                        } 
                                    
                                    ?>
                                    
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['check_out_date'])) && (isset($reservation['check_out_date']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['check_out_date']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <!-- End of Reservation Details -->
                          
                        <!-- Payment Details -->

                        

                        <div class="row">
                            <label for="#"><i class="material-icons">request_quote</i>Payment Method:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="payment_method" class="inputField"
                                    <?php 
                                        if(isset($reservation['payment_method'])){
                                            echo 'value="' . $reservation['payment_method'] . '"';
                                        }
                                        else {
                                            echo 'value="CASH"';
                                        } 
                                    
                                    ?>
                                    
                                    readonly="readonly"
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['payment_method'])) && (isset($reservation['payment_method']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['payment_method']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        
                        <!-- End of Payment Details -->

                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Booking</button>
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




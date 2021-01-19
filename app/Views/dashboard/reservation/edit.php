<?php 
   // Header
   $title = "Edit-Reservation";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Edit Reservation Page";
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
                        <h4>Edit Reservation 
                        <span>
                            <a href="<?php url("reservation/details"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Reservation has Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("reservation/update/".$reservation['check_in_date']); ?>" method="post" class="addnewform">

                    <div class="section1">

                        <input type="text" name="customer_id" value ="<?php echo $reservation['customer_id']; ?>" hidden  >
                        <input type="text" name="reception_user_id" value ="<?php echo $reservation['reception_user_id']; ?>" hidden  >
                        <input type="text" name="room_id" value ="<?php echo $reservation['room_id']; ?>" hidden  >
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">book</i>Reservation ID:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="reservation_id" class="inputField"
                                    <?php 
                                        if(isset($reservation['reservation_id'])){
                                            echo 'value="' . $reservation['reservation_id'] . '"';
                                        }

                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reservation['reservation_id'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Customer First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField"
                                    <?php 
                                        if(isset($customer['first_name'])){
                                            echo 'value="' . $customer['first_name'] . '"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($customer['first_name'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>Customer Last Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="last_name" class="inputField"
                                    <?php 
                                        if(isset($customer['last_name'])){
                                            echo 'value="' . $customer['last_name'] . '"';
                                        }
                                         
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($customer['last_name'] == ""){ ?>
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
                                    <input type="text"  autocomplete="off" name="contact_number" class="inputField"
                                    <?php 
                                        if(isset($customer['contact_number'])){
                                            echo 'value="' . $customer['contact_number'] . '"';
                                        }
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($customer['contact_number'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">mail</i>Email:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="email" class="inputField"
                                    <?php 
                                        if(isset($customer['email'])){
                                            echo 'value="' . $customer['email'] . '"';
                                        }
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($customer['email'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">public</i>Country:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="location" class="inputField"
                                    <?php 
                                        if(isset($customer['location'])){
                                            echo 'value="' . $customer['location'] . '"';
                                        }
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($customer['location'] == ""){ ?>
                                                <<span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">admin_panel_settings</i>Room Number:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_number" class="inputField"
                                    <?php 
                                        if(isset($room['room_number'])){
                                            echo 'value="' . $room['room_number'] . '"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($room['room_number'] == ""){ ?>
                                                <<span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">hotel</i>Room Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_name" class="inputField"
                                    <?php 
                                        if(isset($room['room_name'])){
                                            echo 'value="' . $room['room_name'] . '"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($room['room_name'] == ""){ ?>
                                                <<span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">hotel</i>Room Type:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="type_name" class="inputField"
                                    <?php 
                                        if(isset($room_type['type_name'])){
                                            echo 'value="' . $room_type['type_name'] . '"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($room_type['type_name'] == ""){ ?>
                                                <<span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">local_offer</i>Room Price:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="price" class="inputField"
                                    <?php 
                                        if(isset($room['price'])){
                                            echo 'value="' . $room['price'] . '$"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($room['price'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">recent_actors</i>Reception Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="username" class="inputField"
                                    <?php 
                                        if(isset($reception['username'])){
                                            echo 'value="' . $reception['username'] . '"';
                                        }
                                        
                                    ?>
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reception['username'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                        </label>    
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">today</i>Check In Date:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="check_in_date" class="inputField"
                                    <?php 
                                        if(isset($reservation['check_in_date'])){
                                            echo 'value="' . $reservation['check_in_date'] . '"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['check_in_date'])) && (isset($reservation['check_in_date']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['check_in_date']; ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">today</i>Check Out Date:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="check_out_date" class="inputField"
                                    <?php 
                                        if(isset($reservation['check_out_date'])){
                                            echo 'value="' . $reservation['check_out_date'] . '"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['check_out_date'])) && (isset($reservation['check_out_date']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['check_out_date']; ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">request_quote</i>Payment Method:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="payment_method" class="inputField"
                                    <?php 
                                        if(isset($reservation['payment_method'])){
                                            echo 'value="' . $reservation['payment_method'] . '"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if($reservation['payment_method'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
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




<?php 
   // Header
    $title = "Add-Reservation page";
    include(VIEWS.'dashboard/inc/header.php');
?> 




<body>

    <!-- Table design -->
    <div id="popup">
        <div class="tablecard">
            <div class="card">
          
                        <?php if(isset($discount['value'])){ ?>
                            <!-- <a href="<?php url("room/preview/".$details['check_in_date'].'/'.$details['check_out_date'].'/'.$details['type_name']) ?>" class="addnew"><i class="material-icons">reply_all</i></a>   -->
                            <!-- <a href="<?php url("room/preview/".$reservation['check_in_date'].'/'.$reservation['check_out_date'].'/'.$reservation['type_name']) ?>" class="addnew"><i class="material-icons">reply_all</i></a> -->
                        <?php } else { ?>
                            <!-- <a href="<?php url("reservation/details"); ?>" class="addnew"><i class="material-icons">reply_all</i></a> -->
                        <?php } ?>
                        
                

                <div class="cardbody" id="popupcardbody">
                <?php 
                // this is not require but use for basic purpose
                    $roomSearchValue = 0;
                    $typeName = "None";
                
                ?>
                <?php if(isset($searchdata)){ ?>
                    <!-- //This is use for room serach and goto check now page -->
                    <form action="<?php url("reservation/create/". $roomSearchValue.'/'.$reservation['check_in_date'].'/'.$reservation['check_out_date'].'/'.$typeName.'/'.$searchdata['no_of_rooms'].'/'.$searchdata['no_of_guest']); ?>" method="post" class="addnewform">
                <?php } else { ?>
                    <form action="<?php url("reservation/create"); ?>" method="post" class="addnewform">
                <?php } ?>    
                    <div class="section1">
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField"
                                    <?php 
                                        if(isset($reservation['first_name'])){
                                            echo 'value="' . $reservation['first_name'] . '"';
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
                                            echo 'placeholder="A001//Real Scenario this is not required testing purpose"';
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
                            <label for="#"><i class="material-icons">request_quote</i>Payment Type:</label>
                                <div class="animate-form">
                                    <select name="payment_method" class="inputField">
                                         <option value="ONLINE">-Select Payment Type-</option>
                                         <option value="ONLINEONLINE" style="border: none">ONLINE</option>      
                                         <option value="CASHONLINE" style="border: none">CASH</option>      
                                    </select>    
                                </div>     
                        </div>

                        
                        <!-- End of Payment Details -->

                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Booking</button>
                            </div>
                        </div>
                    </div>

                    </form>
                </div>  <!--End Card Body -->
            </div>  <!--End Card -->

            
        </div>
        <!-- have to create redirect link -->
        <a class="closeonline"><img src="<?php echo BURL.'assets/img/cancel.png'; ?>" alt=""></a>
    </div>   <!-- End Table design -->
    
<!-- </div> -->

    
</body>
</html>




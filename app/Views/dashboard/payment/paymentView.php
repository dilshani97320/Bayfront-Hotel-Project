<?php 
   // Header
   $title = "Payment-View page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Payment View Page";
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
                        <h4>Payment View 
                        <span>
                        <?php if(isset($pay_online) && !isset($pay_all) && !isset($edit_view)) { ?>
                            <a href="<?php url("payment/onlineIndex"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        <?php }if(isset($pay_all) && !isset($pay_online) && !isset($edit_view)) { ?>
                            <a href="<?php url("payment/allIndex"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        <?php }if(isset($pay_all) && isset($edit_view) && !isset($pay_online)) { ?>
                            <a href="<?php url("payment/allIndex"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        <?php }if(!isset($pay_all) && !isset($pay_online) && !isset($edit_view)) { ?>
                            <a href="<?php url("payment/cashIndex"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                        <?php } ?>     
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Payment Following Details and Payment $4.83 include tax</p>
                </div>

                <div class="cardbody">  
                <!-- Online Send Mail -->
                    <?php if(isset($pay_online) && !isset($pay_all) && !isset($edit_view)) { ?> 
                        <form action="<?php url("payment/payEmailNotification"); ?>" method="post" class="addnewform">
                <!-- Pay Cash  -->
                    <?php }if(!isset($pay_online) && !isset($pay_all) && !isset($edit_view)) { ?>
                        <form action="<?php url("payment/paycash"); ?>" method="post" class="addnewform">
                <!-- Pay Cash Edit  -->
                    <?php }if(!isset($pay_online) && isset($pay_all) && isset($edit_view)) { ?>
                        <form action="<?php url("payment/editPayCash"); ?>" method="post" class="addnewform">
                    <?php } ?>

                    <input type="text" name="customer_id"  <?php echo 'value="' . $customer['customer_id'] . '"'?> hidden>
                    <input type="text" name="reservation_id"  <?php echo 'value="' . $reservation['reservation_id'] . '"'?> hidden>

                    <div class="section1">
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField"
                                    <?php 
                                        if(isset($customer['first_name'])){
                                            echo 'value="' . $customer['first_name'] . '"';
                                            // echo 'value="' . $reservation['reservation_id'] . '"';
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
                            <label for="#"><i class="material-icons">account_box</i>Last Name:</label>
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
                            <label for="#"><i class="material-icons">mail</i>Email Address:</label>
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
                            <label for="#"><i class="material-icons">payment</i>Contact Number:</label>
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
                            <label for="#"><i class="material-icons">public</i>Room Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_name" class="inputField" 
                                    <?php 
                                        if(isset($details['room_name'])){
                                            echo 'value="' . $details['room_name'] . '"';
                                        }
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($details['room_name'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">public</i>Room Price:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_price" class="inputField" 
                                    <?php 
                                        if(isset($details['room_price'])){
                                            echo 'value="' . $details['room_price'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($details['room_price'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">public</i>Total Price:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="total_price" class="inputField" 
                                    <?php 
                                        if(isset($details['total_price'])){
                                            echo 'value="' . $details['total_price'] . '"';
                                        }
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($details['total_price'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        

                        

                        <?php if(!isset($pay_online) && isset($pay_all) && isset($edit_view)) { ?>
                            <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Paid Price:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="new_paid_amount" class="inputField"
                                    <?php 
                                        $paymentValue = 0;
                                        $paymentValuePaid = 0;
                                        // $cash = 0;
                                        if(isset($payment)) {
                                            foreach($payment as $row){
                                                $paymentValuePaid = $paymentValuePaid + $row['amount'];
                                                // $cash = $cash + 1;
                                            }
                                            $paymentValuePaid =  $paymentValuePaid/1000;
                                        }
                                        
                                        // $paymentValue = $details['total_price'] - $paymentValuePaid;
                                        echo 'value="' . $paymentValuePaid . '"';
                                    ?>
                                    <?php if($paymentValuePaid == 0){ ?>
                                        readonly
                                    <?php } ?>
                                    >
                                    <input type="text" name="paid_amount"  <?php echo 'value="' . $paymentValuePaid . '"'?> hidden>
                                    <label for="name" class="label-name">
                                            <?php if(isset($paid_error)): ?>
                                                <span class="content-name"><i class="material-icons">info</i>Paid Value Must Zero</span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                    </label>    
                                </div>     
                            </div>
                        <?php } else{ ?>
                            <div class="row">
                                <label for="#"><i class="material-icons">contacts</i>Due Price:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="amount" class="inputField"
                                    <?php 
                                        $paymentValue = 0;
                                        $paymentValuePaid = 0;
                                        // $cash = 0;
                                        if(isset($payment)) {
                                            foreach($payment as $row){
                                                $paymentValuePaid = $paymentValuePaid + $row['amount'];
                                                // $cash = $cash + 1;
                                            }
                                            $paymentValuePaid =  $paymentValuePaid/1000;
                                        }
                                        
                                        $paymentValue = $details['total_price'] - $paymentValuePaid;
                                        echo 'value="' . $paymentValue . '"';
                                    ?>
                                    readonly
                                    >

                                    <label for="name" class="label-name">
                                            <?php if($paymentValue == 0){?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                            </div>
                        <?php } ?>
                        <?php if(isset($pay_online) && !isset($pay_all) && !isset($edit_view)) { ?>
                            <?php if($paymentValue != 0):?>
                            <div class="row">
                                <div class="button">
                                    <button class="save" name="submit">Send Email</button>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php }if(!isset($pay_online) && !isset($pay_all) && !isset($edit_view)) { ?>
                            <?php if($paymentValue != 0):?>
                            <div class="row">
                                <div class="button">
                                    <button class="save" name="submit">Pay Now</button>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php }if(!isset($pay_online) && isset($pay_all) && isset($edit_view)) { ?>
                            <?php if($paymentValuePaid != 0):?>
                            <div class="row">
                                <div class="button">
                                    <button class="save" name="submit">Update</button>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php } ?>
                        
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




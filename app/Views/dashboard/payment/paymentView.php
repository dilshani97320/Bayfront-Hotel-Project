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
                            <a href="<?php url("payment/cashIndex"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Payment Following Details and Payment $4.83 include tax</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("employee/create"); ?>" method="post" class="addnewform">

                    <div class="section1">
                        <div class="row">
                            <label for="#"><i class="material-icons">account_box</i>First Name:</label>
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

                        

                        <div class="row">
                            <label for="#"><i class="material-icons">contacts</i>Due Price:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="amount" class="inputField"
                                    <?php 
                                        $paymentValue = 0;
                                        $paymentValuePaid = 0;
                                        if(isset($payment['amount'])){
                                            $paymentValuePaid=  $payment['amount']/1000;
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
                        
                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Pay Now</button>
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




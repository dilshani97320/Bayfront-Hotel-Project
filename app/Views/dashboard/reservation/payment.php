<?php 
   // Header
   $title = "Add-Payment Detail page";
   include(VIEWS.'dashboard/inc/header.php');
?> 

<div class="wrapper">

    <?php 
            $navbar_title = "Reservation Page";
            $search = 0;
            $search_by = '#';
       
            // include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
            // include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
    ?>
    
    <!-- Table design -->
    <div class="content">
        <div class="tablecard">
            <div class="card">

                <div class="cardheader">
                    <div class="options">
                        <h4>Payment Details 
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Pay Now Details</p>
                </div>

                <div class="cardbody">  
                    
                    <div class="section1">

                    <form action="<?php url("payment/payonline"); ?>" method="post" id="payment-form">

                        <input type="text" name="customer_id" value ="<?php echo $customer['customer_id']; ?>" hidden  >
                        <input type="text" name="reservation_id" value ="<?php echo $reservation['reservation_id']; ?>" hidden  >
                       
                        <div class="row">
                            <label for="#"><i class="material-icons">assignment_ind</i>Customer Name:</label>
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
                            <label for="#"><i class="material-icons">email</i>Customer Email:</label>
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
                                            <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                        <?php } else {?>
                                            <span class="content-success"><i class="material-icons">verified_user</i></span>
                                        <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">deck</i>Room View:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_view" class="inputField"
                                    <?php 
                                        if(isset($room['room_view'])){
                                            echo 'value="' . $room['room_view'] . '"';
                                        }
                                        
                                    
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                        <?php if($room['room_view'] == ""){ ?>
                                            <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                        <?php } else {?>
                                            <span class="content-success"><i class="material-icons">verified_user</i></span>
                                        <?php } ?>
                                    </label>   
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">local_offer</i>Room Price:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_price" class="inputField"
                                    <?php 
                                        if(isset($room['price'])){
                                            echo 'value="' . $room['price'] . '"';
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
                            <label for="#"><i class="material-icons">request_quote</i>Payment :</label>
                                <div class="animate-form">
                                    <select name="payment_way" class="inputField">
                                         <option value="ONLINEPAY">-Select Payment PART-</option>
                                         <option value="ONLINEHALF" style="border: none">HALF PAYMENT</option>      
                                         <option value="ONLINEFULL" style="border: none">FULL PAYMENT</option>      
                                    </select>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">credit_card</i>Credit Card Details:</label>
                                    
                        </div>


                       <div class="form-row">
                            <div id="card-element" class="pyamentcardform">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <button>Pay</button>
                    </form>
                    </div>

                    <div class="section2">
                        

                    </div>

                    </form>
                </div>  <!--End Card Body -->
            </div>  <!--End Card -->

            
        </div>
    </div>   <!-- End Table design -->
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="<?php echo BURL.'assets/js/charge.js'; ?>"></script>
    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>




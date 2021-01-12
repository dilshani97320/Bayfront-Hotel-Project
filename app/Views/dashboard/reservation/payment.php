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

                    <form action="./charge.php" method="post" id="payment-form">

                        <input type="text" name="customer_id" value ="<?php echo $customer['id']; ?>" hidden  >
                        <input type="text" name="reservation_id" value ="<?php echo $reservation['id']; ?>" hidden  >
                       
                        <div class="row">
                            <label for="#"><i class="material-icons">assignment_ind</i>Customer Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField"
                                    <?php 
                                        if(isset($customer['id'])){
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
                                    <input type="text"  autocomplete="off" name="first_name" class="inputField"
                                    <?php 
                                        if(isset($customer['id'])){
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
                            <label for="#"><i class="material-icons">hotel</i>Room Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="check_out_date" class="inputField"
                                    <?php 
                                        if(isset($reservation['check_out_date'])){
                                            echo 'value="' . $reservation['check_out_date'] . '"';
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
                            <label for="#"><i class="material-icons">deck</i>Room View:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="check_out_date" class="inputField"
                                    <?php 
                                        if(isset($reservation['check_out_date'])){
                                            echo 'value="' . $reservation['check_out_date'] . '"';
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
                            <label for="#"><i class="material-icons">local_offer</i>Room Price:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="check_out_date" class="inputField"
                                    <?php 
                                        if(isset($reservation['check_out_date'])){
                                            echo 'value="' . $reservation['check_out_date'] . '"';
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
                            <label for="#"><i class="material-icons">request_quote</i>Payment :</label>
                                <div class="animate-form">
                                    <select name="payment_method" class="inputField">
                                         <option value="ONLINEPAY">-Select Payment PART-</option>
                                         <option value="ONLINEHALF" style="border: none">HALF PAYMENT</option>      
                                         <option value="ONLINEFULL" style="border: none">FULL PAYMENT</option>      
                                    </select>    
                                </div>     
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




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
       
            include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
            include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
    ?>
    
    <!-- Table design -->
    <div class="content">
        <div class="tablecard">
            <div class="card">

                <div class="cardheader">
                    <div class="options">
                        <h4>New Payment Details 
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Following Details</p>
                </div>

                <div class="cardbody">  
                    
                    <div class="section1">

                    <form action="./charge.php" method="post" id="payment-form">
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




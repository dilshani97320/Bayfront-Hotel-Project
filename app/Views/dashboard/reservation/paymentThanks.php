<?php 
   // Header
   $title = "Payment Thanks page";
   include(VIEWS.'dashboard/inc/header.php');
?> 

<div class="wrapper">

    <?php 
            $navbar_title = "Payment Page";
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
                        <h4>Payment Thanks Page
                        </h4>  
                    </div>

                    <p class="textfortabel">Your Payment is Success Thank you!!</p>
                </div>

                <div class="cardbody">  
                    
                    <div class="section1">

                    <form action="<?php url("reservation/indexOnline"); ?>">

                        <button class="save">Back</button>
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

    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>




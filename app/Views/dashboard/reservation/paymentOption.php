<style>

</style>
<?php 

// Header
   $title = "Payment Select page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Payment Option Demo Page";
       $search = 0;
       $search_by = 'name';
       $url = "employee/index";
       
    //    include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
    //    include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>

<div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Payment Select Option Page</h4>
                   </div>
                   <p class="textfortabel">Select Payment Choice</p>
               </div>
               
                    <div class="badgeSec">
                        <div class="horBadge">
                        
                            <div class="icon1">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <div class="text">
                                Pay Now Reservation
                            </div>
                            <a href="<?php url('reservation/paymentOnline/'.$customer['id'].'/'.$reservation['id']);?>"></a>
                        </div>

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text">
                                End Reservation
                            </div>
                            <a href="<?php url('reservation/indexOnline');?>"></a>
                        </div>
                    </div>
           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>

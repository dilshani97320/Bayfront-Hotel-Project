<style>

</style>
<?php 

// Header
   $title = "Payment Select page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Select Option Page";
       $search = 0;
       $search_by = 'name';
       $url = "employee/index";
       
       include(VIEWS.'dashboard/inc/sidebar.php'); //Sidebar
       include(VIEWS.'dashboard/inc/navbar.php'); //Navbar
   ?>

<div class="content">
       <div class="tablecard">
           <div class="card">
               <div class="cardheader">
                   <div class="options">
                       <h4>Payment Select Option Page</h4>
                   </div>
                   <p class="textfortabel">Select Payment Choice or View Details</p>
               </div>
               
                    <div class="badgeSec">
                        <div class="horBadge">
                        
                            <div class="icon1">
                                <i class="fas fa-money-check-alt"></i>
                            </div>
                            <div class="text">
                                Cash Payments
                            </div>
                            <a href="<?php url('payment/cashIndex');?>"></a>
                        </div>

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fas fa-money-check"></i>
                            </div>
                            <div class="text">
                                Online Payments
                            </div>
                            <a href="<?php url('notification/checkInMark');?>"></a>
                        </div>

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fas fa-tags"></i>
                            </div>
                            <div class="text">
                                Payment Details
                            </div>
                            <a href="<?php url('notification/checkOutMark');?>"></a>
                        </div>

                        
                    </div>
           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>

<style>

</style>
<?php 

// Header
   $title = "Report Select page";
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
                       <h4>Report Select Option Page</h4>
                   </div>
                   <p class="textfortabel">Select Report Choice or View Details</p>
               </div>
               
                    <div class="badgeSec">

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text">
                                About Users
                            </div>
                            <a href="<?php url('report/selectUserType');?>"></a>
                        </div>
                        
                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fa fa-book"></i>
                            </div>
                            <div class="text">
                                Hotel Report
                            </div>
                            <a href="<?php url('report/formViewRange');?>"></a>
                        </div>


                        
                    </div>

                    <!-- <div class="cardbody"> 
                        <?php include(VIEWS.'dashboard/room/bookingCalendar.php'); ?>
                    </div> -->
           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>

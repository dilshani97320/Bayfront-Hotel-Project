<?php 

// Header
   $title = "Employee Select page";
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
                       <h4>Room Search Select Option Page</h4>
                   </div>
                   <p class="textfortabel">Select Room Choice</p>
               </div>
               
                    <div class="badgeSec">
                        <div class="horBadge">
                        
                            <div class="icon1">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <div class="text">
                                Booking Calendar
                            </div>
                            <a href="<?php url('room/calendarSearch');?>"></a>
                        </div>

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text">
                                Room Search
                            </div>
                            <a href="<?php url('room/index');?>"></a>
                        </div>
                    </div>

                    <div class="cardbody"> 
                        <?php include(VIEWS.'dashboard/room/bookingCalendar.php'); ?>
                    </div>
           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>

<?php 

// Header
   $title = "Room Booking Details Page";
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
                       <h4>Room Booking Page
                       <span>
                            <a href="<?php url("room/calendarSearch"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                       </span>
                       </h4>
                   </div>
                   <p class="textfortabel"><?php echo $room['room_name']; ?> Booking have following bookings</p>
               </div>
               

                <div class="cardbody"> 
                    <?php include(VIEWS.'dashboard/room/bookingCalendar.php'); ?>
                </div>
           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>

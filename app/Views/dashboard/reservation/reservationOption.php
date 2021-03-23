<style>

</style>
<?php 

// Header
   $title = "Reservation Option page";
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
                       <h4>Reservation Select Option Page</h4>
                   </div>
                   <p class="textfortabel">Select Customer Choice</p>
               </div>
               
                    <div class="badgeSec">
                        <div class="horBadge">
                            <div class="icon1">
                                <i class="fas fa-user-tag"></i>
                            </div>
                            <div class="text">
                                More Reservation
                            </div>
                            <?php if(isset($create['value']) == 1){ ?>
                                <a href="<?php url('reservation/index/'.$customer['id']);?>"></a>
                            <?php }elseif(isset($bookingCalendar) && $bookingCalendar == 1){ ?>
                                <a href="<?php url('room/calendarSearch/'.$customer['id']);?>"></a>
                            <?php } else { ?>
                                <a href="<?php url('room/index/'.$customer['id']);?>"></a>
                            <?php } ?>    
                        </div>

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text">
                                Exit From Reservation
                            </div>
                            <a href="<?php url('reservation/details');?>"></a>
                        </div>
                    </div>
           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>

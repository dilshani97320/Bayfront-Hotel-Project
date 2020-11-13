<style>

</style>
<?php 

// Header
   $title = "Employee page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Employee Page";
       $search = 1;
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
                       <h4>Employee Page  </h4>
                   </div>
                   <p class="textfortabel">Employee View Following Table</p>
               </div>
               
                    <div class="badgeSec">
                        <div class="horBadge">
                        
                            <div class="icon1">
                                <i class="far fa-edit"></i>
                            </div>
                            <div class="text">
                                Change Room Details
                                <?php echo $room_id;?>
                            </div>
                            <a href="<?php url('editweb/changeDetails/'.$room_id);?>"></a>
                        </div>

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="far fa-images"></i>
                            </div>
                            <div class="text">
                                Change Room Image
                            </div>
                            <a href="<?php url('image/index/'.$room_id);?>"></a>
                        </div>
                    </div>
           </div> 
       </div>
   </div>

</div>   

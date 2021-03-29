<style>

</style>
<?php 

// Header
   $title = "Edit web page";
   include(VIEWS.'dashboard/inc/header.php'); 
?>

<div class="wrapper">
      
   <?php 
   
       $navbar_title = "Edit Page";
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
                       <h4>Room Edit Page  
                       <span>
                            <a href="<?php url("editweb/index"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                        </span>
                       </h4>
                   </div>
                   <p class="textfortabel">Select Edit Choice</p>
               </div>
               
                    <div class="badgeSec">
                        <div class="horBadge">
                        
                            <div class="icon1">
                                <i class="far fa-edit"></i>
                            </div>
                            <div class="text">
                                Change Room Details
                                <?php echo $room_number;?>
                            </div>
                            <a href="<?php url('editweb/changeDetails/'.$room_number);?>"></a>
                        </div>

                        <div class="horBadge">
                            <div class="icon2">
                                <i class="far fa-images"></i>
                            </div>
                            <div class="text">
                                Change Room Image
                                <?php echo $room_number;?>
                            </div>
                            <a href="<?php url('image/viewImg/'.$room_number);?>"></a>
                        </div>
                    </div>
           </div> 
       </div>
   </div>

</div>   

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>

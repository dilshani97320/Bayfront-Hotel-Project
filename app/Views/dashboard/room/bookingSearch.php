<?php 
   // Header
   $title = "Search Room page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Search Room Page";
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
                        <h4>Room Search 
                        <span>
                            <a href="<?php url("room/selectOption"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>  
                       </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Following Details</p>
                </div>

                <div class="cardbody">  
                    <?php 
                        if(!isset($customer['id'])) { 
                            $customer['id'] = 0;
                        }
                    ?>
                    <form action="<?php url("room/checkCalendar/".$customer['id']); ?>" method="post" class="addnewform">

                    <div class="section1">

                        <input type="text" name="owner_user_id" value ="<?php echo $_SESSION['user_id']; ?>" hidden  >
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">room</i>Room Name:</label>
                                <div class="animate-form">
                                    <select name="room_id" class="inputField" required>
                                         <option value="">-Select Room-</option>
                                         <?php if(isset($room['type_name'])) {?>
                                            <option value="<?php echo $room['type_name']; ?>" selected><?php echo $details['type_name']; ?></option>
                                         <?php } ?>
                                    <?php foreach($rooms as $room): ?>
                                        <option value="<?php echo $room['room_id']; ?>" style="border: none"><?php echo $room['room_number']; ?>: <?php echo $room['room_name']; ?></option> 
                                    <?php endforeach; ?> 
                                    </select>    
                                </div>     
                        </div>
                        
                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Search</button>
                            </div>
                        </div>

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





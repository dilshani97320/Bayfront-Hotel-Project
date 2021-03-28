<?php 
   // Header
   $title = "Room View page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Room View";
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
                        <h4>Room View 
                        <span>
                            <?php if(isset($discount['value'])){ ?>
                                <a href="<?php url("room/preview/".$details['check_in_date'].'/'.$details['check_out_date'].'/'.$details['type_name']); ?>" class="addnew"><i class="material-icons">reply_all</i></a> 
                                <a href="<?php url("room/details1/".$room['room_number'].'/'.$details['check_in_date'].'/'.$details['check_out_date'].'/'.$details['type_name']); ?>" class="refresh"><i class="material-icons">loop</i></a>  
                            <?php } else { ?>
                                <a href="<?php url("reservation/details"); ?>" class="addnew"><i class="material-icons">reply_all</i></a>
                                <a href="<?php url("room/details/".$room['room_number']); ?>" class="refresh"><i class="material-icons">loop</i></a> 
                            <?php } ?>
                            
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Include Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="#" method="post" class="addnewform">

                    <div class="section1">
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">admin_panel_settings</i>Room Number:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room['room_number'])){
                                            echo 'value="' . $room['room_number'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room['room_number'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">hotel</i>Room Name:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room['room_name'])){
                                            echo 'value="' . $room['room_name'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room['room_name'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">hotel</i>Room Type:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room_type['type_name'])){
                                            echo 'value="' . $room_type['type_name'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room_type['type_name'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">family_restroom</i>Max Guest:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room_type['max_guest'])){
                                            echo 'value="' . $room_type['max_guest'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room_type['max_guest'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">king_bed</i>Bed Type:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room_type['bed_type'])){
                                            echo 'value="' . $room_type['bed_type'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room_type['bed_type'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>
                        
                        <div class="row">
                            <label for="#"><i class="material-icons">deck</i>Room View:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room['room_view'])){
                                            echo 'value="' . $room['room_view'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room['room_view'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>
                        
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">cast_for_education</i>Room Size:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room['room_size'])){
                                            echo 'value="' . $room['room_size'] . '"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room['room_size'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">ac_unit</i>Air Condition:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room['room_size'])){
                                            if($room['air_condition'] == 1){
                                                echo 'value="With Air Condtion"';
                                            }
                                            else {
                                                echo 'value="Without Air Condtion"';
                                            }
                                            
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room['air_condition'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>

                        

                        

                        <div class="row">
                            <label for="#"><i class="material-icons">room_service</i>About Breakfast:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room['breakfast_included'])){
                                            if($room['breakfast_included'] == 1){
                                                echo 'value="Breakfast Include"';
                                            }
                                            else {
                                                echo 'value="Breakfast Not Include"';
                                            }
                                            
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room['breakfast_included'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">hot_tub</i>About Hot Water:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room['hot_water'])){
                                            if($room['hot_water'] == 1){
                                                echo 'value="Hot Water Include"';
                                            }
                                            else {
                                                echo 'value="Hot Water Not Include"';
                                            }
                                            
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <<label for="name" class="label-name">
                                            <?php if($room['hot_water'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">no_meeting_room</i>About Cancelaration:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room['free_canselaration'])){
                                            if($room['free_canselaration'] == 1){
                                                echo 'value="Free Cancelaration Include"';
                                            }
                                            else {
                                                echo 'value="Free Cancelaration Not Include"';
                                            }
                                            
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room['free_canselaration'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>   
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">local_offer</i>Room Discount:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($discount['discount'])){
                                            echo 'value="' . $discount['discount'] . '%"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($discount['discount'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>
                        
                        <div class="row">
                            <label for="#"><i class="material-icons">local_offer</i>Room Price:</label>
                                <div class="animate-form">
                                    <input type="text"  class="inputField"
                                    <?php 
                                        if(isset($room['price'])){
                                            echo 'value="' . $room['price'] . '$"';
                                        }
                                    ?>
                                    
                                    readonly
                                    >
                                    
                                    <label for="name" class="label-name">
                                            <?php if($room['price'] == ""){ ?>
                                                <span class="content-success"><i class="material-icons">privacy_tip</i></span>
                                            <?php } else {?>
                                                <span class="content-success"><i class="material-icons">verified_user</i></span>
                                            <?php } ?>
                                    </label>    
                                </div>     
                        </div>
                                              
                    </div>

                    <div class="section2"> 

                    </div>

                    </form>
                </div>  <!--End Card Body -->

                <div class="cardheader">
                   <div class="options">
                       <h4>All Reservations</h4>
                   </div>
                   <p class="textfortabel">Reservations View Following Table</p>
               </div>
               <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>Room Number</th>
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Reception</th>
                                <th>Check In Date</th>
                                <th>Check Out Date</th>
                                <th>Payment Method</th>
                            </thead>
                            <?php foreach($reservations as $row): ?>
                            <tbody>
                                <td><?php echo $row['room_number'];?></td>
                                <td><?php echo $row['first_name'];?></td>
                               
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['username'];?></td>
                                <td> 
                                    <div class="in">
                                        <?php  echo $row['check_in_date'];?>
                                    </div>
                                </td>    
                                <td>
                                    <div class="out">
                                        <?php  echo $row['check_out_date'];?>
                                    </div>
                                </td>
                                <td>
                                <?php 
                                        if($row['payment_method'] == "ONLINEONLINE") {
                                            echo "ONLINE";
                                        }
                                        elseif($row['payment_method'] == "CASHONLINE") {
                                            echo "CASH";
                                        }
                                        else {
                                            echo $row['payment_method'];
                                        }
                                ?>  
                                </td>
                            </tbody>
                            <?php endforeach ?> 
                        </table>
                    </div>
                </div> 
            </div>  <!--End Card -->

            
        </div>
    </div>   <!-- End Table design -->
    
</div>
    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>




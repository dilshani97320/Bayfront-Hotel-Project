
<?php 
   // Header
   $title = "Add-Edit page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Update Room Page";
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
                        <h4>Update Room 
                        <span>
                            <a href="<?php url("editweb/selectChange/".$room_details[0]['room_number']); ?>" class="addnew"><i class="material-icons">arrow_back</i>Back To Selection</a>  
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Edit Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("editweb/update"); ?>" method="post" class="addnewform" enctype="multipart/form-data">

                    <div class="section1">
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">hotel</i>Room Type:</label>
                                <div class="animate-form">
                                    <select name="type_name" class="inputField" selected="<?php echo $room_details[0]['type_id']; ?>" >
                                    <option value="1" <?php if ($room_details[0]['type_id'] == 1 ) echo ' selected="selected"'; ?> style="border: none">Single Room</option> 
                                    <option value="2" <?php if ($room_details[0]['type_id'] == 2 ) echo ' selected="selected"'; ?> style="border: none">Double Room with King Size Bed </option> 
                                    <option value="3" <?php if ($room_details[0]['type_id'] == 3 ) echo ' selected="selected"'; ?> style="border: none">Double Room with Queen Size Bed</option> 
                                    <option value="4" <?php if ($room_details[0]['type_id'] == 4 ) echo ' selected="selected"'; ?> style="border: none">Triple Room</option> 
                                    <option value="5" <?php if ($room_details[0]['type_id'] == 5 ) echo ' selected="selected"'; ?> style="border: none">Twin Double Room</option> 
                                    <option value="6" <?php if ($room_details[0]['type_id'] == 6 ) echo ' selected="selected"'; ?> style="border: none">Twin Room</option> 
                                    <option value="7" <?php if ($room_details[0]['type_id'] == 7 ) echo ' selected="selected"'; ?>style="border: none">Family Room</option> 
                                        
                                    </select>    
                                </div>     

                        </div>


                        <div class="row">

                            <label for="#"><i class="material-icons">room</i>Floor Type:</label>
                                <div class="animate-form">
                                    <select name="floor_type" class="inputField" selected="<?php echo $room_details[0]['type_id']; ?>"> 
                                    <option value="" style="border: none">Select The Floor</option> 
                                    <option value="0"<?php if ($room_details[0]['floor_type'] == 0 ) echo ' selected="selected"'; ?> style="border: none">Ground Floor</option> 
                                    <option value="1" <?php if ($room_details[0]['floor_type'] == 1 ) echo ' selected="selected"'; ?> style="border: none">First Floor </option> 
                                    <option value="2" <?php if ($room_details[0]['floor_type'] == 2 ) echo ' selected="selected"'; ?> style="border: none">Scond Floor</option> 
                                    <option value="3" <?php if ($room_details[0]['floor_type'] == 3 ) echo ' selected="selected"'; ?> style="border: none">Third Floor</option> 
                                    <option value="4"<?php if ($room_details[0]['floor_type'] == 4 ) echo ' selected="selected"'; ?>  style="border: none">Fourth Floor</option> 
                                </select>   
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">admin_panel_settings</i>Room Number:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_number" class="inputField"
                                    <?php 
                                        if(isset($room_details[0]['room_number'])){
                                            echo 'value="' . $room_details[0]['room_number'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="B102"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['room_number'])) && (isset($room_details[0]['room_number']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['room_number']; ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     

                        </div>

                        
                        <div class="row">

                            <label for="#"><i class="material-icons">hotel</i>Room Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_name" class="inputField"
                                    <?php 
                                        if(isset($room_details[0]['room_name'])){
                                            echo 'value="' . $room_details[0]['room_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Budget Single Room"';
                                        } 
                                    
                                    ?>
                                    required
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['room_name'])) && (isset($room_details[0]['room_name']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['room_name']; ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     

                        </div>
                        

                        <div class="row">

                            <label for="#"><i class="material-icons">deck</i>Room View:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_view" class="inputField"
                                    <?php 
                                        if(isset($room_details[0]['room_view'])){
                                            echo 'value="' . $room_details[0]['room_view'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Sea View"';
                                        } 
                                    
                                    ?>
                                    required
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['room_view'])) && (isset($room_details[0]['room_view']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['room_view']; ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">cast_for_education</i>Room Size:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_size" class="inputField" 
                                    <?php 
                                        if(isset($room_details[0]['room_size'])){
                                            echo 'value="' . $room_details[0]['room_size'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="45"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['room_size'])) && (isset($room_details[0]['room_size']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['room_size']; ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                            
                                        </label>    
                                </div>     

                        </div>

                        

                        <div class="row">

                            <label for="#"><i class="material-icons">local_offer</i>Room Price:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="price" class="inputField"
                                    <?php 
                                        if(isset($room_details[0]['price'])){
                                            echo 'value="' . $room_details[0]['price'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="1000"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['price'])) && (isset($room_details[0]['price']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['price']; ?></span>
                                            <?php endif; ?>
                                            <?php if(isset($success)): ?>
                                                <span class="content-success"><i class="material-icons">verified_user</i>Updated Success</span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">ac_unit</i>Air Condition:</label>
                                <div class="animate-form">
                                    <select name="air_condition" class="inputField new" selected="<?php echo $room_details[0]['air_condition']; ?>">
                                        <option value="0" <?php if ($room_details[0]['air_condition'] == 1 ) echo ' selected="selected"'; ?> style="border: none">No</option> 
                                        <option value="1" <?php if ($room_details[0]['air_condition'] == 1 ) echo ' selected="selected"'; ?> style="border: none">Yes</option>          
                                    </select>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">no_meeting_room</i>Free Cancelaration:</label>
                                <div class="animate-form">
                                    <select name="free_canseleration" class="inputField new" selected="<?php echo $room_details[0]['free_canselaration']; ?>" >
                                        <option value="0" <?php if ($room_details[0]['free_canselaration'] == 1 ) echo ' selected="selected"'; ?> style="border: none">No</option> 
                                        <option value="1" <?php if ($room_details[0]['free_canselaration'] == 1 ) echo ' selected="selected"'; ?> style="border: none">Yes</option>          
                                    </select>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">hot_tub</i>Hot Water:</label>
                                <div class="animate-form">
                                    <select name="hot_water" class="inputField new" selected="<?php echo $room_details[0]['hot_water']; ?>">
                                        <option value="0" <?php if ($room_details[0]['hot_water'] == 1 ) echo ' selected="selected"'; ?> style="border: none">No</option> 
                                        <option value="1" <?php if ($room_details[0]['hot_water'] == 1 ) echo ' selected="selected"'; ?> style="border: none">Yes</option>          
                                    </select>   
                                </div>     

                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">room_service</i>Breakfast Included:</label>
                                <div class="animate-form">
                                    <select name="breakfast_included" class="inputField new" selected="<?php echo $room_details[0]['breakfast_included']; ?>">
                                        <option value="0" <?php if ($room_details[0]['breakfast_included'] == 1 ) echo ' selected="selected"'; ?> style="border: none">No</option> 
                                        <option value="1" <?php if ($room_details[0]['breakfast_included'] == 1 ) echo ' selected="selected"'; ?> style="border: none">Yes</option>          
                                    </select>   
                                </div>     
                        </div>


                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Update</button>
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
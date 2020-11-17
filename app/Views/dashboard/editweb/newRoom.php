<?php 
   // Header
   $title = "Add-Room page";
   include(VIEWS.'dashboard/inc/header.php');
?> 


<div class="wrapper">

    <?php 
            $navbar_title = "Add New Room Page";
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
                        <h4>Add New Room 
                        <span>
                            <a href="<?php url("editweb/index"); ?>" class="addnew"><i class="material-icons">arrow_back</i>Back To Room Table</a>  
                        </span>
                        </h4>  
                    </div>

                    <p class="textfortabel">Complete Following Details</p>
                </div>

                <div class="cardbody">  
                    <form action="<?php url("editweb/create"); ?>" method="post" class="addnewform" enctype="multipart/form-data">

                    <div class="section1">
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">hotel</i>Room Type:</label>
                                <div class="animate-form">
                                    <select name="type_name" class="inputField" selected="<?php echo $room['type_name']; ?>" >
                                        <option value="1" style="border: none">Single Room</option> 
                                        <option value="2" style="border: none">Double Room with King Size Bed </option> 
                                        <option value="3" style="border: none">Double Room with Queen Size Bed</option> 
                                        <option value="4" style="border: none">Triple Room</option> 
                                        <option value="5" style="border: none">Twin Double Room</option> 
                                        <option value="6" style="border: none">Twin Room</option> 
                                        <option value="7" style="border: none">Family Room</option>    
                                    </select>    
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">room</i>Floor Type:</label>
                                <div class="animate-form">
                                    <select name="floor_type" class="inputField" selected="<?php echo $room['floor_type']; ?>"> 
                                        <option value="0" style="border: none">Ground Floor</option> 
                                        <option value="1" style="border: none">First Floor </option> 
                                        <option value="2" style="border: none">Scond Floor</option> 
                                        <option value="3" style="border: none">Third Floor</option> 
                                        <option value="4" style="border: none">Fourth Floor</option>      
                                    </select>    
                                </div>     
                        </div>


                        <div class="row">
                            <label for="#"><i class="material-icons">admin_panel_settings</i>Room Number:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_number" class="inputField"
                                    <?php 
                                        if(isset($room['room_number'])){
                                            echo 'value="' . $room['room_number'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="B102"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['room_number'])) && (isset($room['room_number']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['room_number']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">hotel</i>Room Name:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_name" class="inputField"
                                    <?php 
                                        if(isset($room['room_name'])){
                                            echo 'value="' . $room['room_name'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Budget Single Room"';
                                        } 
                                    
                                    ?>
                                    required
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['room_name'])) && (isset($room['room_name']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['room_name']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>
                        

                        <div class="row">
                            <label for="#"><i class="material-icons">deck</i>Room View:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_view" class="inputField"
                                    <?php 
                                        if(isset($room['room_view'])){
                                            echo 'value="' . $room['room_view'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="Sea View"';
                                        } 
                                    
                                    ?>
                                    required
                                    
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['room_view'])) && (isset($room['room_view']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['room_view']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">cast_for_education</i>Room Size:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="room_size" class="inputField" 
                                    <?php 
                                        if(isset($room['room_size'])){
                                            echo 'value="' . $room['room_size'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="45"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['room_size'])) && (isset($room['room_size']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['room_size']; ?></span>
                                            <?php endif; ?>
                                            
                                        </label>    
                                </div>     
                        </div>

                        

                        <div class="row">
                            <label for="#"><i class="material-icons">local_offer</i>Room Price:</label>
                                <div class="animate-form">
                                    <input type="text"  autocomplete="off" name="price" class="inputField"
                                    <?php 
                                        if(isset($room['price'])){
                                            echo 'value="' . $room['price'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="1000"';
                                        } 
                                    
                                    ?>
                                    
                                    required
                                    >
                                    
                                        <label for="name" class="label-name">
                                            <?php if((isset($errors['price'])) && (isset($room['price']))): ?>
                                                <span class="content-name"><i class="material-icons">info</i><?php echo $errors['price']; ?></span>
                                            <?php endif; ?>
                                        </label>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">ac_unit</i>Air Condition:</label>
                                <div class="animate-form">
                                    <select name="air_condition" class="inputField new" >
                                        <option value="0" style="border: none">No</option> 
                                        <option value="1" style="border: none">Yes</option>       
                                    </select>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">no_meeting_room</i>Free Cancelaration:</label>
                                <div class="animate-form">
                                    <select name="free_canseleration" class="inputField new">
                                        <option value="0" style="border: none">No</option> 
                                        <option value="1" style="border: none">Yes</option>       
                                    </select>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">hot_tub</i>Hot Water:</label>
                                <div class="animate-form">
                                    <select name="hot_water" class="inputField new">
                                        <option value="0" style="border: none">No</option> 
                                        <option value="1" style="border: none">Yes</option>       
                                    </select>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">room_service</i>Breakfast Included:</label>
                                <div class="animate-form">
                                    <select name="breakfast_included" class="inputField new">
                                        <option value="0" style="border: none">No</option> 
                                        <option value="1" style="border: none">Yes</option>       
                                    </select>    
                                </div>     
                        </div>

                        <div class="row">
                            <label for="#"><i class="material-icons">insert_photo</i>Room Photo:</label>
                            <div class="imgLine">
                                <div class="line">
                                    <img id="previewImg" src="<?php echo BURL.'assets/img/addImg.svg'; ?>" alt="Placeholder">
                                </div>
                                <div class="line">
                                    <!-- <input type="file" name="file"  onchange="previewFile(this);" required> -->
                                    <label class="addFile">  Select File
                                        <input  type="file" name="imgfile" size="60" onchange="previewFile(this);" required>
                                    </label> 
                                </div>
                            </div>   
                        </div>

                        <div class="row">
                            <div class="button">
                                <button class="save" name="submit">Create</button>
                            </div>

                            <label for="name" class="label-name">              
                                <span class="content-name"><i class="material-icons">info</i>success</span>                 
                            </label> 
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    

function previewFile(input) {

    console.log(input);
    var file = input.files[0];
    console.log(file);
  
    if(file){
        var reader = new FileReader();
        reader.onload = function(){
            $(input).closest('.imgLine').find('#previewImg').attr("src", reader.result);
        }
            reader.readAsDataURL(file);
    }
}
</script>
    
<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
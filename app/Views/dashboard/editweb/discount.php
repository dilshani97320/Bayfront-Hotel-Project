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

    <div class="content">
        <div class="tablecard">
            <div class="card">

                <div class="cardheader">
                    <div class="options">
                        <h4>Customer View
                            <span>
                                <a href="<?php url("customer/index"); ?>" class="addnew"><i
                                        class="material-icons">reply_all</i></a>
                                <a href="<?php url("customer/details/".$customer['customer_id']); ?>" class="refresh"><i
                                        class="material-icons">loop</i></a>
                            </span>
                        </h4>
                    </div>

                    <p class="textfortabel">Include Following Details</p>
                </div>

                <div class="cardbody">
                    <form action="<?php url("editweb/updateDiscount/"); ?>" method="post" class="addnewform">

                        <div class="section1">
                            <div class="row">
                                <label for="#"><i class="material-icons">room</i>Room Type:</label>
                                <div class="animate-form">
                                    <select name="type_name" class="inputField" required>
                                        <option value="">-Select Room Type-</option>
                                        <?php if(isset($details['type_name'])) {?>
                                        <option value="<?php echo $details['type_name']; ?>" selected>
                                            <?php echo $details['type_name']; ?></option>
                                        <?php } ?>
                                        <?php foreach($typename as $types): ?>
                                        <?php if(isset($details['type_name']) && $details['type_name'] != $types['type_name']){ ?>
                                        <option value="<?php echo $types['type_name']; ?>" style="border: none">
                                            <?php echo $types['type_name']; ?></option>
                                        <?php }elseif(!isset($details['type_name'])){ ?>
                                        <option value="<?php echo $types['type_name']; ?>" style="border: none">
                                            <?php echo $types['type_name']; ?></option>
                                        <?php } ?>

                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">

                                <label for="#"><i class="material-icons">local_offer</i>Room Discount:</label>
                                <div class="animate-form">
                                    <input type="text" autocomplete="off" name="discount" class="inputField" <?php 
                                            if(isset($room_details[0]['room_view'])){
                                                echo 'value="' . $room_details[0]['room_view'] . '"';
                                            }
                                            else {
                                                echo 'placeholder="Room Discount"';
                                            } 
                                        
                                        ?> required>

                                    <label for="name" class="label-name">
                                        <?php if((isset($errors['room_view'])) && (isset($room_details[0]['room_view']))): ?>
                                        <span class="content-name"><i
                                                class="material-icons">info</i><?php echo $errors['room_view']; ?></span>
                                        <?php endif; ?>
                                        <?php if(isset($success)): ?>
                                        <span class="content-success"><i class="material-icons">verified_user</i>Updated
                                            Success</span>
                                        <?php endif; ?>
                                    </label>
                                </div>
                            </div>

                            <div class="rowdate">
                                <label for="#"><i class="material-icons">today</i>Start Date:</label>
                                <!-- <div class="animate-formdate"> -->
                                <input type="date" autocomplete="off" name="start_date" class="inputFieldDate" <?php 

                                        date_default_timezone_set("Asia/Colombo");
                                        $current_date = date('Y-m-d');
                                        if(isset($details['check_in_date'])){
                                            echo 'value="' . $details['check_in_date'] . '"';
                                        }
                                        else {
                                            echo 'value="'.$current_date .'"';
                                        } 
                                    
                                    ?> <?php 
                                        echo 'min="'.$current_date .'"';
                                    ?> required>

                                <label for="name" class="label-name">
                                    <?php if((isset($errors)) && (isset($details['check_in_date']))): ?>
                                    <span class="content-name"><i class="material-icons">info</i>No ROOMS
                                        Available</span>
                                    <?php endif; ?>
                                </label>
                                <!-- </div> -->
                            </div>

                            <div class="rowdate">
                                <label for="#"><i class="material-icons">today</i>End Date:</label>
                                <!-- <div class="animate-form"> -->
                                <input type="date" autocomplete="off" name="end_date" class="inputFieldDate" <?php 
                                        date_default_timezone_set("Asia/Colombo");
                                        $current_date = date('Y-m-d');
                                        if(isset($details['check_out_date'])){
                                            echo 'value="' . $details['check_out_date'] . '"';
                                        }
                                        // else {
                                        //     echo 'value="'.$current_date.'"';
                                        // } 
                                    
                                    ?> <?php 
                                        echo 'min="'.$current_date .'"';
                                    ?> required>

                                <label for="name" class="label-name">
                                    <?php if((isset($errors)) && (isset($details['check_out_date']))): ?>
                                    <span class="content-name"><i class="material-icons">info</i>No ROOMS
                                        Available</span>
                                    <?php endif; ?>
                                </label>
                                <!-- </div>      -->
                            </div>


                            <div class="row">
                                <div class="button">
                                    <button class="save" name="submit">Submit</button>
                                </div>
                            </div>

                        </div>


                    </form>
                </div>
                <!--End Card Body -->

                <div class="cardheader">
                    <div class="options">
                        <h4>All Room Discount</h4>
                    </div>
                </div>
                <div class="cardbody">
                    <div class="tablebody">
                        <table>
                            <thead>
                                <th>Room Type</th>
                                <th>Discount Rate</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </thead>
                            <?php  foreach($discount_details as $row): ?>
                            <tbody>
                                <?php foreach($type as $types): ?>
                                <?php if( $row['room_type_id'] == $types['room_type_id']): ?>
                                <option value="<?php echo $types['type_name']; ?>" style="border: none">
                                    <td><?php echo $types['type_name']; ?>
                                </option>
                                </td>
                                <?php endif; ?>
                                <?php endforeach; ?>

                                <td><?php echo $row['discount_rate'];?></td>
                                <td><?php echo $row['start_date'];?></td>

                                <td><?php echo $row['end_date'];?></td>

                            </tbody>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>

            </div>
            <!--End Card -->


        </div>
    </div>


</div>

<?php include(VIEWS.'dashboard/inc/footer.php'); ?>
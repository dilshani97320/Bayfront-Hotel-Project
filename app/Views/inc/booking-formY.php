<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<style>
.form_submitBook {
    width: 100%;
    margin-top: 30px;
    height: 45px;
    border: 1px solid transparent;
    font-size: 15px;
    background-color: #000;
    color: white;
    text-transform: uppercase;
    box-shadow: 0px 1px 1px 0 darkgrey;
    border-radius: 5px;
    cursor: pointer; 
}
</style>
<body>  
<!-- .'/'.$room_details[0]['room_number'].'/'.$room_details[0]['room_type_id'] -->
<!-- $room_number,$max_guest,$check_in_date,$check_out_date -->
        <?php if(isset($roomAvailable) && $roomAvailable['availability'] == 1){ ?>
                <form action="<?php url("reservation/indexOnlineOneRoom".'/'.$room_details[0]['room_number'].'/'.$input_data['no_of_guests'].'/'.$input_data['check_in_date'].'/'.$input_data['check_out_date']); ?>" method="post" id="form" >     
        <?php } else {?>
                <form action="<?php url("room/checkRoomCustomerRoom".'/'.$room_details[0]['room_number'].'/'.$room_details[0]['room_type_id']); ?>" method="post" id="form" >
        <?php } ?>
                <!-- <input type="hidden" name="room_number" value="$room_details[0]['room_number']">
                <input type="hidden" name="room_type_id" value="$room_details[0]['room_type_id']"> -->
       
	<div class="bookingFormContainerY">
		<div class="blockY chech-in">
			<label >Check in</label>
           	<div id='check-in' class='form-fieldY'>
                <input type="date" name="check_in_date" value=""  placeholder="9 July, 2016">
                <!-- <div class='datepicker'><i class="fa fa-calendar" aria-hidden="true"></i></div> -->
            </div>
		</div>
		<div class="blockY check-out">
			<label >Check out</label>
                <div id='check-out' class='form-fieldY'>
                    <input type="date" name="check_out_date" value="" placeholder="19 July, 2016">
                 	<!-- <div class='datepicker'><i class="fa fa-calendar" aria-hidden="true"></i></div> -->
                </div>
		</div>
		<div class="blockY num-of-guest">
			<div class='form__dropdownY'>
                                <label >Rooms</label>
                                <div class='form-fieldY'> 
                                <select id='adultsAmount' name="no_of_rooms">    
                                        <option value="1">1</option>
                                        <!-- <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option> -->
                                </select>
                                <!-- <div class=''><i class="fa fa-caret-down" aria-hidden="true"></i></div> -->
                            </div>
                            </div>
		</div>
		<div class="blockY num-of-room">
			<div class='form__dropdownY'>
                                <label >Guests</label>
                                <br>
                              <div class='form-fieldY'> 
                                <select id='childrenAmount' name="no_of_guests">
                                        <!-- <option value="" selected="selected">0</option>                         -->
                                        <option value="1" ><?php echo $room_details[0]['max_guest']; ?></option>
                                        <!-- <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option> -->
                                </select>
                                <!-- <div class=''><i class="fa fa-caret-down" aria-hidden="true"></i></div> -->
                                </div>
                            </div>
		</div>
		
                <!-- when avilable room then book now display -->
                <?php if(isset($roomAvailable) && $roomAvailable['availability'] == 1){ ?>
                        <?php 
                        if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                        }
                        $_SESSION['unreg_room_number'] = $room_details[0]['room_number'];
                        $_SESSION['unreg_max_guest'] = $room_details[0]['max_guest'];
                        $_SESSION['unreg_check_in_date'] = $input_data['check_in_date'];
                        $_SESSION['unreg_check_out_date'] = $input_data['check_out_date'];
                        $_SESSION['unreg_no_of_rooms'] = $input_data['no_of_rooms'];
                        $_SESSION['unreg_no_of_guest'] = $input_data['no_of_guests'];	
                                
                        ; ?>
                        <div class="blockY search">
                                <!-- <a  class="form_submitBook" href="<?php url('Reservation/indexOnline/'.$input_data['room_number'].'/'.$input_data['no_of_guests'].'/'.$input_data['check_in_date'].'/'.$input_data['check_out_date'].'/'.$input_data['no_of_rooms'].'/'.$input_data['no_of_guests'] ); ?>"><?php echo $input_data['room_number']; ?></a> -->
                                <input type="submit" id='bookingSubmit' class='form__submitY' name='submitbooknow' value='Book Now'>
                        </div>
                <?php }else { ?>
                        <div class="blockY search">
			        <input type="submit" id='bookingSubmit' class='form__submitY' name='submit' value='Check  Availability'>
			 <!-- <input type="submit" id='bookingSubmit' class='form__submitY' value="<?php echo $room_details[0]['room_number']  ?>">  -->
		        </div>
                <?php } ?>     
	</div>
        </form>
</body>
</html>
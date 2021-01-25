<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div class="bookingFormContainerY">
		<div class="blockY chech-in">
			<label >Check in</label>
           	<div id='check-in' class='form-fieldY'>
                <input type="date" value="" placeholder="9 July, 2016">
                <!-- <div class='datepicker'><i class="fa fa-calendar" aria-hidden="true"></i></div> -->
            </div>
		</div>
		<div class="blockY check-out">
			<label >Check out</label>
                <div id='check-out' class='form-fieldY'>
                    <input type="date" value="" placeholder="19 July, 2016">
                 	<!-- <div class='datepicker'><i class="fa fa-calendar" aria-hidden="true"></i></div> -->
                </div>
		</div>
		<div class="blockY num-of-guest">
			<div class='form__dropdownY'>
                                <label >Rooms</label>
                                <div class='form-fieldY'> 
                                <select id='adultsAmount'>    
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
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
                                <select id='childrenAmount'> 
                                        <option value="" selected="selected">0</option>                        
                                        <option value="1" >1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                </select>
                                <!-- <div class=''><i class="fa fa-caret-down" aria-hidden="true"></i></div> -->
                                </div>
                            </div>
		</div>
		<div class="blockY search">
			 <input type="submit" id='bookingSubmit' class='form__submitY' value='Check  Availability'>
		</div>
	</div>
</body>
</html>
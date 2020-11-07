<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<div class="bookingFormContainerX">
		<div class="block chech-in">
			<label >Check in</label>
           	<div id='check-in' class='form-field'>
                <input type="date" value="" placeholder="9 July, 2016">
                <!-- <div class='datepicker'><i class="fa fa-calendar" aria-hidden="true"></i></div> -->
            </div>
		</div>
		<div class="block check-out">
			<label >Check out</label>
                <div id='check-out' class='form-field'>
                    <input type="date" value="" placeholder="19 July, 2016">
                 	<!-- <div class='datepicker'><i class="fa fa-calendar" aria-hidden="true"></i></div> -->
                </div>
		</div>
		<div class="block num-of-guest">
			<div class='form__dropdown'>
                                <label >Rooms</label>
                                <div class='form-field'> 
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
		<div class="block num-of-room">
			<div class='form__dropdown'>
                                <label >Guests</label>
                                <br>
                              <div class='form-field'> 
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
		<div class="block search">
			 <input type="submit" id='bookingSubmit' class='form__submit' value='Search rooms'>
		</div>
	</div>
</body>
</html>
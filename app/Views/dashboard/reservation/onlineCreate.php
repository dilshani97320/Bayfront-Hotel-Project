<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BURL.'assets/css/bookingform.css'; ?>" />
    <link rel="icon" type="image/png" href="<?php echo BURL.'assets/img/basic/favicon.png'; ?>" />
    <title>Book-Now|Form</title>
</head>
<body>
    <?php 
	// echo $msg1;
	// echo $msg2;
	// die();
		if(isset($errors['room_number'])) {
			echo '<script>alert("Room Number already booked")</script>';
		}
		else {
			if(isset($msg2)) {
				echo '<script>alert("'.$msg2.'")</script>';
			}
		}
				
	?>
    <section class="bookingform">
        <div class="row">
            <div class="form">
                <div class="signredirect">
                    <div class="logoimg">
                        <img src="<?php echo BURL.'assets/img/basic/logo.png'; ?>" alt="">
                    </div>
                    <div class="description">
                        <div class="line1">
                            <span class="sign1">Welcome our bayfront hotel System!!</span>
                            <!-- <a href="#" class="sign2">Signin</a> -->
                        </div>
                        <span class="sign3">Reservae your Bayfront hotel room and allows for faster bookings and more rewards</span>
                    </div>
                </div>
                <div class="contactdetails">
                    <h5>Let us know who you are</h5>
                    <!-- <form action="#"> -->
                    <?php 
                    // this is not require but use for basic purpose
                    $roomSearchValue = 0;
                    $typeName = "None";
                    ?>
                <?php if(isset($searchdata)){ ?>
                    <!-- //This is use for room serach and goto check now page -->
                    <form action="<?php url("reservation/create/". $roomSearchValue.'/'.$reservation['check_in_date'].'/'.$reservation['check_out_date'].'/'.$typeName.'/'.$searchdata['no_of_rooms'].'/'.$searchdata['no_of_guest'].'/'.$reservation['price']); ?>" method="post">
                <?php } else { ?>
                    <form action="<?php url("reservation/create"); ?>" method="post">
                <?php } ?> 


                        <!-- Customer Part -->
                        <?php 
                        
                            if(!isset($bookingCalendar)) {
                                $bookingCalendar = 0;
                            }
                        
                        
                        ?>

                        <input type="text" name="bookingCalendar" value="<?php echo $bookingCalendar; ?>" hidden>
                        <!-- This is may reset according to form -->
                        <input type="hidden" name="room_number" value="<?php echo $reservation['room_number']; ?>">
                        <input type="hidden" name="max_guest" value="<?php echo $reservation['max_guest']; ?>">
                        <input type="hidden" name="check_in_date" value="<?php echo $reservation['check_in_date']; ?>">
                        <input type="hidden" name="check_out_date" value="<?php echo $reservation['check_out_date']; ?>">

                        <div class="rowlong1">
                            <div class="rowdata1">
                                <label for="#">First Name

                                    
                                    <?php if((isset($errors['first_name'])) && (isset($reservation['first_name']))) { ?>
                                    <span id="msg_first_name_online"><i class="fa fa-exclamation-circle"></i></span>
                                    <?php }if((!isset($errors['first_name'])) && (isset($reservation['first_name']))) { ?>
                                    <span id="msg_first_name_online"><i class="fa fa-check-circle" style="color: rgb(12, 59, 12);"></i></span>
                                    <?php } else { ?>
                                    <span id="msg_first_name_online"></span>
                                    <?php } ?>
                                    
                                    
                                </label>

                                <input type="text" autocomplete="off" name="first_name" class="inputrow" maxlength="20" minlength="4"  id="first_name_online" oninput="validationFirstNameOnline()"
                                <?php 
                                        if(isset($reservation['first_name'])){
                                            echo 'value="' . $reservation['first_name'] . '"';
                                        }    
                                ?>
                                required>
                            </div>

                            <div class="rowdata1">
                                <label for="#">Last Name
                                <?php if((isset($errors['last_name'])) && (isset($reservation['last_name']))){ ?>
                                    <span id="msg_last_name_online"><i class="fa fa-exclamation-circle"></i></span>
                                <?php }if((!isset($errors['last_name'])) && (isset($reservation['last_name']))){ ?>
                                    <span id="msg_last_name_online"><i class="fa fa-check-circle" style="color: rgb(12, 59, 12);"></i></span>
                                <?php } else { ?>
                                    <span id="msg_last_name_online"></i></span>
                                <?php } ?>  
                                </label>
                                <input type="text" autocomplete="off" name="last_name" class="inputrow" maxlength="20" minlength="4"  id="last_name_online" oninput="validationLastNameOnline()"
                                <?php 
                                        if(isset($reservation['last_name'])){
                                            echo 'value="' . $reservation['last_name'] . '"';
                                        }
                                    
                                    ?>
                                                               
                                required>
                            </div>
                        </div>
                        
                        <div class="rowlong">
                            <label for="#">Email
                            <?php if((isset($errors['email'])) && (isset($reservation['email']))){ ?>
                                <span id="msg_email_online"><i class="fa fa-exclamation-circle"></i></span>  
                            <?php }if((!isset($errors['email'])) && (isset($reservation['email']))){ ?>
                                <span id="msg_email_online"><i class="fa fa-check-circle" style="color: rgb(12, 59, 12);"></i></span>
                            <?php } else {?>
                                <span id="msg_email_online"></span>
                            <?php } ?>
                            </label>
                            <input type="text" autocomplete="off" name="email" class="inputrow" maxlength="30" minlength="10" id="email_online" oninput="validationEmailOnine()"
                            <?php 
                                        if(isset($reservation['email'])){
                                            echo 'value="' . $reservation['email'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="wtgihan@gmail.com"';
                                        } 
                                    
                                    ?>
                            
                            required>
                        </div>

                        <div class="rowlong1">
                            <div class="rowdata1">
                                <label for="#">Contact Number
                                <?php if((isset($errors['contact_number'])) && (isset($reservation['contact_number']))){ ?>
                                    <span id="msg_contact_number_online"><i class="fa fa-exclamation-circle"></i></span>
                                <?php }if((!isset($errors['contact_number'])) && (isset($reservation['contact_number']))){ ?>
                                    <span id="msg_contact_number_online"><i class="fa fa-check-circle" style="color: rgb(12, 59, 12);"></i></span>
                                <?php } else { ?> 
                                    <span id="msg_contact_number_online"></span>
                                <?php } ?>
                                </label>
                                <input type="text"  autocomplete="off" name="contact_number" class="inputrow"  maxlength="10" minlength="10" id="contact_number_online" oninput="validationContactNumberOnline()"
                                <?php 
                                        if(isset($reservation['contact_number'])){
                                            echo 'value="' . $reservation['contact_number'] . '"';
                                        }
                                        else {
                                            echo 'placeholder="0778522736"';
                                        } 
                                    
                                    ?>
                                required>
                            </div>


                            <div class="rowdata1">
                                <label for="#">Country/region of residence</label>
                                <select class="inputrow" name="location" required>
                                    <?php if(isset($reservation['location'])): ?>
                                        <option value="<?php echo $reservation['location']; ?>"><?php echo $reservation['location']; ?></option>
                                    <?php endif; ?>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka" selected>Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                 </select>
                            </div>
                        </div>

                        <div class="rowlong1">
                            <div class="rowdata1">
                                <label for="#">Age
                                    <?php if((isset($errors['age'])) && (isset($reservation['age']))){ ?>
                                        <span id="msg_age_online"><i class="fa fa-exclamation-circle"></i></span>
                                    <?php }if((!isset($errors['age'])) && (isset($reservation['age']))){ ?>
                                        <span id="msg_age_online"><i class="fa fa-check-circle" style="color: rgb(12, 59, 12);"></i></span>
                                    <?php } else {?>
                                        <span id="msg_age_online"></span>
                                    <?php } ?>
                                </label>
                                <input type="text" autocomplete="off" name="age" class="inputrow" maxlength="3" minlength="2" id="age_online" oninput="validationAgeOnline()"
                                <?php 
                                        if(isset($reservation['age'])){
                                            echo 'value="' . $reservation['age'] . '"';
                                        }
                                        
                                    ?>
                                required>
                            </div>

                            <div class="rowdata1">
                                <label for="#">Payment Method</label>
                                <select name="payment_method"  class="inputrow" required>
                                    <option value="ONLINEONLINE">ONLINE</option>
                                    <option value="CASHONLINE" selected>CASH</option>
                                </select>
                            </div>
                        </div>

                        <div class="buttonrow">
                            <button type="submit" name="submit" class="buttonnow">Booking Now</button>
                            <!-- <button type="submit" name="submit" class="buttonnow"><?php echo $reservation['check_in_date']; ?></button> -->
                        </div>
                        
                        
                    </form>
                    
                </div>
            </div>
        </div>
        <aside class="roomdetails">
            <div class="detailsroom">
                <div class="dates">
                    <h4><span><i class="fa fa-calendar"></i>Check In Date</span><?php echo $reservation['check_in_date']; ?></h4>
                    <h4><span><i class="fa fa-calendar"></i>Check Out Date</span><?php echo $reservation['check_out_date']; ?></h4>
                    <strong>1 x Room Assigned on Arrival</strong>
                </div>
                <div class="roomrow">
                    <h4><span>Room Number</span><?php echo $reservation['room_number']; ?></h4>
                    <h4><span><i class="fa fa-users"></i>Max Guest </span><?php echo $reservation['max_guest']; ?> Adults</h4>
                </div>
            </div>

            <div class="detailsroomprice">
                <div class="priceroom">
                    <h4><span>Price(1 room x 1 night)</span>$ <?php echo $reservation['price']; ?></h4>
                    <h4><span>Booking fees</span><strong class="vital">FREE</strong></h4>
                    <strong class="vital2">Included in price:
                        <br>
                        Hotel tax and service fees $ 4.83
                    </strong>
                </div>
                <?php 
                    $date1=date_create($reservation['check_in_date']);
                    $date2=date_create($reservation['check_out_date']);
                    $diff=date_diff($date1,$date2);
                    $days = $diff->format("%a");
                    $total_price = $days*$reservation['price'];
                    $total_price = $total_price + 4.83;
                
                ; ?>
                <div class="roomrow1">
                    <h4><span>Price<i class="fa fa-info-circle"></i></span>$ <?php echo $total_price; ?></h4>
                </div>
            </div>

        </aside>
    </section>
    
</body>
</html>

<script src="<?php echo BURL.'assets/js/main.js'; ?>"></script>   